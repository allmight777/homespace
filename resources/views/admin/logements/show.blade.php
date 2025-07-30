<x-app-layout>
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

    <style>
        .detail-container {
            background-color: #f8fafc;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.05);
            margin: 2rem auto;
        }

        .detail-title {
            font-size: 1.75rem;
            font-weight: bold;
            color: #1e293b;
            margin-bottom: 1rem;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            color: #374151;
            font-size: 0.95rem;
        }

        .detail-grid span {
            font-weight: 600;
            color: #111827;
        }

        .photo-wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: 1rem;
        }

        .photo-wrapper img {
            width: 190px;
            height: 135px;
            object-fit: cover;
            border-radius: 0.5rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .section-title {
            font-size: 1.125rem;
            font-weight: 600;
            margin-top: 1.5rem;
            color: #1f2937;
        }

        .description-text {
            color: #4b5563;
            white-space: pre-line;
            margin-top: 0.5rem;
        }
    </style>

    <div class="max-w-5xl mx-auto detail-container">
        <h3 class="detail-title">{{ $logement->nom }}</h3>

        <div class="detail-grid">
            <div><span>Type :</span> {{ $logement->type }}</div>
            <div><span>Prix :</span> {{ number_format($logement->prix, 2, ',', ' ') }} FCFA</div>
            <div><span>Localisation :</span> {{ $logement->localisation }}</div>
            <div><span>Propriétaire :</span> {{ $logement->proprietaire }}</div>
            <div><span>Locataire :</span> {{ $logement->locataire ?? '-' }}</div>
            <div><span>Genre Locataire :</span> {{ ucfirst($logement->genre_locataire) }}</div>
            <div><span>Nombre d’avances :</span> {{ $logement->nbr_avance }}</div>
            <div><span>Caution :</span> {{ number_format($logement->caution, 2, ',', ' ') }} €</div>
            <div><span>Eau :</span> {{ $logement->eau ? 'Oui' : 'Non' }}</div>
            <div><span>Type compteur eau :</span> {{ $logement->type_compteur_eau ?? '-' }}</div>
            <div><span>Électricité :</span> {{ $logement->electricite ? 'Oui' : 'Non' }}</div>
            <div><span>Type compteur électricité :</span> {{ $logement->type_compteur_electricite ?? '-' }}</div>
            <div><span>Surface :</span> {{ $logement->surface ?? '-' }} m²</div>
            <div><span>Nombre de pièces :</span> {{ $logement->nombre_pieces ?? '-' }}</div>
            <div><span>Meublé :</span> {{ $logement->meuble ? 'Oui' : 'Non' }}</div>
            <div><span>Type chauffage :</span> {{ $logement->type_chauffage ?? '-' }}</div>
            <div><span>Charges :</span> {{ $logement->charges ?? '-' }} €</div>
            <div><span>Wifi inclus :</span> {{ $logement->wifi_inclus ? 'Oui' : 'Non' }}</div>
            <div><span>Statut :</span> {{ ucfirst($logement->statut) }}</div>
            <div><span>Disponibilité :</span>
                {{ $logement->disponibilite ? \Carbon\Carbon::parse($logement->disponibilite)->format('d/m/Y') : '-' }}
            </div>
        </div>

        <div>
            <h4 class="section-title">Description</h4>
            <p class="description-text">{{ $logement->description ?? '-' }}</p>
        </div>

        <div>
            <h4 class="section-title">Photos</h4>
            <div class="photo-wrapper">
                @php
                    $photos = $logement->photos;
                    if (is_string($photos)) {
                        $photos = json_decode($photos, true);
                    }
                @endphp

                @if (!empty($photos) && is_array($photos))
                    @foreach ($photos as $photo)
                        @php
                            $photoPath = ltrim($photo, '/');
                            $url = asset("storage/{$photoPath}");
                        @endphp

                        <img src="{{ $url }}" alt="Photo du logement" />
                    @endforeach
                @else
                    <p>Aucune photo disponible</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
