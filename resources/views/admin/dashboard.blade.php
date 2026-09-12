@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="mb-8">
        <h1 class="text-3xl font-black text-gray-900">Panneau d'Administration</h1>
        <p class="text-gray-500 text-sm mt-1">Supervisez la modération des annonces et la vérification des bailleurs.</p>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
            <span class="text-xs font-semibold text-gray-400 uppercase">Annonces à Valider</span>
            <p class="text-3xl font-black text-orange-500 mt-2">{{ $pendingPropertiesCount ?? 0 }}</p>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
            <span class="text-xs font-semibold text-gray-400 uppercase">Comptes Bailleurs</span>
            <p class="text-3xl font-black text-gray-900 mt-2">{{ $landlordsCount ?? 0 }}</p>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
            <span class="text-xs font-semibold text-gray-400 uppercase">CNI en attente</span>
            <p class="text-3xl font-black text-blue-600 mt-2">{{ $pendingCniCount ?? 0 }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <a href="{{ route('admin.properties.index') }}" class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:border-orange-500 transition-all flex items-center justify-between">
            <div>
                <h3 class="font-bold text-gray-900 text-lg">Modération des Annonces</h3>
                <p class="text-xs text-gray-500 mt-1">Approuver ou rejeter les biens soumis par les bailleurs.</p>
            </div>
            <i class="fa-solid fa-chevron-right text-gray-400"></i>
        </a>

        <a href="{{ route('admin.users.index') }}" class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:border-orange-500 transition-all flex items-center justify-between">
            <div>
                <h3 class="font-bold text-gray-900 text-lg">Gestion des Bailleurs</h3>
                <p class="text-xs text-gray-500 mt-1">Consulter la liste des comptes bailleurs enregistrés.</p>
            </div>
            <i class="fa-solid fa-chevron-right text-gray-400"></i>
        </a>
    </div>
</div>
@endsection