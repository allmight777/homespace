<x-app-layout>
    <br><br>
    <x-slot name="header">

        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Détails du logement') }}
            </h2>
            <a href="{{ route('admin.logements.index') }}"
                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md text-sm font-semibold hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Voir la liste
            </a>

        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto py-6 px-4 sm:px-6 lg:px-8 bg-white rounded shadow space-y-6">

        <h3 class="text-2xl font-bold mb-4">{{ $logement->nom }}</h3>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 text-gray-700 text-sm">
            <div><span class="font-semibold">Type :</span> {{ $logement->type }}</div>
            <div><span class="font-semibold">Prix :</span> {{ number_format($logement->prix, 2, ',', ' ') }} FCFA</div>
            <div><span class="font-semibold">Localisation :</span> {{ $logement->localisation }}</div>
            <div><span class="font-semibold">Propriétaire :</span> {{ $logement->proprietaire }}</div>
            <div><span class="font-semibold">Locataire :</span> {{ $logement->locataire ?? '-' }}</div>
            <div><span class="font-semibold">Genre Locataire :</span> {{ ucfirst($logement->genre_locataire) }}</div>
            <div><span class="font-semibold">Nombre d’avances :</span> {{ $logement->nbr_avance }}</div>
            <div><span class="font-semibold">Caution :</span> {{ number_format($logement->caution, 2, ',', ' ') }} €
            </div>
            <div><span class="font-semibold">Eau :</span> {{ $logement->eau ? 'Oui' : 'Non' }}</div>
            <div><span class="font-semibold">Type compteur eau :</span> {{ $logement->type_compteur_eau ?? '-' }}</div>
            <div><span class="font-semibold">Electricité :</span> {{ $logement->electricite ? 'Oui' : 'Non' }}</div>
            <div><span class="font-semibold">Type compteur électricité :</span>
                {{ $logement->type_compteur_electricite ?? '-' }}</div>
            <div><span class="font-semibold">Surface :</span> {{ $logement->surface ?? '-' }} m²</div>
            <div><span class="font-semibold">Nombre de pièces :</span> {{ $logement->nombre_pieces ?? '-' }}</div>
            <div><span class="font-semibold">Meublé :</span> {{ $logement->meuble ? 'Oui' : 'Non' }}</div>
            <div><span class="font-semibold">Type chauffage :</span> {{ $logement->type_chauffage ?? '-' }}</div>
            <div><span class="font-semibold">Charges :</span> {{ $logement->charges ?? '-' }} €</div>
            <div><span class="font-semibold">Wifi inclus :</span> {{ $logement->wifi_inclus ? 'Oui' : 'Non' }}</div>
            <div><span class="font-semibold">Statut :</span> {{ ucfirst($logement->statut) }}</div>
            <div><span class="font-semibold">Disponibilité :</span>
                {{ $logement->disponibilite ? \Carbon\Carbon::parse($logement->disponibilite)->format('d/m/Y') : '-' }}
            </div>
        </div>

        <div>
            <h4 class="text-lg font-semibold mb-2">Description</h4>
            <p class="text-gray-700 whitespace-pre-line">{{ $logement->description ?? '-' }}</p>
        </div>
<div>
    <h4 class="text-lg font-semibold mb-2">Photos</h4>
    <div class="flex flex-wrap gap-4">
        @php
            // Si c'est une chaîne JSON, on décode, sinon on utilise directement
            $photos = $logement->photos;
            if (is_string($photos)) {
                $photos = json_decode($photos, true);
            }
        @endphp

        @if (!empty($photos) && is_array($photos))
            @foreach ($photos as $photo)
                @php
                    // Nettoyage du chemin pour éviter double slash
                    $photoPath = ltrim($photo, '/');
                    // Générer le chemin complet
                    $url = asset("storage/{$photoPath}");
                @endphp

                <img src="{{ $url }}" alt="Photo du logement" class="w-48 h-32 object-cover rounded shadow" />
            @endforeach
        @else
            <p>Aucune photo disponible</p>
        @endif
    </div>
</div>



    </div>
    <br><br>
</x-app-layout>
