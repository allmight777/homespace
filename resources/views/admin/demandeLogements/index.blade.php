<x-app-layout>
    <x-slot name="header">
        <h2 class="page-title">Gestion des demandes de logement</h2>
    </x-slot>

    <style>
        .page-title {
            font-size: 24px;
            font-weight: bold;
            color: #2d3748;
            margin-bottom: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 24px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            padding: 12px 20px;
            border-radius: 6px;
            margin-bottom: 16px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            overflow: hidden;
        }

        th,
        td {
            padding: 14px 18px;
            border-bottom: 1px solid #e2e8f0;
            text-align: left;
        }

        thead {
            background-color: #f7fafc;
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

        .badge-blue {
            background-color: #dbeafe;
            color: #1e40af;
        }

        .action-links a {
            margin-right: 12px;
            color: #2563eb;
            text-decoration: none;
            font-weight: 500;
        }

        .action-links a:hover {
            text-decoration: underline;
        }

        .btn {
            display: inline-block;
            padding: 6px 14px;
            font-size: 14px;
            font-weight: 500;
            border-radius: 4px;
            text-decoration: none;
            color: white;
            text-transform: none;
        }

        .btn-yellow {
            background-color: #facc15;
            color: #1a202c;
            text-decoration: none;
        }

        .btn-yellow:hover {
            background-color: #eab308;
            text-decoration: none;
            text-transform: none;
        }

        .btn-gray {
            background-color: #a0aec0;
            color: white;
            text-decoration: none;
        }

        .btn-gray:hover {
            background-color: #718096;
            text-decoration: none;
            text-transform: none;
        }

        .action-links {
            display: flex;
            gap: 10px;
        }
    </style>

    <div class="container">
        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Utilisateur</th>
                    <th>Lieu</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($demandes as $demande)
                    <tr>
                        <td>{{ $demande->id }}</td>
                        <td>{{ $demande->user->name ?? 'Inconnu' }}</td>
                        <td>{{ $demande->lieu }}</td>
                        <td>
                            @php
                                $reponse = strtolower($demande->reponse_admin);
                            @endphp

                            @if ($reponse === 'acceptée')
                                <span class="badge badge-green">Acceptée</span>
                            @elseif ($reponse === 'refusée')
                                <span class="badge badge-red">Refusée</span>
                            @elseif ($reponse)
                                <span class="badge badge-blue">{{ ucfirst($demande->reponse_admin) }}</span>
                            @else
                                <span class="badge badge-yellow">En attente</span>
                            @endif
                        </td>
                       <td class="action-links">
    <a href="{{ route('admin.demandes-logements.edit', $demande) }}"
       class="btn btn-yellow text-light" style="text-decoration: none;">Modifier</a>
    <a href="{{ route('admin.demandes-logements.show', $demande) }}"
       class="btn btn-gray text-light" style="text-decoration: none;">Voir</a>
</td>


                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
