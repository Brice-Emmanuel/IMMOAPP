@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-black text-gray-900">Mes biens immobiliers</h1>
            <p class="text-gray-500 text-sm mt-1">Gérez vos annonces publiées et suivez leur statut.</p>
        </div>
        <a href="{{ route('landlord.properties.create') }}" class="bg-orange-500 hover:bg-orange-600 text-white text-sm font-bold px-5 py-3 rounded-xl transition-all shadow-lg shadow-orange-500/20 flex items-center gap-2">
            <i class="fa-solid fa-plus"></i> Ajouter un bien
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        @if($properties->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100 text-xs font-bold text-gray-400 uppercase tracking-wider">
                            <th class="py-4 px-6">Bien</th>
                            <th class="py-4 px-6">Type & Prix</th>
                            <th class="py-4 px-6">Localisation</th>
                            <th class="py-4 px-6">Statut</th>
                            <th class="py-4 px-6 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm">
                        @foreach($properties as $property)
                            <tr class="hover:bg-gray-50/50 transition-all">
                                <!-- Image & Titre -->
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-4">
                                        <div class="w-16 h-12 rounded-lg overflow-hidden bg-gray-100 flex-shrink-0 border border-gray-200">
                                            @php
                                                // Récupère l'image de couverture, ou la première image, ou une image par défaut
                                                $coverPath = $property->images->where('is_cover', true)->first()->image_path 
                                                          ?? optional($property->images->first())->image_path;
                                            @endphp
                                            <img src="{{ $coverPath ? asset('storage/' . $coverPath) : asset('images/default.jpg') }}" 
                                                 alt="Aperçu" class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <span class="font-bold text-gray-900 line-clamp-1">{{ $property->title }}</span>
                                            <span class="text-xs text-gray-400">{{ $property->images->count() }} photo(s)</span>
                                        </div>
                                    </div>
                                </td>

                                <!-- Type et Prix -->
                                <td class="py-4 px-6">
                                    <span class="block font-semibold text-gray-800 capitalize">{{ $property->type }}</span>
                                    <span class="text-xs font-bold text-orange-600">{{ number_format($property->price, 0, ',', ' ') }} FCFA / mois</span>
                                </td>

                                <!-- Localisation -->
                                <td class="py-4 px-6">
                                    <span class="block text-gray-800">{{ $property->city }}</span>
                                    <span class="text-xs text-gray-400">{{ $property->address }}</span>
                                </td>

                                <!-- Statut d'approbation -->
                                <td class="py-4 px-6">
                                    @if($property->is_approved)
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-green-50 text-green-700 border border-green-200">
                                            Publié
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-yellow-50 text-yellow-700 border border-yellow-200">
                                            En attente
                                        </span>
                                    @endif
                                </td>

                                <!-- Actions -->
                                <td class="py-4 px-6 text-right space-x-2">
                                    <a href="{{ route('landlord.properties.edit', $property->id) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-gray-100 hover:bg-orange-50 hover:text-orange-600 text-gray-600 transition-all" title="Modifier">
                                        <i class="fa-solid fa-pen-to-square text-xs"></i>
                                    </a>
                                    <form action="{{ route('landlord.properties.destroy', $property->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce bien et toutes ses photos ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-gray-100 hover:bg-red-50 hover:text-red-600 text-gray-600 transition-all" title="Supprimer">
                                            <i class="fa-solid fa-trash text-xs"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-16 px-4">
                <div class="w-16 h-16 bg-orange-50 text-orange-500 rounded-full flex items-center justify-center mx-auto mb-4 text-xl">
                    <i class="fa-solid fa-house-chimney"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-800">Aucun bien publié pour le moment</h3>
                <p class="text-gray-400 text-sm mt-1 max-w-sm mx-auto">Commencez dès maintenant à ajouter vos logements pour les rendre visibles aux futurs locataires.</p>
                <a href="{{ route('landlord.properties.create') }}" class="inline-block mt-6 bg-orange-500 hover:bg-orange-600 text-white text-sm font-bold px-6 py-3 rounded-xl transition-all shadow-lg shadow-orange-500/20">
                    Ajouter mon premier bien
                </a>
            </div>
        @endif
    </div>
</div>
@endsection