<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PublicPropertyController extends Controller
{
    public function index()
    {
        // Récupère tous les biens créés avec leurs images et le bailleur
        $properties = Property::with(['images', 'user'])
            ->latest()
            ->get();

        return view('public.properties.index', compact('properties'));
    }

    public function home()
    {
        // Récupère tous les biens pour la page d'accueil
        $properties = Property::with(['images', 'user'])
            ->latest()
            ->take(6)
            ->get();

        return view('welcome', compact('properties'));
    }

    public function show($id)
    {
        // Récupère un bien spécifique avec ses images et son bailleur, ou renvoie une erreur 404 s'il n'existe pas
        $property = Property::with(['images', 'user'])->findOrFail($id);

        return view('public.properties.show', compact('property'));
    }
}