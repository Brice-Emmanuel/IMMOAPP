<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $pendingPropertiesCount = Property::where('is_approved', false)->count();
        $landlordsCount = User::where('role', 'landlord')->count();
        $properties = Property::with('user', 'images')->where('is_approved', false)->latest()->get();

        return view('admin.dashboard', compact('pendingPropertiesCount', 'landlordsCount', 'properties'));
    }
}
