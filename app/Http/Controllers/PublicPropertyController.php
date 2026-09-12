<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PublicPropertyController extends Controller
{
    public function index()
    {
        // Récupère uniquement les biens approuvés avec leurs images et le bailleur
        $properties = Property::with(['images', 'user'])
            ->where('is_approved', true)
            ->latest()
            ->get();

        return view('public.properties.index', compact('properties'));
    }

    public function home()
    {
        // Récupère uniquement les biens approuvés pour la page d'accueil
        $properties = Property::with(['images', 'user'])
            ->where('is_approved', true)
            ->latest()
            ->take(6)
            ->get();

        return view('welcome', compact('properties'));
    }

    public function show($id)
    {
        // Récupère un bien approuvé spécifique ou renvoie une erreur 404
        $property = Property::with(['images', 'user'])
            ->where('is_approved', true)
            ->findOrFail($id);

        return view('public.properties.show', compact('property'));
    }
}