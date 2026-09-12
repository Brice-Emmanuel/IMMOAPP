<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePropertyRequest;
use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::where('user_id', Auth::id())->with(['images', 'coverImage'])->latest()->get();
        return view('landlord.properties.index', compact('properties'));
    }

    public function create()
    {
        return view('landlord.properties.create');
    }

    public function store(StorePropertyRequest $request)
    {
        $validated = $request->validated();

        $isSuspicious = false;

        // 1. Règle intelligente : Détection de mots-clés suspects ou arnaques
        $forbiddenWords = ['arnaque', 'fake', 'gratuitement', 'western union', 'compte bloqué'];
        $contentToCheck = strtolower($validated['title'] . ' ' . $validated['description']);
        
        foreach ($forbiddenWords as $word) {
            if (str_contains($contentToCheck, $word)) {
                $isSuspicious = true;
                break;
            }
        }

        // 2. Règle intelligente : Vérification du prix minimum
        if ($validated['price'] < 5000) {
            $isSuspicious = true;
        }

        // Si suspect -> is_approved = false (en attente), sinon -> true (publié direct)
        $isApproved = $isSuspicious ? false : true;

        $property = Property::create([
            'user_id'     => Auth::id(),
            'title'       => $validated['title'],
            'description' => $validated['description'],
            'price'       => $validated['price'],
            'type'        => $validated['type'],
            'city'        => $validated['city'],
            'address'     => $validated['address'],
            'bedrooms'    => $validated['bedrooms'] ?? 0,
            'bathrooms'   => $validated['bathrooms'] ?? 0,
            'status'      => 'available',
            'is_approved' => $isApproved,
        ]);

        // 3. Gestion des images multiples avec affectation de la couverture (`is_cover`)
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('properties', 'public');
                
                // La toute première image envoyée devient la couverture par défaut
                $isCover = ($index === 0);

                PropertyImage::create([
                    'property_id' => $property->id,
                    'image_path'  => $path,
                    'is_cover'    => $isCover,
                ]);
            }
        }

        // Message de retour adapté
        $message = $isApproved 
            ? 'Votre bien a été vérifié et publié instantanément !' 
            : 'Votre bien a été soumis mais est en attente de vérification par l\'administrateur en raison de critères inhabituels.';

        return redirect()->route('landlord.dashboard')->with('success', $message);
    }

    public function edit($id)
    {
        $property = Property::where('user_id', Auth::id())->with('images')->findOrFail($id);
        return view('landlord.properties.edit', compact('property'));
    }

    public function update(Request $request, $id)
    {
        $property = Property::where('user_id', Auth::id())->with('images')->findOrFail($id);

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:0',
            'type'        => 'required|string|max:255',
            'city'        => 'required|string|max:255',
            'address'     => 'required|string|max:255',
            'bedrooms'    => 'nullable|integer|min:0',
            'bathrooms'   => 'nullable|integer|min:0',
            'images.*'    => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $property->update($validated);

        // Si de nouvelles images sont ajoutées lors de la modification
        if ($request->hasFile('images')) {
            // Vérifie si le bien possède déjà une image de couverture
            $hasCover = $property->images()->where('is_cover', true)->exists();

            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('properties', 'public');

                // Si le bien n'a pas encore de cover et que c'est la première nouvelle image, on la met en cover
                $isCover = (!$hasCover && $index === 0);

                PropertyImage::create([
                    'property_id' => $property->id,
                    'image_path'  => $path,
                    'is_cover'    => $isCover,
                ]);
            }
        }

        return redirect()->route('landlord.dashboard')->with('success', 'Bien mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $property = Property::where('user_id', Auth::id())->findOrFail($id);

        // Suppression des fichiers images enregistrés sur le disque
        foreach ($property->images as $image) {
            Storage::disk('public')->delete($image->image_path);
        }

        $property->delete();

        return redirect()->route('landlord.dashboard')->with('success', 'Bien supprimé avec succès.');
    }
}