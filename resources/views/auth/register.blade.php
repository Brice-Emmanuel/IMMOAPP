@extends('layouts.app')

@section('content')
<div class="min-h-[80vh] flex flex-col justify-center py-12 sm:px-6 lg:px-8 bg-gray-50">
    <div class="sm:mx-auto sm:w-full sm:max-w-md text-center">
        <h2 class="text-3xl font-extrabold text-gray-900">Devenir Bailleur</h2>
        <p class="mt-2 text-sm text-gray-600">
            Créez un compte pour commencer à publier vos annonces
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow-xl rounded-2xl border border-gray-100 sm:px-10 space-y-6">
            
            <form class="space-y-4" action="{{ route('register') }}" method="POST">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nom complet</label>
                    <input name="name" type="text" value="{{ old('name') }}" required autofocus class="mt-1 w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-orange-500 outline-none">
                    @error('name') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Adresse e-mail</label>
                    <input name="email" type="email" value="{{ old('email') }}" required class="mt-1 w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-orange-500 outline-none">
                    @error('email') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Téléphone (WhatsApp)</label>
                    <input name="phone" type="text" value="{{ old('phone') }}" required class="mt-1 w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-orange-500 outline-none">
                    @error('phone') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Mot de passe</label>
                    <input name="password" type="password" required class="mt-1 w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-orange-500 outline-none">
                    @error('password') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
                    <input name="password_confirmation" type="password" required class="mt-1 w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-orange-500 outline-none">
                </div>

                <button type="submit" class="w-full mt-4 py-3.5 px-4 bg-black hover:bg-gray-800 text-white font-bold rounded-xl shadow-lg transition-all">
                    Créer mon compte Bailleur
                </button>
            </form>

            <!-- Lien de redirection vers la connexion -->
            <div class="text-center pt-4 border-t border-gray-100 text-sm">
                <p class="text-gray-600">
                    Vous avez déjà un compte ? 
                    <a href="{{ route('login') }}" class="text-orange-500 hover:text-orange-600 font-bold transition-colors ml-1">
                        Se connecter
                    </a>
                </p>
            </div>

        </div>
    </div>
</div>
@endsection