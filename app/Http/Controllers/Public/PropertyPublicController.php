<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyPublicController extends Controller
{
    public function home()
    {
        $properties = Property::with(['images', 'coverImage', 'user'])
            ->where('is_approved', true)
            ->latest()
            ->take(6)
            ->get();
            
        return view('public.home', compact('properties'));
    }

    public function index(Request $request)
    {
        $query = Property::with(['images', 'coverImage', 'user'])->where('is_approved', true);

        // Barre de recherche globale unique
        if ($request->filled('search')) {
            $search = $request->input('search');

            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%")
                  ->orWhere('address', 'like', "%{$search}%")
                  ->orWhere('type', 'like', "%{$search}%")
                  ->orWhere('price', '<=', (int) $search)
                  ->orWhere('bedrooms', '=', (int) $search);
            });
        }

        $properties = $query->latest()->get();

        return view('public.properties.index', compact('properties'));
    }

    public function show($id)
    {
        $property = Property::with(['images', 'coverImage', 'user'])
            ->where('is_approved', true)
            ->findOrFail($id);
        
        // Biens similaires dans la même ville
        $similarProperties = Property::with(['images', 'coverImage'])
            ->where('city', $property->city)
            ->where('id', '!=', $property->id)
            ->where('is_approved', true)
            ->take(3)
            ->get();

        return view('public.properties.show', compact('property', 'similarProperties'));
    }
}