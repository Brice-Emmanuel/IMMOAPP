<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Support\Facades\Storage;

class PropertyApprovalController extends Controller
{
    public function index()
    {
        $properties = Property::with(['user', 'images'])->where('is_approved', false)->latest()->paginate(10);
        return view('admin.properties.index', compact('properties'));
    }

    public function show(Property $property)
    {
        $property->load(['user', 'images']);
        return view('admin.properties.show', compact('property'));
    }

    public function approve(Property $property)
    {
        $property->update(['is_approved' => true]);
        
        // Redirection explicite vers la liste pour éviter la 404 si l'action est faite depuis la page de détails
        return redirect()->route('admin.properties.index')->with('success', 'L\'annonce a été approuvée avec succès.');
    }

    public function reject(Property $property)
    {
        foreach ($property->images as $image) {
            $imagePath = $image->path ?? $image->image_path;
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
        }

        $property->delete();
        
        // Redirection explicite vers la liste pour éviter l'erreur 404
        return redirect()->route('admin.properties.index')->with('success', 'L\'annonce a été rejetée et supprimée.');
    }
}