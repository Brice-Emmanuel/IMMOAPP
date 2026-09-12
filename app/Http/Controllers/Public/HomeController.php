<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Property;

class HomeController extends Controller
{
    public function index()
    {
        // Compter uniquement les biens qui ont été approuvés par l'administrateur
        $activePropertiesCount = Property::where('is_approved', true)->count();

        return view('public.home', compact('activePropertiesCount'));
    }
}