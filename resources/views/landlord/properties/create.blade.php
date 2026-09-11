@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-black text-gray-900">Ajouter un bien immobilier</h1>
            <p class="text-gray-500 text-sm mt-1">Remplissez les informations de votre annonce.</p>
        </div>
        <a href="{{ route('landlord.dashboard') }}" class="text-sm font-semibold text-gray-600 hover:text-gray-900">
            <i class="fa-solid fa-arrow-left mr-1"></i> Retour
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 p-8 shadow-xl">
        <form action="{{ route('landlord.properties.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Titre du bien -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Titre de l'annonce</label>
                <input type="text" name="title" value="{{ old('title') }}" placeholder="ex: Appartement meublé 3 pièces avec balcon" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-orange-500 outline-none">
                @error('title') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Type et Prix -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Type de bien</label>
                    <select name="type" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-orange-500 outline-none bg-white">
                        <option value="appartement">Appartement</option>
                        <option value="maison">Maison / Villa</option>
                        <option value="studio">Studio</option>
                        <option value="chambre">Chambre</option>
                        <option value="bureau">Bureau</option>
                        <option value="magasin">Magasin / Commerce</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Prix (FCFA / mois)</label>
                    <input type="number" name="price" value="{{ old('price') }}" placeholder="150000" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-orange-500 outline-none">
                    @error('price') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Localisation -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Ville</label>
                    <input type="text" name="city" value="{{ old('city') }}" placeholder="ex: Douala" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-orange-500 outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Quartier / Adresse</label>
                    <input type="text" name="address" value="{{ old('address') }}" placeholder="ex: Akwa, Rue Silo" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-orange-500 outline-none">
                </div>
            </div>

            <!-- Chambres & Douches -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nombre de chambres</label>
                    <input type="number" name="bedrooms" value="{{ old('bedrooms', 1) }}" min="0" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-orange-500 outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nombre de salles de bain</label>
                    <input type="number" name="bathrooms" value="{{ old('bathrooms', 1) }}" min="0" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-orange-500 outline-none">
                </div>
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Description détaillée</label>
                <textarea name="description" rows="5" required placeholder="Décrivez les atouts du logement (eau, électricité, gardiennage, accès...)" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-orange-500 outline-none">{{ old('description') }}</textarea>
            </div>

            <!-- Photos -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Photos du bien</label>
                <input type="file" name="images[]" multiple accept="image/*" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:ring-2 focus:ring-orange-500 outline-none">
                <p class="text-xs text-gray-400 mt-1">Vous pouvez sélectionner plusieurs images en même temps.</p>
            </div>

            <button type="submit" class="w-full py-4 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-xl shadow-lg shadow-orange-500/20 transition-all">
                Publier l'annonce
            </button>
        </form>
    </div>
</div>
@endsection
