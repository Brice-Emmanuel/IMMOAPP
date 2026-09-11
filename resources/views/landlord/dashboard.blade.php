@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 border border-green-200 text-green-700 rounded-xl font-medium">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-black text-gray-900">Espace Bailleur</h1>
            <p class="text-gray-500 text-sm mt-1">Gérez vos propriétés et vos annonces.</p>
        </div>
        <a href="{{ route('landlord.properties.create') }}" class="bg-orange-500 hover:bg-orange-600 text-white font-bold px-5 py-2.5 rounded-xl shadow-lg shadow-orange-500/20 transition-all flex items-center gap-2 text-sm">
            <i class="fa-solid fa-plus"></i> Ajouter un bien
        </a>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
            <span class="text-xs font-semibold text-gray-400 uppercase">Mes Biens</span>
            <p class="text-3xl font-black text-gray-900 mt-2">{{ $totalProperties }}</p>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
            <span class="text-xs font-semibold text-gray-400 uppercase">Annonces Actives</span>
            <p class="text-3xl font-black text-green-600 mt-2">{{ $approvedProperties }}</p>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
            <span class="text-xs font-semibold text-gray-400 uppercase">En Attente de Validation</span>
            <p class="text-3xl font-black text-orange-500 mt-2">{{ $pendingProperties }}</p>
        </div>
    </div>

    <!-- Liste des Biens -->
    <div class="bg-white rounded-2xl border border-gray-100 p-6 shadow-sm">
        <h2 class="text-lg font-bold text-gray-900 mb-6">Mes propriétés récentes</h2>

        @if($properties->isEmpty())
            <p class="text-gray-500 text-sm">Vous n'avez pas encore publié de bien immobilier.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($properties as $property)
                    <!-- Carte avec animation au survol -->
                    <div class="group border border-gray-200 hover:border-orange-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 ease-out transform hover:-translate-y-1 bg-white flex flex-col justify-between">
                        <div>
                            <!-- Conteneur d'image cliquable pour agrandir -->
                            <div class="h-48 bg-gray-900 relative overflow-hidden">
                                @if($property->images->first())
                                    @php 
                                        $propertyImgUrl = \Illuminate\Support\Facades\Storage::url($property->images->first()->image_path); 
                                    @endphp
                                    <img src="{{ $propertyImgUrl }}" 
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 ease-out cursor-pointer"
                                         onclick="window.openPropertyModal('{{ $propertyImgUrl }}')"
                                         title="Cliquer pour agrandir l'image">
                                    
                                    <div class="absolute bottom-2 right-2 bg-black/60 backdrop-blur-md text-white text-[10px] px-2 py-1 rounded-md pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity">
                                        <i class="fa-solid fa-expand"></i> Agrandir
                                    </div>
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-400">
                                        <i class="fa-solid fa-image text-3xl"></i>
                                    </div>
                                @endif

                                <span class="absolute top-3 right-3 px-3 py-1 rounded-full text-xs font-bold shadow-md {{ $property->is_approved ? 'bg-green-500 text-white' : 'bg-orange-500 text-white' }}">
                                    {{ $property->is_approved ? 'Approuvé' : 'En attente' }}
                                </span>
                            </div>

                            <div class="p-5 space-y-2">
                                <h3 class="font-bold text-gray-900 text-lg line-clamp-1 group-hover:text-orange-500 transition-colors duration-200">{{ $property->title }}</h3>
                                <p class="text-orange-500 font-extrabold text-xl">{{ number_format($property->price, 0, ',', ' ') }} FCFA <span class="text-xs text-gray-400 font-normal">/ mois</span></p>
                                <p class="text-xs text-gray-500"><i class="fa-solid fa-location-dot text-orange-500 mr-1"></i> {{ $property->city }}, {{ $property->address }}</p>
                            </div>
                        </div>

                        <!-- Bouton d'action -->
                        <div class="p-4 border-t border-gray-100 flex justify-end bg-gray-50/50 group-hover:bg-white transition-colors duration-200">
                            <a href="{{ url('/properties/' . $property->id) }}" class="w-10 h-10 bg-gray-100 group-hover:bg-orange-500 text-gray-600 group-hover:text-white rounded-xl transition-all duration-200 flex items-center justify-center shadow-sm" title="Voir le bien">
                                <i class="fa-solid fa-eye text-sm"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

<!-- Modal plein écran pour l'image -->
<div id="propertyImageModal" onclick="window.closePropertyModal()" style="display:none; position:fixed; inset:0; z-index:99999; background:rgba(0,0,0,0.95); justify-content:center; align-items:center; padding:20px; cursor:zoom-out;">
    <span style="position:absolute; top:20px; right:30px; color:#fff; font-size:40px; font-weight:bold; cursor:pointer;">&times;</span>
    <img id="propertyModalImg" src="" style="max-width:90%; max-height:90vh; object-fit:contain; border-radius:12px;" onclick="event.stopPropagation()">
</div>

<script>
window.openPropertyModal = function(imageUrl) {
    if (!imageUrl) return;
    const modal = document.getElementById('propertyImageModal');
    const modalImg = document.getElementById('propertyModalImg');
    modalImg.src = imageUrl;
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
};

window.closePropertyModal = function() {
    const modal = document.getElementById('propertyImageModal');
    modal.style.display = 'none';
    document.body.style.overflow = 'auto';
};

document.addEventListener('keydown', function(e) {
    if (e.key === "Escape") {
        window.closePropertyModal();
    }
});
</script>
@endsection