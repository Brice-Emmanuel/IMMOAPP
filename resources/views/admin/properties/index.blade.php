<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modération des Annonces</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 font-sans">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-black text-gray-900">Modération des Annonces</h1>
                <p class="text-gray-500 text-sm mt-1">Examinez et validez les biens soumis par les bailleurs.</p>
            </div>
            <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 bg-gray-200 text-gray-700 font-semibold rounded-xl text-sm hover:bg-gray-300 transition-all">
                <i class="fa-solid fa-arrow-left mr-2"></i> Retour Dashboard
            </a>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl text-sm font-medium">
                {{ session('success') }}
            </div>
        @endif

        @if($properties->isEmpty())
            <div class="bg-white p-12 rounded-2xl border border-gray-100 shadow-sm text-center">
                <i class="fa-solid fa-folder-open text-4xl text-gray-300 mb-3"></i>
                <p class="text-gray-500 font-medium">Aucune annonce en attente de modération pour le moment.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($properties as $property)
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden flex flex-col justify-between">
                        <div>
                            @if($property->images->isNotEmpty())
                                <img src="{{ asset('storage/' . ($property->images->first()->path ?? $property->images->first()->image_path)) }}" alt="Image bien" class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-gray-100 flex items-center justify-center text-gray-400 text-sm">Aucune image</div>
                            @endif
                            <div class="p-6">
                                <div class="flex justify-between items-center">
                                    <span class="text-xs font-semibold px-2.5 py-1 bg-orange-50 text-orange-600 rounded-full">
                                        {{ $property->type ?? 'Logement' }}
                                    </span>
                                    <!-- Lien corrigé vers la vue admin des détails du bien -->
                                    <a href="{{ route('admin.properties.show', $property->id) }}" target="_blank" class="text-xs font-semibold text-blue-600 hover:underline flex items-center gap-1">
                                        <i class="fa-solid fa-eye"></i> Voir détails
                                    </a>
                                </div>
                                <h3 class="font-bold text-gray-900 text-lg mt-3">{{ $property->title }}</h3>
                                <p class="text-gray-500 text-sm mt-1 font-semibold text-orange-500">{{ number_format($property->price, 0, ',', ' ') }} XAF</p>
                                <p class="text-xs text-gray-400 mt-2">Bailleur : {{ $property->user->name ?? 'Inconnu' }}</p>
                            </div>
                        </div>
                        <div class="p-6 pt-0 flex items-center gap-3">
                            <form action="{{ route('admin.properties.approve', $property->id) }}" method="POST" class="flex-1">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="w-full py-2.5 bg-green-600 text-white font-semibold rounded-xl text-sm hover:bg-green-700 transition-all">
                                    Approuver
                                </button>
                            </form>
                            <form action="{{ route('admin.properties.reject', $property->id) }}" method="POST" class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full py-2.5 bg-red-50 text-red-600 font-semibold rounded-xl text-sm hover:bg-red-100 transition-all">
                                    Rejeter
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="mt-6">
                {{ $properties->links() }}
            </div>
        @endif
    </div>
</body>
</html>