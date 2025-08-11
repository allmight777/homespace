@extends('layouts.usersConnecter')

@section('content')
    <style>
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 8px 14px;
            font-size: 14px;
            font-weight: 500;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            color: white;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #2563eb;
        }

        .btn-primary:hover {
            background-color: #1e40af;
        }

        .btn-warning {
            background-color: #facc15;
            color: #1a202c;
        }

        .btn-danger {
            background-color: #dc2626;
        }

        .btn-danger:hover {
            background-color: #b91c1c;
        }

        .alert-success {
            background-color: #d1fae5;
            color: #065f46;
            padding: 10px 16px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #e5e7eb;
            text-align: left;
            font-size: 14px;
        }

        th {
            background-color: #c5f0c4;
        }

        td {
            background-color: #e8f8ff;
        }

        .badge {
            padding: 4px 10px;
            border-radius: 4px;
            font-weight: 600;
            font-size: 13px;
            display: inline-block;
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
            color: #1e3a8a;
        }

        .action-buttons {
            display: flex;
            gap: 6px;
        }

        .btn-sm {
            padding: 6px 10px;
            font-size: 13px;
        }

        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
    </style>

    <div class="container">
        <br>
        <h1>Mes demandes de logement</h1>

        <a href="{{ route('demandes-logements.create') }}" class="btn btn-primary">Faire une nouvelle demande</a>

        <br><br>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($demandes->count() > 0)
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Lieu</th>
                            <th>Type de chambre</th>
                            <th>Électricité</th>
                            <th>Description électricité</th>
                            <th>Eau</th>
                            <th>Description eau</th>
                            <th>Nombre chambres</th>
                            <th>Autres critères</th>
                            <th>Réponse admin</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($demandes as $demande)
                            <tr>
                                <td>{{ $demande->lieu }}</td>
                                <td>{{ $demande->type_chambre }}</td>
                                <td>{{ $demande->electricite ? 'Oui' : 'Non' }}</td>
                                <td>{{ $demande->description_electricite ?? '—' }}</td>
                                <td>{{ $demande->eau ? 'Oui' : 'Non' }}</td>
                                <td>{{ $demande->description_eau ?? '—' }}</td>
                                <td>{{ $demande->nombre_chambres }}</td>
                                <td>{{ $demande->autres_criteres ?? '—' }}</td>
                                <td>
                                    @php
                                        $rep = strtolower($demande->reponse_admin);
                                    @endphp
                                    @if ($rep === 'acceptée')
                                        <span class="badge badge-green">Acceptée</span>
                                    @elseif ($rep === 'refusée')
                                        <span class="badge badge-red">Refusée</span>
                                    @elseif (!empty($rep))
                                        <span class="badge badge-blue">{{ ucfirst($demande->reponse_admin) }}</span>
                                    @else
                                        <span class="badge badge-yellow">En attente</span>
                                    @endif
                                </td>
                                <td class="action-buttons">
                                    <a href="{{ route('demandes-logements.edit', $demande->id) }}"
                                        class="btn btn-sm btn-warning">Modifier</a>

                                    <form action="{{ route('demandes-logements.destroy', $demande->id) }}" method="POST"
                                        onsubmit="return confirm('Voulez-vous vraiment supprimer cette demande ?');"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p>Aucune demande trouvée.</p>
        @endif
    </div>
    <br><br><br><br><br><br><br>
@endsection
