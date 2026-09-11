<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;

class PropertyApprovalController extends Controller
{
    public function index()
    {
        $pendingProperties = Property::with(['user', 'coverImage'])->where('is_approved', false)->latest()->paginate(10);
        return view('admin.properties.index', compact('pendingProperties'));
    }

    public function approve(Property $property)
    {
        $property->update(['is_approved' => true]);
        return back()->with('success', 'L\'annonce a été approuvée avec succès.');
    }

    public function reject(Property $property)
    {
        $property->delete();
        return back()->with('success', 'L\'annonce a été rejetée et supprimée.');
    }
}
