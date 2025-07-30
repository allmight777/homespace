@extends('layouts.usersConnecter')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">

            <input type="text" class="form-control w-50 shadow-sm" id="searchInput"
                placeholder="🔍 Rechercher une demande...">
        </div>

        @if ($paiements->isEmpty())
            <div class="alert alert-info text-center">
                Vous n'avez effectué aucune demande de paiement pour le moment.
            </div>
        @else
            <div class="table-responsive shadow-sm rounded">
                <table class="table table-hover align-middle text-center mb-0" id="paiementsTable">
                    <thead class="table-primary">
                        <tr>
                            <th>Mes demandes</th>
                            <th>🆔 Paiement</th>
                            <th>🏠 Appartement</th>
                            <th>💰 Montant</th>
                            <th>📄 Description</th>
                            <th>📅 Date</th>
                            <th>🔖 Statut</th>
                            <th>Plus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paiements as $paiement)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $paiement->id }}</td>
                                <td>{{ $paiement->apartment_id }}</td>
                                <td>{{ number_format($paiement->montant, 0, ',', ' ') }} FCFA</td>
                                <td>{{ $paiement->description ?? '-' }}</td>
                                <td>{{ $paiement->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    @php
                                        $statusClass = match ($paiement->status) {
                                            'approuvé' => 'success',
                                            'en_attente' => 'warning',
                                            'rejeté' => 'danger',
                                            default => 'success',
                                        };
                                    @endphp
                                    <span class="badge bg-{{ $statusClass }}">
                                        {{ ucfirst($paiement->status) }}
                                    </span>
                                </td>
                                <td>{{ $paiement->admin_comment ?: 'En attente de réponse' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
    <br><br><br><br><br><br>

    <script>
        document.getElementById('searchInput').addEventListener('input', function() {
            const filter = this.value.toLowerCase().trim();
            const rows = document.querySelectorAll('#paiementsTable tbody tr');
            let visibleCount = 0;

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                if (text.includes(filter)) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            // Optionnel : afficher message si rien trouvé
            if (visibleCount === 0) {
                if (!document.getElementById('noResultsRow')) {
                    const tbody = document.querySelector('#paiementsTable tbody');
                    const noResultRow = document.createElement('tr');
                    noResultRow.id = 'noResultsRow';
                    noResultRow.innerHTML =
                        `<td colspan="7" class="text-center text-muted fst-italic">Aucune demande ne correspond à votre recherche.</td>`;
                    tbody.appendChild(noResultRow);
                }
            } else {
                const noResultRow = document.getElementById('noResultsRow');
                if (noResultRow) noResultRow.remove();
            }
        });
    </script>
@endsection
