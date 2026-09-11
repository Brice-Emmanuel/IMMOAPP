<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'id_card_path',
        'role',
        'is_verified',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_verified' => 'boolean',
    ];

    // Un utilisateur (bailleur) possède plusieurs biens
    public function properties(): HasMany
    {
        return $this->hasMany(Property::class);
    }

    // Vérifier si l'utilisateur est administrateur
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    // Vérifier si l'utilisateur est bailleur
    public function isLandlord(): bool
    {
        return $this->role === 'landlord';
    }
}
