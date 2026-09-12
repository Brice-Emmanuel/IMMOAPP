<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du bien - Modération</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 font-sans">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="mb-6 flex justify-between items-center">
            <a href="{{ route('admin.properties.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 font-semibold rounded-xl text-sm hover:bg-gray-300 transition-all">
                <i class="fa-solid fa-arrow-left mr-2"></i> Retour à la liste
            </a>
            <div class="flex gap-3">
                <form action="{{ route('admin.properties.approve', $property->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="px-5 py-2.5 bg-green-600 text-white font-semibold rounded-xl text-sm hover:bg-green-700 transition-all">
                        Approuver
                    </button>
                </form>
                <form action="{{ route('admin.properties.reject', $property->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-5 py-2.5 bg-red-50 text-red-600 font-semibold rounded-xl text-sm hover:bg-red-100 transition-all">
                        Rejeter
                    </button>
                </form>
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden p-8">
            <span class="text-xs font-semibold px-3 py-1 bg-orange-50 text-orange-600 rounded-full">
                {{ $property->type ?? 'Logement' }}
            </span>
            <h1 class="text-3xl font-black text-gray-900 mt-4">{{ $property->title }}</h1>
            <p class="text-2xl font-bold text-orange-500 mt-2">{{ number_format($property->price, 0, ',', ' ') }} XAF</p>
            
            <div class="border-t border-gray-100 my-6 pt-6 grid grid-cols-2 gap-4 text-sm">
                <div><span class="text-gray-400">Ville / Quartier :</span> <span class="font-semibold text-gray-800">{{ $property->city ?? 'Non spécifié' }}</span></div>
                <div><span class="text-gray-400">Soumis par :</span> <span class="font-semibold text-gray-800">{{ $property->user->name ?? 'Inconnu' }}</span></div>
            </div>

            <div class="mt-6">
                <h3 class="font-bold text-gray-900 text-lg mb-2">Description</h3>
                <p class="text-gray-600 leading-relaxed bg-gray-50 p-4 rounded-xl">{{ $property->description ?? 'Aucune description.' }}</p>
            </div>

            <div class="mt-8">
                <h3 class="font-bold text-gray-900 text-lg mb-4">Photos du bien (Cliquez pour agrandir)</h3>
                @if($property->images->isNotEmpty())
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach($property->images as $image)
                            @php
                                $imagePath = asset('storage/' . ($image->path ?? $image->image_path));
                            @endphp
                            <!-- Lien cliquable ouvrant l'image en grand dans un nouvel onglet -->
                            <a href="{{ $imagePath }}" target="_blank" class="relative group block rounded-xl overflow-hidden border border-gray-200 h-40 bg-gray-100 shadow-sm hover:shadow-md transition-all">
                                <img src="{{ $imagePath }}" alt="Photo du bien" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center text-white text-xs font-semibold gap-1">
                                    <i class="fa-solid fa-expand"></i> Voir en grand
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-400 text-sm italic">Aucune image disponible pour ce bien.</p>
                @endif
            </div>
        </div>
    </div>
</body>
</html>