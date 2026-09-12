@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto px-4 py-16">
    <div class="bg-white rounded-2xl border border-gray-100 p-8 shadow-sm">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-black text-gray-900">Mot de passe oublié ?</h1>
            <p class="text-gray-500 text-sm mt-1">Entrez votre adresse email pour recevoir un lien de réinitialisation.</p>
        </div>

        @if (session('status'))
            <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl text-sm">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('password.email') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Adresse email</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="w-full border-gray-200 rounded-xl focus:border-orange-500 focus:ring-orange-500 text-sm">
                @error('email') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 rounded-xl transition-all shadow-lg shadow-orange-500/20">
                Envoyer le lien de réinitialisation
            </button>
        </form>

        <div class="text-center mt-6">
            <a href="{{ route('login') }}" class="text-xs font-semibold text-gray-500 hover:text-orange-500">
                <i class="fa-solid fa-arrow-left mr-1"></i> Retour à la connexion
            </a>
        </div>
    </div>
</div>
@endsection