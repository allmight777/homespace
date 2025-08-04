@extends('layouts.usersConnecter')

@section('content')
<div class="container py-5">
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
    <!-- Champ de recherche -->
    <input type="text" class="form-control shadow-sm" id="searchInput" style="max-width: 400px;"
        placeholder="🔍 Rechercher une demande...">

    <!-- Bouton voir appartements -->
    <a href="{{ route('maison') }}" class="btn btn-success d-flex align-items-center gap-2">
        <i class="fas fa-building"></i> Voir appartements
    </a>
</div>


    @if ($paiements->isEmpty())
        <div class="alert alert-info text-center">
            <i class="bi bi-info-circle-fill me-2"></i>
            Vous n'avez effectué aucune demande de paiement pour le moment.

        </div>
    @else
        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover align-middle text-center mb-0" id="paiementsTable">
                <thead class="table-warning text-dark">
                    <tr>
                        <th>#</th>
                        <th><i class="fas fa-receipt"></i> Paiement</th>
                        <th><i class="fas fa-home"></i> Appartement</th>
                        <th><i class="fas fa-money-bill-wave"></i> Montant</th>
                        <th><i class="fas fa-align-left"></i> Description</th>
                        <th><i class="fas fa-calendar-alt"></i> Date</th>
                        <th><i class="fas fa-clipboard-check"></i> Statut</th>
                        <th><i class="fas fa-comment-dots"></i> Commentaire</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paiements as $paiement)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>#{{ $paiement->id }}</td>
                            <td>
                                {{ optional($paiement->apartment)->nom ?? 'Appartement inconnu' }}
                            </td>
                            <td>{{ number_format($paiement->montant, 0, ',', ' ') }} FCFA</td>
                            <td>{{ $paiement->description ?? '-' }}</td>
                            <td>{{ $paiement->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                @php
                                    $statusClass = match ($paiement->status) {
                                        'approuvé' => 'success',
                                        'en_attente' => 'warning',
                                        'rejeté' => 'danger',
                                        default => 'secondary',
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

<br><br><br><br><br><br><br><br><br><br><br>

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

        if (visibleCount === 0) {
            if (!document.getElementById('noResultsRow')) {
                const tbody = document.querySelector('#paiementsTable tbody');
                const noResultRow = document.createElement('tr');
                noResultRow.id = 'noResultsRow';
                noResultRow.innerHTML =
                    `<td colspan="8" class="text-center text-muted fst-italic">Aucune demande ne correspond à votre recherche.</td>`;
                tbody.appendChild(noResultRow);
            }
        } else {
            const noResultRow = document.getElementById('noResultsRow');
            if (noResultRow) noResultRow.remove();
        }
    });
</script>
@endsection
