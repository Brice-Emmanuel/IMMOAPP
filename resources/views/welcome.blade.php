@extends('layouts.app')

@section('content')
<!-- SECTION HERO (Image de fond nette et éclatante) -->
<section class="relative pt-12 pb-20 overflow-hidden border-b border-slate-100 bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('images/fond.jpg') }}');">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-6 space-y-6 bg-white/90 backdrop-blur-sm p-8 rounded-3xl shadow-xl border border-white/50">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-orange-500/10 border border-orange-500/20 text-orange-600 text-xs font-semibold uppercase tracking-wider">
                    <span class="w-2 h-2 rounded-full bg-orange-500"></span>
                    UNE GESTION PLUS SIMPLE
                </div>

                <h1 class="text-5xl lg:text-6xl font-black text-slate-900 tracking-tight leading-[1.1]">
                    Trouvez votre logement. <br>
                    <span class="text-orange-500">Maîtrisez vos locations.</span>
                </h1>

                <p class="text-slate-600 text-lg leading-relaxed">
                    ImmoApp vous permet de mettre en relation bailleurs et locataires, de publier vos annonces de biens immobiliers et de gérer la disponibilité en un seul endroit.
                </p>

                <div class="flex flex-wrap items-center gap-4 pt-2">
                    <a href="{{ route('properties.index') }}" class="inline-flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-3.5 rounded-xl shadow-lg shadow-orange-500/25 transition-all">
                        Explorer les biens
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center bg-white border border-slate-200 hover:border-slate-300 text-slate-800 font-semibold px-6 py-3.5 rounded-xl transition-all shadow-sm">
                        Se connecter
                    </a>
                </div>

                <div class="flex items-center gap-6 pt-4 text-xs font-semibold text-slate-600">
                    <span class="flex items-center gap-1.5"><i class="fa-solid fa-check text-orange-500"></i> Simple</span>
                    <span class="flex items-center gap-1.5"><i class="fa-solid fa-check text-orange-500"></i> Vérifié</span>
                    <span class="flex items-center gap-1.5"><i class="fa-solid fa-check text-orange-500"></i> Direct Bailleur</span>
                </div>
            </div>

            <!-- Dashboard Preview Card -->
            <div class="lg:col-span-6 relative">
                <div class="bg-slate-900/90 backdrop-blur-md rounded-2xl p-4 shadow-2xl border border-slate-800 relative">
                    <div class="flex items-center gap-2 mb-4 px-2">
                        <div class="w-3 h-3 rounded-full bg-red-500"></div>
                        <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                        <div class="w-3 h-3 rounded-full bg-green-500"></div>
                    </div>
                    <div class="bg-slate-950/90 rounded-xl p-6 border border-slate-800 space-y-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-xs text-orange-400 font-medium">TABLEAU DE BORD BAILLEUR</span>
                                <h3 class="text-lg font-bold text-white">Gestion de vos annonces</h3>
                            </div>
                            <span class="bg-green-500/20 text-green-400 text-xs px-3 py-1 rounded-full font-semibold">100% Vérifié</span>
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="bg-slate-900 p-4 rounded-lg border border-slate-800">
                                <span class="text-xs text-slate-400">Annonces Actives</span>
                                <p class="text-2xl font-bold text-white mt-1">12 Biens</p>
                            </div>
                            <div class="bg-slate-900 p-4 rounded-lg border border-slate-800">
                                <span class="text-xs text-slate-400">Demandes Directes</span>
                                <p class="text-2xl font-bold text-orange-400 mt-1">28 Contacts</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- SECTION CARROUSEL PUBLICITAIRE (Défilement en temps réel) -->
