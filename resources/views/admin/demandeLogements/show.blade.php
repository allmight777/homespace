<x-app-layout>
    <x-slot name="header">
        <h2 class="page-title">
            Détails de la demande #{{ $demande->id }}
        </h2>
    </x-slot>

    <style>
        .page-title {
            font-size: 24px;
            font-weight: bold;
            color: #2d3748;
            margin-bottom: 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 24px;
        }

        .card {
            background-color: #fff;
            padding: 24px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        ul.details-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        ul.details-list li {
            margin-bottom: 16px;
            font-size: 15px;
        }

        ul.details-list strong {
            display: inline-block;
            width: 200px;
            font-weight: 600;
            color: #374151;
        }

        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
        }

        .badge-green {
            background-color: #d1fae5;
            color: #065f46;
        }

        .badge-red {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .badge-yellow {
            background-color: #fef3c7;
            color: #92400e;
        }

        .btn {
            padding: 10px 20px;
            font-size: 14px;
            font-weight: 500;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            color: white;
            display: inline-block;
        }

        .btn-gray {
            background-color: #4a5568;
        }

        .btn-gray:hover {
            background-color: #2d3748;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 30px;
        }
    </style>

    <div class="container">
        <div class="card">
            <ul class="details-list">
                <li><strong>Utilisateur :</strong> {{ $demande->user->name ?? '—' }}</li>
                <li><strong>Lieu :</strong> {{ $demande->lieu }}</li>
                <li><strong>Type de chambre :</strong> {{ $demande->type_chambre }}</li>
                <li><strong>Électricité :</strong> {{ $demande->electricite ? 'Oui' : 'Non' }}</li>
                <li><strong>Description électricité :</strong> {{ $demande->description_electricite ?? '—' }}</li>
                <li><strong>Eau :</strong> {{ $demande->eau ? 'Oui' : 'Non' }}</li>
                <li><strong>Description eau :</strong> {{ $demande->description_eau ?? '—' }}</li>
                <li><strong>Nombre de chambres :</strong> {{ $demande->nombre_chambres }}</li>
                <li><strong>Autres critères :</strong> {{ $demande->autres_criteres ?? '—' }}</li>
                <li><strong>Réponse admin :</strong>
                    @php $reponse = strtolower($demande->reponse_admin); @endphp

                    @if ($reponse === 'acceptée')
                        <span class="badge badge-green">Acceptée</span>
                    @elseif ($reponse === 'refusée')
                        <span class="badge badge-red">Refusée</span>
                    @elseif ($reponse)
                        <span class="badge badge-yellow">{{ ucfirst($demande->reponse_admin) }}</span>
                    @else
                        <span class="badge badge-yellow">En attente</span>
                    @endif
                </li>
            </ul>

            <div class="actions">
                <a href="{{ route('admin.demandes-logements.index') }}" class="btn btn-gray text-decoration-none">Retour</a>
            </div>
        </div>
    </div>
</x-app-layout>
