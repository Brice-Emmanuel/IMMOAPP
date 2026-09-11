@extends('layouts.app')

@section('content')
<!-- SECTION HERO -->
<section class="relative bg-white pt-12 pb-20 overflow-hidden border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-6 space-y-6">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-orange-50 border border-orange-200 text-orange-600 text-xs font-semibold uppercase tracking-wider">
                    <span class="w-2 h-2 rounded-full bg-orange-500"></span>
                    UNE GESTION PLUS SIMPLE
                </div>

                <h1 class="text-5xl lg:text-6xl font-black text-gray-900 tracking-tight leading-[1.1]">
                    Trouvez votre logement. <br>
                    <span class="text-orange-500">Maîtrisez vos locations.</span>
                </h1>

                <p class="text-gray-500 text-lg leading-relaxed">
                    ImmoApp vous permet de mettre en relation bailleurs et locataires, de publier vos annonces de biens immobiliers et de gérer la disponibilité en un seul endroit.
                </p>

                <div class="flex flex-wrap items-center gap-4 pt-2">
                    <a href="{{ route('properties.index') }}" class="inline-flex items-center gap-2 bg-black hover:bg-gray-800 text-white font-semibold px-6 py-3.5 rounded-xl shadow-lg transition-all">
                        Explorer les biens
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center bg-white border border-gray-200 hover:border-gray-300 text-gray-800 font-semibold px-6 py-3.5 rounded-xl transition-all">
                        Se connecter
                    </a>
                </div>

                <div class="flex items-center gap-6 pt-4 text-xs font-semibold text-gray-500">
                    <span class="flex items-center gap-1.5"><i class="fa-solid fa-check text-orange-500"></i> Simple</span>
                    <span class="flex items-center gap-1.5"><i class="fa-solid fa-check text-orange-500"></i> Vérifié</span>
                    <span class="flex items-center gap-1.5"><i class="fa-solid fa-check text-orange-500"></i> Direct Bailleur</span>
                </div>
            </div>

            <!-- Dashboard Preview Card -->
            <div class="lg:col-span-6 relative">
                <div class="bg-gray-900 rounded-2xl p-4 shadow-2xl border border-gray-800 relative">
                    <div class="flex items-center gap-2 mb-4 px-2">
                        <div class="w-3 h-3 rounded-full bg-red-500"></div>
                        <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                        <div class="w-3 h-3 rounded-full bg-green-500"></div>
                    </div>
                    <div class="bg-gray-800/60 backdrop-blur rounded-xl p-6 border border-gray-700/50 space-y-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-xs text-orange-400 font-medium">TABLEAU DE BORD BAILLEUR</span>
                                <h3 class="text-lg font-bold text-white">Gestion de vos annonces</h3>
                            </div>
                            <span class="bg-green-500/20 text-green-400 text-xs px-3 py-1 rounded-full font-semibold">100% Vérifié</span>
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="bg-gray-900/80 p-4 rounded-lg border border-gray-700">
                                <span class="text-xs text-gray-400">Annonces Actives</span>
                                <p class="text-2xl font-bold text-white mt-1">12 Biens</p>
                            </div>
                            <div class="bg-gray-900/80 p-4 rounded-lg border border-gray-700">
                                <span class="text-xs text-gray-400">Demandes Directes</span>
                                <p class="text-2xl font-bold text-orange-400 mt-1">28 Contacts</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- SECTION LE PROBLÈME / POURQUOI -->