<div class="relative w-full overflow-hidden bg-slate-950 py-6 border-b border-slate-800">
    <div class="flex space-x-6 animate-marquee whitespace-nowrap">
        <!-- Bloc 1 -->
        <div class="inline-block w-80 h-48 flex-shrink-0 rounded-2xl overflow-hidden shadow-xl border border-slate-800">
            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c" alt="Immobilier 1" class="w-full h-full object-cover">
        </div>
        <!-- Bloc 2 -->
        <div class="inline-block w-80 h-48 flex-shrink-0 rounded-2xl overflow-hidden shadow-xl border border-slate-800">
            <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750" alt="Immobilier 2" class="w-full h-full object-cover">
        </div>
        <!-- Bloc 3 -->
        <div class="inline-block w-80 h-48 flex-shrink-0 rounded-2xl overflow-hidden shadow-xl border border-slate-800">
            <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9" alt="Immobilier 3" class="w-full h-full object-cover">
        </div>
        <!-- Bloc 4 -->
        <div class="inline-block w-80 h-48 flex-shrink-0 rounded-2xl overflow-hidden shadow-xl border border-slate-800">
            <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c" alt="Immobilier 4" class="w-full h-full object-cover">
        </div>
        <!-- Duplication pour un effet de boucle infini fluide -->
        <div class="inline-block w-80 h-48 flex-shrink-0 rounded-2xl overflow-hidden shadow-xl border border-slate-800">
            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c" alt="Immobilier 1" class="w-full h-full object-cover">
        </div>
        <div class="inline-block w-80 h-48 flex-shrink-0 rounded-2xl overflow-hidden shadow-xl border border-slate-800">
            <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750" alt="Immobilier 2" class="w-full h-full object-cover">
        </div>
    </div>
</div>

<style>
@keyframes marquee {
    0% { transform: translateX(0%); }
    100% { transform: translateX(-50%); }
}
.animate-marquee {
    display: flex;
    width: max-content;
    animation: marquee 25s linear infinite;
}
.animate-marquee:hover {
    animation-play-state: paused;
}
</style>

<!-- SECTION LE PROBLÈME / POURQUOI -->
<section id="pourquoi" class="py-20 bg-slate-50 border-b border-slate-200 text-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
            <span class="text-xs font-bold text-orange-600 uppercase tracking-widest">LE PROBLÈME</span>
            <h2 class="text-4xl font-extrabold text-slate-900">La recherche de logement ne devrait pas être compliquée.</h2>
            <p class="text-slate-600">Quand les informations sont éparpillées, il devient difficile d'accéder à des offres fiables.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-all space-y-4">
                <div class="w-10 h-10 rounded-lg bg-orange-500/10 text-orange-600 flex items-center justify-center text-lg font-bold">!</div>
                <h3 class="font-bold text-lg text-slate-900">Annonces Obsolètes</h3>
                <p class="text-sm text-slate-600 leading-relaxed">Vous découvrez parfois qu'un logement est déjà loué alors que vous aviez fait le déplacement.</p>
            </div>
            <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-all space-y-4">
                <div class="w-10 h-10 rounded-lg bg-orange-500/10 text-orange-600 flex items-center justify-center text-lg font-bold"><i class="fa-solid fa-arrows-rotate"></i></div>
                <h3 class="font-bold text-lg text-slate-900">Intermédiaires Multiples</h3>
                <p class="text-sm text-slate-600 leading-relaxed">Des frais d'agences imprévus et une communication difficile avec le véritable propriétaire.</p>
            </div>
            <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-all space-y-4">
                <div class="w-10 h-10 rounded-lg bg-orange-500/10 text-orange-600 flex items-center justify-center text-lg font-bold"><i class="fa-solid fa-shield-halved"></i></div>
                <h3 class="font-bold text-lg text-slate-900">Manque de Sécurité</h3>
                <p class="text-sm text-slate-600 leading-relaxed">Risque élevé de fausses annonces sans vérification préalable de la pièce d'identité du bailleur.</p>
            </div>
            <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-all space-y-4">
                <div class="w-10 h-10 rounded-lg bg-orange-500/10 text-orange-600 flex items-center justify-center text-lg font-bold"><i class="fa-solid fa-eye-slash"></i></div>
                <h3 class="font-bold text-lg text-slate-900">Visibilité Limitée</h3>
                <p class="text-sm text-slate-600 leading-relaxed">Les bailleurs peinent à trouver des locataires sérieux rapidement et de manière organisée.</p>
            </div>
        </div>
    </div>
</section>

