@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto px-4 py-16">
    <div class="bg-white rounded-2xl border border-gray-100 p-8 shadow-sm">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-black text-gray-900">Nouveau mot de passe</h1>
            <p class="text-gray-500 text-sm mt-1">Veuillez saisir votre nouveau mot de passe sécurisé.</p>
        </div>

        <form action="{{ route('password.update') }}" method="POST" class="space-y-6">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Adresse email</label>
                <input type="email" name="email" value="{{ $email ?? old('email') }}" required class="w-full border-gray-200 rounded-xl focus:border-orange-500 focus:ring-orange-500 text-sm">
                @error('email') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Nouveau mot de passe</label>
                <input type="password" name="password" required class="w-full border-gray-200 rounded-xl focus:border-orange-500 focus:ring-orange-500 text-sm">
                @error('password') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation" required class="w-full border-gray-200 rounded-xl focus:border-orange-500 focus:ring-orange-500 text-sm">
            </div>

            <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 rounded-xl transition-all shadow-lg shadow-orange-500/20">
                Réinitialiser le mot de passe
            </button>
        </form>
    </div>
</div>
@endsection