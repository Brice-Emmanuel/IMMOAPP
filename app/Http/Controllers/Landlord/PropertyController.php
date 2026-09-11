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
        $properties = Property::where('user_id', Auth::id())->with('images')->latest()->get();
        return view('landlord.properties.index', compact('properties'));
    }

    public function create()
    {
        return view('landlord.properties.create');
    }

    public function store(StorePropertyRequest $request)
    {
        $validated = $request->validated();

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
            'is_approved' => false,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('properties', 'public');
                PropertyImage::create([
                    'property_id' => $property->id,
                    'image_path'  => $path,
                ]);
            }
        }

        return redirect()->route('landlord.dashboard')->with('success', 'Bien créé avec succès.');
    }

    public function edit($id)
    {
        $property = Property::where('user_id', Auth::id())->findOrFail($id);
        return view('landlord.properties.edit', compact('property'));
    }

    public function update(Request $request, $id)
    {
        $property = Property::where('user_id', Auth::id())->findOrFail($id);

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:0',
            'type'        => 'required|string|max:255',
            'city'        => 'required|string|max:255',
            'address'     => 'required|string|max:255',
            'bedrooms'    => 'nullable|integer|min:0',
            'bathrooms'   => 'nullable|integer|min:0',
            'images.*'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $property->update($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('properties', 'public');
                PropertyImage::create([
                    'property_id' => $property->id,
                    'image_path'  => $path,
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