<!-- SECTION FONCTIONNALITÉS -->
<section id="fonctionnalites" class="py-24 bg-white text-slate-900 border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        <div class="text-center max-w-3xl mx-auto space-y-3">
            <span class="text-xs font-bold text-orange-600 uppercase tracking-widest">LA SOLUTION</span>
            <h2 class="text-4xl lg:text-5xl font-black tracking-tight text-slate-900">Tout ce dont vous avez besoin pour vos transactions.</h2>
            <p class="text-slate-600">Une plateforme pensée pour centraliser les opérations essentielles de l'immobilier.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-slate-50 border border-slate-200 p-8 rounded-2xl hover:border-slate-300 transition-all space-y-4">
                <div class="w-12 h-12 rounded-xl bg-orange-500/10 flex items-center justify-center text-orange-600 text-xl"><i class="fa-solid fa-house"></i></div>
                <h3 class="text-xl font-bold text-slate-900">Publier vos biens</h3>
                <p class="text-slate-600 text-sm leading-relaxed">Ajoutez, organisez et diffusez vos logements avec photos HD et caractéristiques détaillées.</p>
            </div>

            <div class="bg-slate-50 border border-slate-200 p-8 rounded-2xl hover:border-slate-300 transition-all space-y-4">
                <div class="w-12 h-12 rounded-xl bg-orange-500/10 flex items-center justify-center text-orange-600 text-xl"><i class="fa-solid fa-sliders"></i></div>
                <h3 class="text-xl font-bold text-slate-900">Filtrage Intelligent</h3>
                <p class="text-slate-600 text-sm leading-relaxed">Recherche avancée par ville, quartier, prix et type de logement pour des résultats précis.</p>
            </div>

            <div class="bg-slate-50 border border-slate-200 p-8 rounded-2xl hover:border-slate-300 transition-all space-y-4">
                <div class="w-12 h-12 rounded-xl bg-orange-500/10 flex items-center justify-center text-orange-600 text-xl"><i class="fa-brands fa-whatsapp"></i></div>
                <h3 class="text-xl font-bold text-slate-900">Contact Direct</h3>
                <p class="text-slate-600 text-sm leading-relaxed">Mise en relation instantanée par appel ou WhatsApp sans intermédiaire masqué.</p>
            </div>

            <div class="bg-slate-50 border border-slate-200 p-8 rounded-2xl hover:border-slate-300 transition-all space-y-4">
                <div class="w-12 h-12 rounded-xl bg-orange-500/10 flex items-center justify-center text-orange-600 text-xl"><i class="fa-solid fa-id-card"></i></div>
                <h3 class="text-xl font-bold text-slate-900">Bailleurs Vérifiés</h3>
                <p class="text-slate-600 text-sm leading-relaxed">Modération administrative stricte avec validation de la CNI pour chaque bailleur.</p>
            </div>

            <div class="bg-slate-50 border border-slate-200 p-8 rounded-2xl hover:border-slate-300 transition-all space-y-4">
                <div class="w-12 h-12 rounded-xl bg-orange-500/10 flex items-center justify-center text-orange-600 text-xl"><i class="fa-solid fa-toggle-on"></i></div>
                <h3 class="text-xl font-bold text-slate-900">Gestion des Statuts</h3>
                <p class="text-slate-600 text-sm leading-relaxed">Passez un bien en "Occupé" ou "Disponible" en un clic depuis votre espace.</p>
            </div>

            <div class="bg-slate-50 border border-slate-200 p-8 rounded-2xl hover:border-slate-300 transition-all space-y-4">
                <div class="w-12 h-12 rounded-xl bg-orange-500/10 flex items-center justify-center text-orange-600 text-xl"><i class="fa-solid fa-bell"></i></div>
                <h3 class="text-xl font-bold text-slate-900">Alertes & Notifications</h3>
                <p class="text-slate-600 text-sm leading-relaxed">Soyez averti dès la validation de votre annonce par l'équipe de modération.</p>
            </div>
        </div>
    </div>
</section>

