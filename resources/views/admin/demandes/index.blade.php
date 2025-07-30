<x-app-layout>
    <style>
        .container {
            max-width: 900px;
            margin: 3rem auto;
            padding: 1rem 2rem;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #1E293B;
        }

        h1 {
            color: #2563EB;
            /* blue-600 */
            margin-bottom: 1.5rem;
            font-weight: 700;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 8px;
            background-color: #F1F5F9;
            /* slate-100 */
            box-shadow: 0 2px 6px rgb(0 0 0 / 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        thead tr {
            background-color: #2563EB;
            color: white;
            text-align: left;
            font-weight: 600;
            font-size: 0.95rem;
        }

        thead th {
            padding: 12px 15px;
        }

        tbody tr {
            background-color: white;
            border-bottom: 8px solid #F1F5F9;
            transition: background-color 0.3s ease;
        }

        tbody tr:hover {
            background-color: #E0E7FF;
            /* blue-100 */
        }

        tbody td {
            padding: 12px 15px;
            color: #334155;
            font-size: 0.9rem;
            vertical-align: middle;
        }

        .btn {
            padding: 8px 15px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s ease;
            user-select: none;
        }

        .btn-blue {
            background-color: #2563EB;
            color: white;
            box-shadow: 0 3px 6px rgb(37 99 235 / 0.5);
        }

        .btn-blue:hover {
            background-color: #1D4ED8;
            box-shadow: 0 4px 10px rgb(29 78 216 / 0.7);
        }

        .alert-success {
            background-color: #D1FAE5;
            color: #065F46;
            padding: 1rem 1.5rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-weight: 600;
            box-shadow: 0 2px 8px rgb(5 150 105 / 0.2);
        }

        /* Modal styles */
        #statusModal {
            position: fixed;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        #statusModal.hidden {
            display: none;
        }

        #statusModal>div {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            width: 90%;
            max-width: 400px;
            box-shadow: 0 8px 25px rgb(0 0 0 / 0.2);
        }

        #statusModal h2 {
            margin-bottom: 1.25rem;
            font-weight: 700;
            color: #1E293B;
        }

        #statusModal label {
            font-weight: 600;
            display: block;
            margin-bottom: 0.5rem;
            color: #475569;
        }

        #statusModal select,
        #statusModal textarea {
            width: 100%;
            padding: 0.6rem 0.8rem;
            border-radius: 8px;
            border: 1.5px solid #CBD5E1;
            font-size: 1rem;
            color: #334155;
            resize: vertical;
            transition: border-color 0.3s ease;
        }

        #statusModal select:focus,
        #statusModal textarea:focus {
            outline: none;
            border-color: #2563EB;
            box-shadow: 0 0 5px #2563EBaa;
        }

        #statusModal .modal-actions {
            margin-top: 1.5rem;
            display: flex;
            justify-content: flex-end;
            gap: 0.75rem;
        }

        #statusModal button {
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            border: none;
            user-select: none;
        }

        #statusModal .btn-cancel {
            background-color: #94A3B8;
            /* gray-400 */
            color: white;
            transition: background-color 0.3s ease;
        }

        #statusModal .btn-cancel:hover {
            background-color: #64748B;
            /* gray-500 */
        }

        #statusModal .btn-submit {
            background-color: #2563EB;
            color: white;
            box-shadow: 0 3px 6px rgb(37 99 235 / 0.6);
            transition: background-color 0.3s ease;
        }

        #statusModal .btn-submit:hover {
            background-color: #1D4ED8;
            box-shadow: 0 4px 8px rgb(29 78 216 / 0.8);
        }

        .bg-green-100 {
            background-color: #00fa3691;
            color: #f5fffc;
        }

        .bg-yellow-100 {
            background-color: #ffcc00;
            color: #ffffff;
        }

        .bg-red-100 {
            background-color: #ff0000;
            color: #ffffff;
        }

        .bg-gray-100 {
            background-color: #F3F4F6;
            color: #374151;
        }
    </style>

    <div class="container">
        <h1>Gestion des Paiements</h1>

        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($paiements->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date création</th>
                        <th>Utilisateur</th>
                        <th>Appartement</th>
                        <th>Montant</th>
                        <th>Statut</th>
                        <th>Description</th>
                        <th>Commentaire Admin</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paiements as $paiement)
                        <tr>
                            <td>{{ $paiement->id }}</td>
                            <td>{{ $paiement->created_at }}</td>
                            <td>{{ $paiement->user->name ?? 'N/A' }}</td>
                            <td>{{ $paiement->apartment_id ?? 'N/A' }}</td>
                            <td>{{ number_format($paiement->montant) }} FCFA</td>
                            <td>
                                @php
                                    $statusColors = [
                                        'validé' => 'bg-green-100 text-green-800',
                                        'en_attente' => 'bg-yellow-100 text-yellow-800',
                                        'rejeté' => 'bg-red-100 text-red-800',
                                    ];
                                    $statusClass = $statusColors[$paiement->status] ?? 'bg-gray-100 text-gray-800';
                                @endphp
                                <span class="px-3 py-1 rounded-full font-semibold text-sm {{ $statusClass }}">
                                    {{ ucfirst($paiement->status) }}
                                </span>
                            </td>

                            <td>{{ \Illuminate\Support\Str::limit($paiement->description, 50) }}</td>
                            <td>{{ $paiement->admin_comment ?? '-' }}</td>
                            <td>
                                <button
                                    onclick="openModal({{ $paiement->id }}, '{{ $paiement->status }}', '{{ addslashes($paiement->admin_comment) }}')"
                                    class="btn btn-blue">
                                    Modifier
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $paiements->links() }}
            </div>
        @else
            <p>Aucun paiement pour le moment.</p>
        @endif
    </div>

    <!-- Modal de modification -->
    <div id="statusModal" class="hidden" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
        <div>
            <h2 id="modalTitle">Modifier le paiement</h2>
            <form id="statusForm" method="POST" action="">
                @csrf
                <label for="status">Statut</label>
                <select name="status" id="status" required>
                    <option value="en_attente">En attente</option>
                    <option value="validé">Validé</option>
                    <option value="rejeté">Rejeté</option>
                </select>

                <label for="admin_comment" class="mt-4">Commentaire admin (optionnel)</label>
                <textarea name="admin_comment" id="admin_comment" rows="4" placeholder="Ajouter un commentaire..."></textarea>

                <div class="modal-actions">
                    <button type="button" onclick="closeModal()" class="btn btn-cancel">Annuler</button>
                    <button type="submit" class="btn btn-submit">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(id, status, admin_comment) {
            const modal = document.getElementById('statusModal');
            modal.classList.remove('hidden');
            modal.setAttribute('aria-hidden', 'false');

            const form = document.getElementById('statusForm');
            form.action = `/admin/paiements/${id}/update-status`;

            document.getElementById('status').value = status;
            document.getElementById('admin_comment').value = admin_comment || '';
        }

        function closeModal() {
            const modal = document.getElementById('statusModal');
            modal.classList.add('hidden');
            modal.setAttribute('aria-hidden', 'true');
        }
    </script>
</x-app-layout>
