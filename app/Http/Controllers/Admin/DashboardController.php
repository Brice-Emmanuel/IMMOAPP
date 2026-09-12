<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Récupération des différents comptages pour les cartes du tableau de bord
        $pendingPropertiesCount = Property::where('is_approved', false)->count();
        $landlordsCount = User::where('role', 'landlord')->count();
        $pendingCniCount = 0; // Mis à 0 en attendant la gestion des CNI

        return view('admin.dashboard', compact('pendingPropertiesCount', 'landlordsCount', 'pendingCniCount'));
    }

    public function usersIndex()
    {
        $users = User::where('role', 'landlord')->latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }
}