<!-- SECTION FAQ -->
<section id="faq" class="py-20 bg-white border-b border-slate-200">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-16 space-y-3">
            <span class="text-orange-500 font-bold text-xs uppercase tracking-wider bg-orange-50 px-3 py-1 rounded-full">Questions fréquentes</span>
            <h2 class="text-3xl sm:text-4xl font-black text-slate-900">Vous avez des questions ?</h2>
            <p class="text-slate-600 text-sm">Tout ce que vous devez savoir sur la recherche et la gestion de biens avec ImmoApp.</p>
        </div>

        <div class="space-y-4" x-data="{ selected: null }">
            
            <!-- Question 1 -->
            <div class="border border-slate-200 rounded-2xl overflow-hidden transition-all shadow-sm">
                <button @click="selected !== 1 ? selected = 1 : selected = null" class="w-full flex items-center justify-between p-5 text-left bg-white hover:bg-slate-50 transition-colors cursor-pointer">
                    <span class="font-bold text-slate-900 text-sm sm:text-base">Qu'est-ce qu'ImmoApp ?</span>
                    <i class="fa-solid fa-chevron-down text-orange-500 transition-transform duration-300" :class="{ 'rotate-180': selected === 1 }"></i>
                </button>
                <div x-show="selected === 1" style="display: none;" class="px-5 pb-5 text-slate-600 text-sm leading-relaxed border-t border-slate-100 pt-3">
                    ImmoApp est une plateforme moderne de gestion immobilière qui permet aux locataires de trouver facilement des logements de qualité et offre aux bailleurs et administrateurs un espace complet pour publier, suivre et gérer leurs biens en toute simplicité.
                </div>
            </div>

            <!-- Question 2 -->
            <div class="border border-slate-200 rounded-2xl overflow-hidden transition-all shadow-sm">
                <button @click="selected !== 2 ? selected = 2 : selected = null" class="w-full flex items-center justify-between p-5 text-left bg-white hover:bg-slate-50 transition-colors cursor-pointer">
                    <span class="font-bold text-slate-900 text-sm sm:text-base">Comment contacter directement un propriétaire ?</span>
                    <i class="fa-solid fa-chevron-down text-orange-500 transition-transform duration-300" :class="{ 'rotate-180': selected === 2 }"></i>
                </button>
                <div x-show="selected === 2" style="display: none;" class="px-5 pb-5 text-slate-600 text-sm leading-relaxed border-t border-slate-100 pt-3">
                    Sur chaque page de détail d'un bien immobilier, un bouton dédié vous permet d'entrer directement en contact avec le bailleur via WhatsApp avec un message pré-rempli contenant toutes les informations du logement.
                </div>
            </div>

            <!-- Question 3 -->
            <div class="border border-slate-200 rounded-2xl overflow-hidden transition-all shadow-sm">
                <button @click="selected !== 3 ? selected = 3 : selected = null" class="w-full flex items-center justify-between p-5 text-left bg-white hover:bg-slate-50 transition-colors cursor-pointer">
                    <span class="font-bold text-slate-900 text-sm sm:text-base">Puis-je publier mes propres annonces de biens ?</span>
                    <i class="fa-solid fa-chevron-down text-orange-500 transition-transform duration-300" :class="{ 'rotate-180': selected === 3 }"></i>
                </button>
                <div x-show="selected === 3" style="display: none;" class="px-5 pb-5 text-slate-600 text-sm leading-relaxed border-t border-slate-100 pt-3">
                    Oui ! Il vous suffit de créer un compte en tant que bailleur. Vous accéderez immédiatement à votre tableau de bord personnel pour ajouter, modifier ou supprimer vos annonces immobilières en quelques clics.
                </div>
            </div>

            <!-- Question 4 -->
            <div class="border border-slate-200 rounded-2xl overflow-hidden transition-all shadow-sm">
                <button @click="selected !== 4 ? selected = 4 : selected = null" class="w-full flex items-center justify-between p-5 text-left bg-white hover:bg-slate-50 transition-colors cursor-pointer">
                    <span class="font-bold text-slate-900 text-sm sm:text-base">Comment accéder à mon espace après la création du compte ?</span>
                    <i class="fa-solid fa-chevron-down text-orange-500 transition-transform duration-300" :class="{ 'rotate-180': selected === 4 }"></i>
                </button>
                <div x-show="selected === 4" style="display: none;" class="px-5 pb-5 text-slate-600 text-sm leading-relaxed border-t border-slate-100 pt-3">
                    Une fois connecté, un lien "Mon Espace" apparaît automatiquement dans la barre de navigation supérieure pour vous rediriger vers votre tableau de bord de gestion.
                </div>
            </div>

            <!-- Question 5 -->
            <div class="border border-slate-200 rounded-2xl overflow-hidden transition-all shadow-sm">
                <button @click="selected !== 5 ? selected = 5 : selected = null" class="w-full flex items-center justify-between p-5 text-left bg-white hover:bg-slate-50 transition-colors cursor-pointer">
                    <span class="font-bold text-slate-900 text-sm sm:text-base">L'utilisation d'ImmoApp nécessite-t-elle des compétences techniques ?</span>
                    <i class="fa-solid fa-chevron-down text-orange-500 transition-transform duration-300" :class="{ 'rotate-180': selected === 5 }"></i>
                </button>
                <div x-show="selected === 5" style="display: none;" class="px-5 pb-5 text-slate-600 text-sm leading-relaxed border-t border-slate-100 pt-3">
                    Absolument pas. L'interface a été conçue pour être fluide, intuitive et accessible à tous, que vous soyez à la recherche d'un logement ou gestionnaire de biens.
                </div>
            </div>

        </div>

    </div>
