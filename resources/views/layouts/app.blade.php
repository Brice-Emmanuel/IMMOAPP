<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ImmoApp - Trouvez votre logement idéal</title>
    
    <!-- PWA Config -->
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#f97316">
    <link rel="apple-touch-icon" href="{{ asset('images/icon.png') }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Alpine.js (Nécessaire pour l'interactivité de la FAQ et des composants dynamiques) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body { font-family: system-ui, -apple-system, sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 antialiased relative">

    <!-- Navbar -->
    <header class="w-full bg-white border-b border-gray-100 sticky top-0 z-40 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <img src="{{ asset('images/icon.png') }}" alt="immoApp Logo" class="h-11 w-11 object-contain rounded-xl group-hover:scale-105 transition-transform duration-200">
                <div>
                    <span class="font-extrabold text-xl tracking-tight text-gray-900">immo<span class="text-orange-500">App</span></span>
                    <span class="block text-[10px] text-gray-400 font-semibold tracking-wider uppercase -mt-1">Gestion Immobilière</span>
                </div>
            </a>

            <!-- Navigation Bureau (Desktop) -->
            <nav class="hidden xl:flex items-center gap-7 text-sm font-semibold text-gray-700">
                <a href="{{ route('home') }}" class="hover:text-orange-500 transition-colors">Accueil</a>
                <a href="{{ route('properties.index') }}" class="hover:text-orange-500 transition-colors">Nos Biens</a>
                <a href="{{ url('/#fonctionnalites') }}" class="hover:text-orange-500 transition-colors">Fonctionnalités</a>
                <a href="{{ url('/#pourquoi') }}" class="hover:text-orange-500 transition-colors">Pourquoi ImmoApp</a>
                <a href="{{ url('/#faq') }}" class="hover:text-orange-500 transition-colors">FAQ</a>
                <a href="{{ url('/#avis') }}" class="hover:text-orange-500 transition-colors">Avis</a>
                <a href="{{ url('/#contact') }}" class="hover:text-orange-500 transition-colors">Contact</a>
            </nav>

            <!-- Actions de droite & Bouton Hamburger Mobile -->
            <div class="flex items-center gap-4">
                <div class="hidden xl:flex items-center gap-5">
                    @auth
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" class="text-sm font-semibold text-gray-800 hover:text-orange-500 transition-colors">Admin</a>
                        @else
                            <a href="{{ route('landlord.dashboard') }}" class="text-sm font-semibold text-gray-800 hover:text-orange-500 transition-colors">Mon Espace</a>
                        @endif
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-sm font-semibold text-red-500 hover:text-red-600 transition-colors">Déconnexion</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-700 hover:text-orange-500 px-2 py-1">Se connecter</a>
                        <a href="{{ route('register') }}" class="bg-orange-500 hover:bg-orange-600 text-white text-sm font-semibold px-5 py-2.5 rounded-xl shadow-md transition-all">Publier une annonce</a>
                    @endauth
                </div>

                <!-- Bouton 3 traits (Hamburger) visible sur mobile/tablette -->
                <button type="button" onclick="toggleMobileMenu()" class="xl:hidden text-gray-700 hover:text-orange-500 focus:outline-none p-2.5 rounded-xl bg-gray-50 border border-gray-100">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>
            </div>

        </div>
    </header>

    <!-- 📱 MENU LATÉRAL MOBILE (Sidebar & Overlay) -->
    <div id="mobileMenuOverlay" class="fixed inset-0 bg-black/50 z-50 hidden transition-opacity" onclick="toggleMobileMenu()"></div>

    <div id="mobileSidebar" class="fixed top-0 right-0 w-80 h-full bg-white shadow-2xl z-50 transform translate-x-full transition-transform duration-300 ease-in-out flex flex-col justify-between p-6 xl:hidden">
        
        <!-- Haut du menu mobile -->
        <div>
            <div class="flex items-center justify-between border-b border-gray-100 pb-4 mb-6">
                <div class="flex items-center gap-2">
                    <span class="font-extrabold text-lg text-gray-900">immo<span class="text-orange-500">App</span></span>
                </div>
                <button onclick="toggleMobileMenu()" class="text-gray-400 hover:text-gray-700 text-xl focus:outline-none w-9 h-9 rounded-xl bg-gray-50 flex items-center justify-center">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <!-- Liens de navigation mobile -->
            <div class="flex flex-col space-y-3 font-semibold text-gray-700">
                <a href="{{ route('home') }}" class="flex items-center gap-3 hover:text-orange-500 py-2.5 px-3 rounded-xl hover:bg-orange-50 transition-colors">
                    <i class="fa-solid fa-house w-5 text-orange-500"></i> Accueil
                </a>
                <a href="{{ route('properties.index') }}" class="flex items-center gap-3 hover:text-orange-500 py-2.5 px-3 rounded-xl hover:bg-orange-50 transition-colors">
                    <i class="fa-solid fa-building w-5 text-orange-500"></i> Nos Biens
                </a>
                <a href="{{ url('/#fonctionnalites') }}" class="flex items-center gap-3 hover:text-orange-500 py-2.5 px-3 rounded-xl hover:bg-orange-50 transition-colors">
                    <i class="fa-solid fa-star w-5 text-orange-500"></i> Fonctionnalités
                </a>
                <a href="{{ url('/#pourquoi') }}" class="flex items-center gap-3 hover:text-orange-500 py-2.5 px-3 rounded-xl hover:bg-orange-50 transition-colors">
                    <i class="fa-solid fa-circle-question w-5 text-orange-500"></i> Pourquoi ImmoApp
                </a>
                <a href="{{ url('/#faq') }}" class="flex items-center gap-3 hover:text-orange-500 py-2.5 px-3 rounded-xl hover:bg-orange-50 transition-colors">
                    <i class="fa-solid fa-circle-question w-5 text-orange-500"></i> FAQ
                </a>
                <a href="{{ url('/#avis') }}" class="flex items-center gap-3 hover:text-orange-500 py-2.5 px-3 rounded-xl hover:bg-orange-50 transition-colors">
                    <i class="fa-solid fa-comments w-5 text-orange-500"></i> Avis
                </a>
                <a href="{{ url('/#contact') }}" class="flex items-center gap-3 hover:text-orange-500 py-2.5 px-3 rounded-xl hover:bg-orange-50 transition-colors">
                    <i class="fa-solid fa-envelope w-5 text-orange-500"></i> Contact
                </a>
            </div>
        </div>

        <!-- Bas du menu mobile (Espace utilisateur & Connexion) -->
        <div class="border-t border-gray-100 pt-5 space-y-3">
            @auth
                <div class="text-xs font-bold text-gray-400 uppercase px-3">Connecté en tant que</div>
                <div class="text-sm font-semibold text-gray-800 px-3 mb-2">{{ auth()->user()->name }}</div>
                
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 w-full bg-gray-50 hover:bg-gray-100 text-gray-800 font-semibold py-2.5 px-3 rounded-xl transition-all">
                        <i class="fa-solid fa-gauge text-orange-500"></i> Tableau de bord Admin
                    </a>
                @else
                    <a href="{{ route('landlord.dashboard') }}" class="flex items-center gap-3 w-full bg-gray-50 hover:bg-gray-100 text-gray-800 font-semibold py-2.5 px-3 rounded-xl transition-all">
                        <i class="fa-solid fa-gauge text-orange-500"></i> Mon Espace Bailleur
                    </a>
                @endif

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center justify-center gap-2 w-full bg-red-50 text-red-600 hover:bg-red-100 font-semibold py-2.5 rounded-xl transition-all text-center mt-2">
                        <i class="fa-solid fa-right-from-bracket"></i> Déconnexion
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-2.5 rounded-xl text-center transition-all">
                    Se connecter
                </a>
                <a href="{{ route('register') }}" class="block w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2.5 rounded-xl text-center shadow-md transition-all">
                    Publier une annonce
                </a>
            @endauth
        </div>
    </div>

    <main>
        @yield('content')
    </main>

    <!-- Pied de page -->
    <footer class="bg-gray-900 text-gray-400 py-12 border-t border-gray-800 text-sm">
        <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-8 mb-8 text-left">
            <div>
                <div class="flex items-center gap-3 mb-3">
                    <img src="{{ asset('images/icon.png') }}" alt="immoApp" class="h-8 w-8 object-contain">
                    <span class="font-extrabold text-lg text-white">immo<span class="text-orange-500">App</span></span>
                </div>
                <p class="text-xs text-gray-400 leading-relaxed">Plateforme moderne de recherche et de gestion immobilière.</p>
            </div>
            <div>
                <h4 class="text-white font-bold text-sm mb-3">Navigation</h4>
                <ul class="space-y-2 text-xs">
                    <li><a href="{{ route('home') }}" class="hover:text-orange-500">Accueil</a></li>
                    <li><a href="{{ route('properties.index') }}" class="hover:text-orange-500">Nos Biens</a></li>
                    <li><a href="{{ url('/#fonctionnalites') }}" class="hover:text-orange-500">Fonctionnalités</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-bold text-sm mb-3">Espace Bailleur</h4>
                <ul class="space-y-2 text-xs">
                    <li><a href="{{ route('register') }}" class="hover:text-orange-500">Publier une annonce</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-bold text-sm mb-3">Contact</h4>
                <ul class="space-y-2 text-xs text-gray-400">
                    <li><i class="fa-solid fa-location-dot text-orange-500 mr-2"></i> Douala, Cameroun</li>
                    <li><i class="fa-solid fa-envelope text-orange-500 mr-2"></i> emmanuelnyamsi721@gmail.com</li>
                </ul>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-4 border-t border-gray-800 pt-6 text-center text-xs text-gray-500">
            <p>&copy; {{ date('Y') }} ImmoApp. Tous droits réservés.</p>
        </div>
    </footer>

    <!-- BANNIÈRE PWA FLOTTANTE EN BAS -->
    <div id="pwa-install-banner" class="fixed bottom-0 left-0 right-0 z-50 bg-[#0f172a] border-t border-gray-800 p-4 shadow-2xl transition-all duration-300 transform translate-y-full hidden">
        <div class="max-w-7xl mx-auto flex items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-orange-500/10 border border-orange-500/20 flex items-center justify-center text-orange-500 shrink-0">
                    <i class="fa-solid fa-download text-lg"></i>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-white">Installer ImmoApp</h4>
                    <p class="text-xs text-gray-400">Accès rapide depuis votre écran d'accueil</p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <button id="pwa-install-btn" class="bg-orange-500 hover:bg-orange-600 text-white text-xs font-semibold px-4 py-2.5 rounded-xl shadow-md transition-all">
                    Installer
                </button>
                <button id="pwa-close-btn" class="text-gray-400 hover:text-white p-2">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/lightbox.js') }}"></script>

    <!-- Script JavaScript pour le menu mobile (Sidebar) & PWA -->
    <script>
        function toggleMobileMenu() {
            const sidebar = document.getElementById('mobileSidebar');
            const overlay = document.getElementById('mobileMenuOverlay');
            
            const isOpen = !sidebar.classList.contains('translate-x-full');
            
            if (isOpen) {
                sidebar.classList.add('translate-x-full');
                overlay.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            } else {
                sidebar.classList.remove('translate-x-full');
                overlay.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            }
        }

        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js')
                    .then(reg => console.log('Service Worker enregistré avec succès.'))
                    .catch(err => console.log('Erreur Service Worker:', err));
            });
        }

        let deferredPrompt;
        const installBanner = document.getElementById('pwa-install-banner');
        const installBtn = document.getElementById('pwa-install-btn');
        const closeBtn = document.getElementById('pwa-close-btn');

        window.addEventListener('beforeinstallprompt', (e) => {
            e.preventDefault();
            deferredPrompt = e;

            if (installBanner) {
                installBanner.classList.remove('hidden');
                setTimeout(() => {
                    installBanner.classList.remove('translate-y-full');
                }, 10);
            }
        });

        if (installBtn) {
            installBtn.addEventListener('click', async () => {
                if (deferredPrompt) {
                    deferredPrompt.prompt();
                    const { outcome } = await deferredPrompt.userChoice;
                    deferredPrompt = null;
                    hideBanner();
                }
            });
        }

        if (closeBtn) {
            closeBtn.addEventListener('click', () => {
                hideBanner();
            });
        }

        function hideBanner() {
            if (installBanner) {
                installBanner.classList.add('translate-y-full');
                setTimeout(() => {
                    installBanner.classList.add('hidden');
                }, 300);
            }
        }
    </script>
</body>
</html>