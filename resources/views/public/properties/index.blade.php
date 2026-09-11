@extends('layouts.app')

@section('content')
<!-- En-tête avec la barre de recherche globale unique -->
<div class="bg-gray-900 text-white py-12 px-4 sm:px-6 lg:px-8 text-center mb-8">
    <div class="max-w-3xl mx-auto space-y-4">
        <h1 class="text-3xl font-black mb-2">Tous Nos Biens Immobiliers</h1>
        <p class="text-gray-400 text-sm">Découvrez l'ensemble de nos logements disponibles ou effectuez une recherche ciblée.</p>

        <!-- Barre de recherche unique -->
        <form action="{{ route('properties.index') }}" method="GET" class="mt-6">
            <div class="flex items-center bg-white rounded-2xl p-2 shadow-xl border border-gray-700">
                <input type="text" 
                       name="search" 
                       value="{{ request('search') }}" 
                       placeholder="Rechercher par ville, quartier, titre..." 
                       class="w-full bg-transparent px-4 py-3 text-gray-900 placeholder-gray-400 focus:outline-none text-sm font-medium">
                
                @if(request('search'))
                    <a href="{{ route('properties.index') }}" class="px-3 text-gray-400 hover:text-gray-600 text-sm" title="Effacer la recherche">
                        <i class="fa-solid fa-xmark"></i>
                    </a>
                @endif

                <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white p-3.5 rounded-xl transition-all shadow-md flex items-center justify-center">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
    @if(isset($properties) && $properties->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($properties as $property)
                <!-- Carte avec animation au survol -->
                <div class="group border border-gray-200 hover:border-orange-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 ease-out transform hover:-translate-y-1 bg-white flex flex-col justify-between">
                    <div>
                        <!-- Conteneur d'image cliquable -->
                        <div class="h-48 bg-gray-100 relative overflow-hidden">
                            @if($property->images && $property->images->first())
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
                                    <i class="fa-solid fa-house text-3xl"></i>
                                </div>
                            @endif

                            <span class="absolute top-3 left-3 bg-black/70 backdrop-blur-md text-white text-xs px-2.5 py-1 rounded-lg uppercase font-semibold">
                                {{ $property->type }}
                            </span>
                        </div>

                        <div class="p-5 space-y-3">
                            <h3 class="font-bold text-gray-900 text-lg line-clamp-1 group-hover:text-orange-500 transition-colors duration-200">{{ $property->title }}</h3>
                            <p class="text-orange-500 font-extrabold text-xl">
                                {{ number_format($property->price, 0, ',', ' ') }} FCFA <span class="text-xs text-gray-400 font-normal">/ mois</span>
                            </p>
                            <p class="text-xs text-gray-500 line-clamp-1">
                                <i class="fa-solid fa-location-dot text-orange-500 mr-1"></i> {{ $property->city }}, {{ $property->address }}
                            </p>
                            
                            <div class="pt-3 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500">
                                <span><i class="fa-solid fa-bed mr-1"></i> {{ $property->bedrooms }} ch.</span>
                                <span><i class="fa-solid fa-bath mr-1"></i> {{ $property->bathrooms }} douches</span>
                            </div>
                        </div>
                    </div>

                    <!-- Bouton Voir les détails -->
                    <div class="px-5 pb-5 pt-2 bg-gray-50/50 group-hover:bg-white transition-colors duration-200">
                        <a href="{{ route('properties.show', $property->id) }}" class="w-full bg-gray-900 hover:bg-orange-500 text-white font-bold py-2.5 rounded-xl transition-all block text-center text-xs uppercase tracking-wider shadow-sm">
                            Voir les détails <i class="fa-solid fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="bg-white p-12 rounded-2xl border border-gray-100 text-center space-y-3">
            <i class="fa-solid fa-magnifying-glass text-4xl text-gray-300 mb-1"></i>
            <p class="text-gray-700 font-bold text-lg">Aucun résultat trouvé</p>
            <p class="text-gray-400 text-sm">Essayez un autre mot-clé, une autre ville ou un autre quartier.</p>
            <div>
                <a href="{{ route('properties.index') }}" class="inline-block mt-2 bg-orange-500 text-white text-xs font-bold px-4 py-2 rounded-xl">
                    Réinitialiser la recherche
                </a>
            </div>
        </div>
    @endif
</div>

<!-- Modal plein écran avec un fond clair / blanc semi-transparent pour bien voir la page derrière -->
<div id="propertyImageModal" onclick="window.closePropertyModal()" style="display:none; position:fixed; inset:0; z-index:99999; background:rgba(255, 255, 255, 0.85); backdrop-filter: blur(2px); justify-content:center; align-items:center; padding:20px; cursor:zoom-out;">
    <span style="position:absolute; top:20px; right:30px; color:#111; font-size:40px; font-weight:bold; cursor:pointer;" title="Fermer">&times;</span>
    <img id="propertyModalImg" src="" style="max-width:85%; max-height:85vh; object-fit:contain; border-radius:12px; background:transparent; padding: 10px; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.15), 0 10px 10px -5px rgba(0, 0, 0, 0.1);" onclick="event.stopPropagation()">
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