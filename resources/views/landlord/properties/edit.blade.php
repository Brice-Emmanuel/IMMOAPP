@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <div class="mb-8">
        <a href="{{ route('landlord.dashboard') }}" class="text-sm font-semibold text-gray-500 hover:text-orange-500">
            <i class="fa-solid fa-arrow-left mr-1"></i> Retour au tableau de bord
        </a>
        <h1 class="text-3xl font-black text-gray-900 mt-2">Modifier le bien : {{ $property->title }}</h1>
    </div>

    <form action="{{ route('landlord.properties.update', $property->id) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl border border-gray-100 p-8 shadow-sm space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Titre de l'annonce</label>
            <input type="text" name="title" value="{{ old('title', $property->title) }}" required class="w-full border-gray-200 rounded-xl focus:border-orange-500 focus:ring-orange-500 text-sm">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Type de bien</label>
                <input type="text" name="type" value="{{ old('type', $property->type) }}" required placeholder="Appartement, Studio, Bureau..." class="w-full border-gray-200 rounded-xl focus:border-orange-500 focus:ring-orange-500 text-sm">
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Prix (FCFA / mois)</label>
                <input type="number" name="price" value="{{ old('price', $property->price) }}" required class="w-full border-gray-200 rounded-xl focus:border-orange-500 focus:ring-orange-500 text-sm">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Ville</label>
                <input type="text" name="city" value="{{ old('city', $property->city) }}" required class="w-full border-gray-200 rounded-xl focus:border-orange-500 focus:ring-orange-500 text-sm">
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Adresse</label>
                <input type="text" name="address" value="{{ old('address', $property->address) }}" required class="w-full border-gray-200 rounded-xl focus:border-orange-500 focus:ring-orange-500 text-sm">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Nombre de chambres</label>
                <input type="number" name="bedrooms" value="{{ old('bedrooms', $property->bedrooms) }}" class="w-full border-gray-200 rounded-xl focus:border-orange-500 focus:ring-orange-500 text-sm">
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Nombre de douches</label>
                <input type="number" name="bathrooms" value="{{ old('bathrooms', $property->bathrooms) }}" class="w-full border-gray-200 rounded-xl focus:border-orange-500 focus:ring-orange-500 text-sm">
            </div>
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Description complète</label>
            <textarea name="description" rows="4" required class="w-full border-gray-200 rounded-xl focus:border-orange-500 focus:ring-orange-500 text-sm">{{ old('description', $property->description) }}</textarea>
        </div>

        <!-- Section d'affichage des photos actuelles -->
        @if($property->images->count() > 0)
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Photos actuelles du bien</label>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                    @foreach($property->images as $image)
                        <div class="relative group rounded-xl overflow-hidden border border-gray-200 h-28 shadow-sm bg-gray-50">
                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="Photo du bien" class="w-full h-full object-cover">
                            @if($image->is_cover)
                                <span class="absolute top-2 left-2 bg-orange-600 text-white text-[10px] font-bold px-2 py-0.5 rounded-full shadow">Couverture</span>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Ajouter de nouvelles photos</label>
            <input type="file" name="images[]" multiple class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100">
            <p class="text-xs text-gray-400 mt-1">Les nouvelles photos s'ajouteront à la galerie existante.</p>
        </div>

        <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 rounded-xl transition-all shadow-lg shadow-orange-500/20">
            Mettre à jour le bien
        </button>
    </form>
</div>
@endsection