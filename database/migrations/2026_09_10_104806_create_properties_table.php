<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->enum('type', ['appartement', 'maison', 'studio', 'chambre', 'bureau', 'magasin']);
            $table->decimal('price', 12, 2);
            $table->string('city');
            $table->string('address');
            $table->integer('bedrooms')->default(0);
            $table->integer('bathrooms')->default(0);
            $table->enum('status', ['available', 'rented'])->default('available');
            $table->boolean('is_approved')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