<section id="pourquoi" class="py-20 bg-gray-50 border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
            <span class="text-xs font-bold text-orange-600 uppercase tracking-widest">LE PROBLÈME</span>
            <h2 class="text-4xl font-extrabold text-gray-900">La recherche de logement ne devrait pas être compliquée.</h2>
            <p class="text-gray-500">Quand les informations sont éparpillées, il devient difficile d'accéder à des offres fiables.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-all space-y-4">
                <div class="w-10 h-10 rounded-lg bg-orange-50 text-orange-500 flex items-center justify-center text-lg font-bold">!</div>
                <h3 class="font-bold text-lg text-gray-900">Annonces Obsolètes</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Vous découvrez parfois qu'un logement est déjà loué alors que vous aviez fait le déplacement.</p>
            </div>
            <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-all space-y-4">
                <div class="w-10 h-10 rounded-lg bg-orange-50 text-orange-500 flex items-center justify-center text-lg font-bold"><i class="fa-solid fa-arrows-rotate"></i></div>
                <h3 class="font-bold text-lg text-gray-900">Intermédiaires Multiples</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Des frais d'agences imprévus et une communication difficile avec le véritable propriétaire.</p>
            </div>
            <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-all space-y-4">
                <div class="w-10 h-10 rounded-lg bg-orange-50 text-orange-500 flex items-center justify-center text-lg font-bold"><i class="fa-solid fa-shield-halved"></i></div>
                <h3 class="font-bold text-lg text-gray-900">Manque de Sécurité</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Risque élevé de fausses annonces sans vérification préalable de la pièce d'identité du bailleur.</p>
            </div>
            <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-all space-y-4">
                <div class="w-10 h-10 rounded-lg bg-orange-50 text-orange-500 flex items-center justify-center text-lg font-bold"><i class="fa-solid fa-eye-slash"></i></div>
                <h3 class="font-bold text-lg text-gray-900">Visibilité Limitée</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Les bailleurs peinent à trouver des locataires sérieux rapidement et de manière organisée.</p>
            </div>
        </div>
    </div>
</section>

<!-- SECTION FONCTIONNALITÉS -->
<section id="fonctionnalites" class="py-24 bg-[#0d1117] text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        <div class="text-center max-w-3xl mx-auto space-y-3">
            <span class="text-xs font-bold text-orange-500 uppercase tracking-widest">LA SOLUTION</span>
            <h2 class="text-4xl lg:text-5xl font-black tracking-tight">Tout ce dont vous avez besoin pour vos transactions.</h2>
            <p class="text-gray-400">Une plateforme pensée pour centraliser les opérations essentielles de l'immobilier.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-[#161b22] border border-gray-800 p-8 rounded-2xl hover:border-gray-700 transition-all space-y-4">
                <div class="w-12 h-12 rounded-xl bg-gray-800 flex items-center justify-center text-orange-400 text-xl"><i class="fa-solid fa-house"></i></div>
                <h3 class="text-xl font-bold">Publier vos biens</h3>
                <p class="text-gray-400 text-sm leading-relaxed">Ajoutez, organisez et diffusez vos logements avec photos HD et caractéristiques détaillées.</p>
            </div>

            <div class="bg-[#161b22] border border-gray-800 p-8 rounded-2xl hover:border-gray-700 transition-all space-y-4">
                <div class="w-12 h-12 rounded-xl bg-gray-800 flex items-center justify-center text-orange-400 text-xl"><i class="fa-solid fa-sliders"></i></div>
                <h3 class="text-xl font-bold">Filtrage Intelligent</h3>
                <p class="text-gray-400 text-sm leading-relaxed">Recherche avancée par ville, quartier, prix et type de logement pour des résultats précis.</p>
            </div>

            <div class="bg-[#161b22] border border-gray-800 p-8 rounded-2xl hover:border-gray-700 transition-all space-y-4">
                <div class="w-12 h-12 rounded-xl bg-gray-800 flex items-center justify-center text-orange-400 text-xl"><i class="fa-brands fa-whatsapp"></i></div>
                <h3 class="text-xl font-bold">Contact Direct</h3>
                <p class="text-gray-400 text-sm leading-relaxed">Mise en relation instantanée par appel ou WhatsApp sans intermédiaire masqué.</p>
            </div>

            <div class="bg-[#161b22] border border-gray-800 p-8 rounded-2xl hover:border-gray-700 transition-all space-y-4">
                <div class="w-12 h-12 rounded-xl bg-gray-800 flex items-center justify-center text-orange-400 text-xl"><i class="fa-solid fa-id-card"></i></div>
                <h3 class="text-xl font-bold">Bailleurs Vérifiés</h3>
                <p class="text-gray-400 text-sm leading-relaxed">Modération administrative stricte avec validation de la CNI pour chaque bailleur.</p>
            </div>

            <div class="bg-[#161b22] border border-gray-800 p-8 rounded-2xl hover:border-gray-700 transition-all space-y-4">
                <div class="w-12 h-12 rounded-xl bg-gray-800 flex items-center justify-center text-orange-400 text-xl"><i class="fa-solid fa-toggle-on"></i></div>
                <h3 class="text-xl font-bold">Gestion des Statuts</h3>
                <p class="text-gray-400 text-sm leading-relaxed">Passez un bien en "Occupé" ou "Disponible" en un clic depuis votre espace.</p>
            </div>

            <div class="bg-[#161b22] border border-gray-800 p-8 rounded-2xl hover:border-gray-700 transition-all space-y-4">
                <div class="w-12 h-12 rounded-xl bg-gray-800 flex items-center justify-center text-orange-400 text-xl"><i class="fa-solid fa-bell"></i></div>
                <h3 class="text-xl font-bold">Alertes & Notifications</h3>
                <p class="text-gray-400 text-sm leading-relaxed">Soyez averti dès la validation de votre annonce par l'équipe de modération.</p>
            </div>
        </div>
    </div>
