 @extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <!-- En-tête : Bouton Retour + Titre + Actions (Modifier & Supprimer si propriétaire/admin) -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8 bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
        <div class="flex items-center gap-4">
            <!-- Bouton Retour mis en valeur -->
            <a href="{{ route('properties.index') }}" class="w-12 h-12 bg-gray-50 hover:bg-orange-500 hover:text-white text-gray-700 border border-gray-200 hover:border-orange-500 rounded-xl flex items-center justify-center transition-all shadow-sm shrink-0" title="Retour aux biens">
                <i class="fa-solid fa-arrow-left text-lg"></i>
            </a>
            <div>
                <h1 class="text-2xl sm:text-3xl font-black text-gray-900">{{ $property->title }}</h1>
                <p class="text-gray-500 text-sm mt-0.5">
                    <i class="fa-solid fa-location-dot text-orange-500 mr-1"></i> {{ $property->city }}, {{ $property->address }}
                </p>
            </div>
        </div>

        @auth
            @if(auth()->id() === $property->user_id || auth()->user()->isAdmin())
                <div class="flex items-center gap-2 self-end md:self-auto">
                    <a href="{{ route('landlord.properties.edit', $property->id) }}" class="w-10 h-10 bg-blue-50 hover:bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center transition-all" title="Modifier">
                        <i class="fa-solid fa-pen"></i>
                    </a>

                    <form action="{{ route('landlord.properties.destroy', $property->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce bien ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-10 h-10 bg-red-50 hover:bg-red-100 text-red-600 rounded-xl flex items-center justify-center transition-all" title="Supprimer">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </div>
            @endif
        @endauth
    </div>

    <!-- Layout principal : 2 Colonnes -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <!-- Colonne Gauche (Détails du bien) -->
        <div class="lg:col-span-2 space-y-6">

            <!-- Image du bien avec effet de zoom dynamique (group / group-hover) -->
            <div class="group bg-gray-100 rounded-2xl overflow-hidden h-[400px] flex items-center justify-center relative shadow-sm border border-gray-200">
                @if($property->images && $property->images->first())
                    @php 
                        $propertyImgUrl = \Illuminate\Support\Facades\Storage::url($property->images->first()->image_path); 
                    @endphp
                    <!-- Image cliquable -->
                    <img src="{{ $propertyImgUrl }}" 
                         class="w-full h-full object-cover cursor-pointer group-hover:scale-110 transition-transform duration-500 ease-out"
                         onclick="window.openPropertyModal('{{ $propertyImgUrl }}')"
                         alt="{{ $property->title }}"
                         title="Cliquer pour agrandir">

                    <div class="absolute bottom-4 right-4 bg-black/60 backdrop-blur-md text-white text-xs px-3 py-1.5 rounded-full flex items-center gap-2 pointer-events-none shadow-lg">
                        <i class="fa-solid fa-expand"></i> Cliquer pour agrandir
                    </div>
                @else
                    <div class="text-gray-400 flex flex-col items-center">
                        <i class="fa-solid fa-image text-5xl mb-2"></i>
                        <span>Aucune image disponible</span>
                    </div>
                @endif
            </div>

            <!-- Description du bien -->
            <div class="bg-white rounded-2xl border border-gray-100 p-6 shadow-sm">
                <div class="flex items-center justify-between border-b border-gray-100 pb-4 mb-4">
                    <div>
                        <span class="text-xs text-gray-400 uppercase font-semibold">Prix du loyer</span>
                        <p class="text-3xl font-black text-orange-500">{{ number_format($property->price, 0, ',', ' ') }} <span class="text-sm font-normal text-gray-500">FCFA / mois</span></p>
                    </div>
                </div>

                <h3 class="text-lg font-bold text-gray-900 mb-2">Description</h3>
                <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $property->description }}</p>
            </div>

        </div>

        <!-- Colonne Droite (Contact du Propriétaire / Bailleur) -->
        <div class="space-y-6">
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm space-y-4 sticky top-24">
                <h3 class="text-lg font-bold text-gray-900 border-b border-gray-100 pb-3">Contact du Propriétaire</h3>

                @if($property->user)
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center font-bold text-lg">
                            {{ strtoupper(substr($property->user->name, 0, 1)) }}
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">{{ $property->user->name }}</h4>
                            <p class="text-xs text-gray-400">Bailleur vérifié</p>
                        </div>
                    </div>

                    <div class="space-y-3 pt-2 text-sm text-gray-600">
                        <!-- Email -->
                        @if($property->user->email)
                            <div class="flex items-center gap-3">
                                <i class="fa-solid fa-envelope text-orange-500 w-5"></i>
                                <a href="mailto:{{ $property->user->email }}" class="hover:text-orange-500 transition-colors font-medium break-all">
                                    {{ $property->user->email }}
                                </a>
                            </div>
                        @endif

                        <!-- Téléphone -->
                        @php $phone = $property->phone ?? $property->user->phone ?? null; @endphp
                        @if($phone)
                            <div class="flex items-center gap-3">
                                <i class="fa-solid fa-phone text-orange-500 w-5"></i>
                                <a href="tel:{{ $phone }}" class="hover:text-orange-500 transition-colors font-medium">
                                    {{ $phone }}
                                </a>
                            </div>

                            <!-- Message WhatsApp formaté -->
                            @php
                                $cleanPhone = preg_replace('/[^0-9]/', '', $phone);
                                $propertyUrl = route('properties.show', $property->id);
                                $imageUrl = ($property->images && $property->images->first()) 
                                    ? url(\Illuminate\Support\Facades\Storage::url($property->images->first()->image_path)) 
                                    : null;

                                $whatsappMessage = "📊 *DEMANDE D'INFORMATION — IMMOAPP*\n\n"
                                    . "Bonjour " . $property->user->name . ",\n\n"
                                    . "📍 *Bien concerné :* " . $property->title . "\n"
                                    . "💵 *Loyer :* " . number_format($property->price, 0, ',', ' ') . " FCFA\n"
                                    . ($imageUrl ? "🖼️ *Photo :* " . $imageUrl . "\n" : "")
                                    . "🔗 *Lien :* " . $propertyUrl . "\n\n"
                                    . "-----------------------------------\n"
                                    . "🔘 *Statut de disponibilité :*\n"
                                    . "[  ] Toujours disponible\n"
                                    . "[  ] Déjà réservé / Loué\n\n"
                                    . "🔘 *Possibilité de visite :*\n"
                                    . "[  ] Disponible aujourd'hui\n"
                                    . "[  ] Sur rendez-vous uniquement\n"
                                    . "-----------------------------------\n\n"
                                    . "Merci de votre retour !";
                            @endphp

                            <!-- Bouton WhatsApp -->
                            <a href="https://wa.me/{{ $cleanPhone }}?text={{ urlencode($whatsappMessage) }}" target="_blank" class="flex items-center justify-center gap-2 w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-3 rounded-xl shadow-md transition-all mt-4">
                                <i class="fa-brands fa-whatsapp text-lg"></i>
                                Contacter sur WhatsApp
                            </a>
                        @endif
                    </div>
                @else
                    <p class="text-sm text-gray-500">Informations du propriétaire non disponibles.</p>
                @endif
            </div>
        </div>

    </div>

</div>

<!-- Modal plein écran occupant 100% de la largeur et de la hauteur -->
<div id="propertyImageModal" onclick="window.closePropertyModal()" style="display:none; position:fixed; inset:0; z-index:99999; background:rgba(0, 0, 0, 0.95); justify-content:center; align-items:center; padding:0; cursor:zoom-out;">
    <span style="position:absolute; top:20px; right:30px; color:#fff; font-size:45px; font-weight:bold; cursor:pointer; z-index:100000; text-shadow: 0 2px 4px rgba(0,0,0,0.8);" title="Fermer">&times;</span>
    <img id="propertyModalImg" src="" style="width:100%; height:100%; object-fit:cover; display:block;" onclick="event.stopPropagation()">
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