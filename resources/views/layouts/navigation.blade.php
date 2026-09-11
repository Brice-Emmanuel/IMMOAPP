<nav class="bg-white border-b border-gray-100 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            
            <!-- Logo avec la nouvelle icône -->
            <a href="{{ url('/') }}" class="flex items-center gap-3">
                <img src="{{ asset('images/icon.png') }}" alt="immoApp" class="h-11 w-11 object-contain rounded-xl">
                <div class="flex flex-col">
                    <span class="text-2xl font-black text-slate-900 tracking-tight leading-none">
                        immo<span class="text-orange-500">App</span>
                    </span>
                    <span class="text-[9px] font-bold text-gray-400 uppercase tracking-widest mt-1">
                        GESTION IMMOBILIÈRE
                    </span>
                </div>
            </a>

            <!-- Liens au milieu -->
            <div class="hidden md:flex items-center gap-8">
                <a href="{{ url('/') }}" class="text-sm font-semibold text-slate-700 hover:text-orange-500 transition-colors">Accueil</a>
                <a href="{{ route('properties.index') }}" class="text-sm font-semibold text-slate-700 hover:text-orange-500 transition-colors">Nos Biens</a>
                <a href="{{ url('/#features') }}" class="text-sm font-semibold text-slate-700 hover:text-orange-500 transition-colors">Fonctionnalités</a>
                <a href="{{ url('/#about') }}" class="text-sm font-semibold text-slate-700 hover:text-orange-500 transition-colors">Pourquoi ImmoApp</a>
            </div>

            <!-- Actions à droite (Mon Espace & Déconnexion) -->
            <div class="flex items-center gap-6">
                @auth
                    <a href="{{ route('landlord.dashboard') }}" class="text-sm font-bold text-slate-800 hover:text-orange-500 transition-colors">Mon Espace</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-sm font-bold text-red-500 hover:text-red-600 transition-colors">Déconnexion</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-700 hover:text-orange-500 transition-colors">Connexion</a>
                    <a href="{{ route('register') }}" class="bg-orange-500 hover:bg-orange-600 text-white font-bold px-5 py-2.5 rounded-xl text-sm transition-all shadow-md shadow-orange-500/20">S'inscrire</a>
                @endauth
            </div>

        </div>
    </div>
</nav>
