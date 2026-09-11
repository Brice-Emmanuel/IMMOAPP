<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserVerificationController extends Controller
{
    public function index()
    {
        $landlords = User::where('role', 'landlord')->latest()->paginate(10);
        return view('admin.users.index', compact('landlords'));
    }

    public function verify(User $user)
    {
        $user->update(['is_verified' => true]);
        return back()->with('success', 'Le bailleur a été vérifié avec succès.');
    }
}
