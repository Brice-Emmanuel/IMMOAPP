<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $totalProperties = Property::where('user_id', $userId)->count();
        $approvedProperties = Property::where('user_id', $userId)->where('is_approved', true)->count();
        $pendingProperties = Property::where('user_id', $userId)->where('is_approved', false)->count();

        $properties = Property::where('user_id', $userId)->with('images')->latest()->get();

        return view('landlord.dashboard', compact('totalProperties', 'approvedProperties', 'pendingProperties', 'properties'));
    }
}
