<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PropertyApprovalController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Landlord\DashboardController as LandlordDashboardController;
use App\Http\Controllers\Landlord\PropertyController as LandlordPropertyController;
use App\Http\Controllers\PublicPropertyController;
use Illuminate\Support\Facades\Route;

// --- ROUTES PUBLIQUES ---
Route::get('/', [PublicPropertyController::class, 'home'])->name('home');
Route::get('/properties', [PublicPropertyController::class, 'index'])->name('properties.index');
Route::get('/properties/{id}', [PublicPropertyController::class, 'show'])->name('properties.show');

// --- ROUTES DE RÉINITIALISATION DE MOT DE PASSE ---
Route::middleware('guest')->group(function () {
    Route::get('forgot-password', [ForgotPasswordController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [ForgotPasswordController::class, 'store'])->name('password.email');
    
    Route::get('reset-password/{token}', [ResetPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [ResetPasswordController::class, 'store'])->name('password.update');
});

// --- ESPACE BAILLEUR ---
Route::middleware(['auth', 'landlord'])->prefix('landlord')->name('landlord.')->group(function () {
    Route::get('/dashboard', [LandlordDashboardController::class, 'index'])->name('dashboard');
    Route::get('/properties/create', [LandlordPropertyController::class, 'create'])->name('properties.create');
    Route::post('/properties', [LandlordPropertyController::class, 'store'])->name('properties.store');
    Route::get('/properties/{id}/edit', [LandlordPropertyController::class, 'edit'])->name('properties.edit');
    Route::put('/properties/{id}', [LandlordPropertyController::class, 'update'])->name('properties.update');
    Route::delete('/properties/{id}', [LandlordPropertyController::class, 'destroy'])->name('properties.destroy');
});

// --- ESPACE ADMIN ---
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    // Routes de modération des biens
    Route::get('/properties/pending', [PropertyApprovalController::class, 'index'])->name('properties.index');
    Route::get('/properties/{property}', [PropertyApprovalController::class, 'show'])->name('properties.show');
    Route::patch('/properties/{property}/approve', [PropertyApprovalController::class, 'approve'])->name('properties.approve');
    Route::delete('/properties/{property}/reject', [PropertyApprovalController::class, 'reject'])->name('properties.reject');

    // Route pour la gestion des utilisateurs / CNI
    Route::get('/users', [AdminDashboardController::class, 'usersIndex'])->name('users.index');
});

require __DIR__.'/auth.php';