</section>

<!-- SECTION BAILLEURS -->
<section id="bailleurs" class="py-20 bg-slate-50 border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-orange-500 rounded-3xl p-10 md:p-16 text-white flex flex-col md:flex-row items-center justify-between gap-8 shadow-xl">
            <div class="space-y-4 max-w-2xl">
                <span class="text-xs font-extrabold uppercase tracking-widest bg-white/20 px-3 py-1 rounded-full">Espace Propriétaire</span>
                <h2 class="text-3xl md:text-4xl font-black">Vous êtes propriétaire d'un bien à louer ?</h2>
                <p class="text-orange-100 text-sm md:text-base leading-relaxed">Publiez vos annonces gratuitement, gérez la disponibilité de vos logements et recevez des demandes directement des locataires.</p>
            </div>
            <div>
                <a href="{{ route('register') }}" class="inline-block bg-white text-orange-600 hover:bg-orange-50 font-bold px-8 py-4 rounded-xl shadow-md transition-all whitespace-nowrap">
                    Publier une annonce
                </a>
            </div>
        </div>
    </div>
</section>

<!-- SECTION AVIS -->
<section id="avis" class="py-20 bg-white border-b border-slate-200 text-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
            <span class="text-xs font-bold text-orange-600 uppercase tracking-widest">TÉMOIGNAGES</span>
            <h2 class="text-4xl font-extrabold text-slate-900">Ce que disent nos utilisateurs</h2>
            <p class="text-slate-600">Découvrez l'expérience des locataires et bailleurs qui utilisent ImmoApp au quotidien.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-slate-50 p-8 rounded-2xl border border-slate-200 shadow-sm space-y-4">
                <div class="flex items-center gap-1 text-orange-500 text-sm">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p class="text-slate-600 text-sm leading-relaxed">"J'ai trouvé mon appartement à Douala en moins de 48h sans payer de frais de visite inutiles."</p>
                <div class="font-bold text-slate-900 text-sm">— Paul N.</div>
            </div>

            <div class="bg-slate-50 p-8 rounded-2xl border border-slate-200 shadow-sm space-y-4">
                <div class="flex items-center gap-1 text-orange-500 text-sm">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p class="text-slate-600 text-sm leading-relaxed">"En tant que bailleur, la possibilité de marquer un bien comme occupé d'un simple clic me fait gagner énormément de temps."</p>
                <div class="font-bold text-slate-900 text-sm">— Marc K.</div>
            </div>

            <div class="bg-slate-50 p-8 rounded-2xl border border-slate-200 shadow-sm space-y-4">
                <div class="flex items-center gap-1 text-orange-500 text-sm">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p class="text-slate-600 text-sm leading-relaxed">"La vérification des bailleurs donne une réelle tranquillité d'esprit avant de contacter le propriétaire."</p>
                <div class="font-bold text-slate-900 text-sm">— Sarah M.</div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION CONTACT -->
<section id="contact" class="py-20 bg-slate-50 text-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
        <span class="text-xs font-bold text-orange-600 uppercase tracking-widest">CONTACT</span>
        <h2 class="text-4xl font-extrabold text-slate-900">Une question ? Un besoin spécifique ?</h2>
        <p class="text-slate-600 max-w-xl mx-auto">Notre équipe est à votre disposition pour vous accompagner dans la recherche ou la gestion de vos biens.</p>
        <div class="pt-4">
            <a href="mailto:contact@immoapp.com" class="inline-flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white font-semibold px-8 py-3.5 rounded-xl shadow-lg shadow-orange-500/25 transition-all">
                <i class="fa-solid fa-envelope"></i> Nous contacter
            </a>
        </div>
    </div>
</section>
@endsection