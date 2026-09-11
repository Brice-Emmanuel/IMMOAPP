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
            $table->decimal('price', 12, 2);
            $table->string('type'); // Type en string/varchar pour accepter bureau, magasin, studio, etc.
            $table->string('city');
            $table->string('address');
            $table->integer('bedrooms')->default(0);
            $table->integer('bathrooms')->default(0);
            $table->enum('status', ['available', 'rented', 'unavailable'])->default('available');
            $table->boolean('is_approved')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