</section>

<!-- SECTION BAILLEURS -->
<section id="bailleurs" class="py-20 bg-white border-b border-gray-100">
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
<section id="avis" class="py-20 bg-gray-50 border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
            <span class="text-xs font-bold text-orange-600 uppercase tracking-widest">TÉMOIGNAGES</span>
            <h2 class="text-4xl font-extrabold text-gray-900">Ce que disent nos utilisateurs</h2>
            <p class="text-gray-500">Découvrez l'expérience des locataires et bailleurs qui utilisent ImmoApp au quotidien.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-sm space-y-4">
                <div class="flex items-center gap-1 text-orange-500 text-sm">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p class="text-gray-600 text-sm leading-relaxed">"J'ai trouvé mon appartement à Douala en moins de 48h sans payer de frais de visite inutiles."</p>
                <div class="font-bold text-gray-900 text-sm">— Paul N.</div>
            </div>

            <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-sm space-y-4">
                <div class="flex items-center gap-1 text-orange-500 text-sm">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p class="text-gray-600 text-sm leading-relaxed">"En tant que bailleur, la possibilité de marquer un bien comme occupé d'un simple clic me fait gagner énormément de temps."</p>
                <div class="font-bold text-gray-900 text-sm">— Marc K.</div>
            </div>

            <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-sm space-y-4">
                <div class="flex items-center gap-1 text-orange-500 text-sm">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p class="text-gray-600 text-sm leading-relaxed">"La vérification des bailleurs donne une réelle tranquillité d'esprit avant de contacter le propriétaire."</p>
                <div class="font-bold text-gray-900 text-sm">— Sarah M.</div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION CONTACT -->
<section id="contact" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
        <span class="text-xs font-bold text-orange-600 uppercase tracking-widest">CONTACT</span>
        <h2 class="text-4xl font-extrabold text-gray-900">Une question ? Un besoin spécifique ?</h2>
        <p class="text-gray-500 max-w-xl mx-auto">Notre équipe est à votre disposition pour vous accompagner dans la recherche ou la gestion de vos biens.</p>
        <div class="pt-4">
            <a href="mailto:contact@immoapp.com" class="inline-flex items-center gap-2 bg-gray-900 hover:bg-gray-800 text-white font-semibold px-8 py-3.5 rounded-xl shadow-lg transition-all">
                <i class="fa-solid fa-envelope"></i> Nous contacter
            </a>
        </div>
    </div>
</section>
@endsection