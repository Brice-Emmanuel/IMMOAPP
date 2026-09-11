<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Landlord\DashboardController as LandlordDashboardController;
use App\Http\Controllers\Landlord\PropertyController as LandlordPropertyController;
use App\Http\Controllers\PublicPropertyController;
use Illuminate\Support\Facades\Route;

// --- ROUTES PUBLIQUES ---
Route::get('/', [PublicPropertyController::class, 'home'])->name('home');
Route::get('/properties', [PublicPropertyController::class, 'index'])->name('properties.index');
Route::get('/properties/{id}', [PublicPropertyController::class, 'show'])->name('properties.show');

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
});

require __DIR__.'/auth.php';