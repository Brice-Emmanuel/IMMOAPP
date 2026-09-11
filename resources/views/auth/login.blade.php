@extends('layouts.app')

@section('content')
<div class="min-h-[80vh] flex flex-col justify-center py-12 sm:px-6 lg:px-8 bg-gray-50">
    <div class="sm:mx-auto sm:w-full sm:max-w-md text-center">
        <h2 class="text-3xl font-extrabold text-gray-900">Connexion à votre compte</h2>
        <p class="mt-2 text-sm text-gray-600">
            Accédez à votre espace bailleur ou administration
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow-xl rounded-2xl border border-gray-100 sm:px-10 space-y-6">
            
            <form class="space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Adresse e-mail</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus class="mt-1 w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none transition-all">
                    @error('email') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-xs text-orange-500 hover:underline font-medium">Mot de passe oublié ?</a>
                        @endif
                    </div>
                    <input id="password" name="password" type="password" required class="mt-1 w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none transition-all">
                    @error('password') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div class="flex items-center">
                    <label class="flex items-center gap-2 cursor-pointer text-sm">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-orange-500 focus:ring-orange-500">
                        <span class="text-gray-600">Se souvenir de moi</span>
                    </label>
                </div>

                <button type="submit" class="w-full py-3.5 px-4 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-xl shadow-lg shadow-orange-500/30 transition-all">
                    Se connecter
                </button>
            </form>

            <!-- Lien de redirection vers l'inscription -->
            <div class="text-center pt-4 border-t border-gray-100 text-sm">
                <p class="text-gray-600">
                    Vous n'avez pas de compte ? 
                    <a href="{{ route('register') }}" class="text-orange-500 hover:text-orange-600 font-bold transition-colors ml-1">
                        Devenir Bailleur
                    </a>
                </p>
            </div>

        </div>
    </div>
</div>
@endsection