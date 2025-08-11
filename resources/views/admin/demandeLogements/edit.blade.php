<x-app-layout>
    <x-slot name="header">
        <h2 class="page-title">
            Modifier le statut de la demande #{{ $demande->id }}
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
            max-width: 768px;
            margin: 0 auto;
            padding: 24px;
        }

        .card {
            background: #fff;
            padding: 24px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: #4a5568;
            margin-bottom: 6px;
        }

        select,
        input[type="text"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #cbd5e0;
            border-radius: 6px;
            font-size: 14px;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.04);
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 24px;
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

        .btn-blue {
            background-color: #2563eb;
        }

        .btn-blue:hover {
            background-color: #1d4ed8;
        }
    </style>

    <div class="container">
        <div class="card">
            <form method="POST" action="{{ route('admin.demandes-logements.update', $demande) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="reponse_admin">Statut</label>
                    <select name="reponse_admin" id="reponse_admin" onchange="toggleAutre()">
                        <option value="" {{ $demande->reponse_admin === null ? 'selected' : '' }}>En attente</option>
                        <option value="acceptée" {{ $demande->reponse_admin === 'acceptée' ? 'selected' : '' }}>Acceptée</option>
                        <option value="refusée" {{ $demande->reponse_admin === 'refusée' ? 'selected' : '' }}>Refusée</option>
                        <option value="autre" {{ !in_array($demande->reponse_admin, ['', 'acceptée', 'refusée']) ? 'selected' : '' }}>Autre</option>
                    </select>
                </div>

                <div class="form-group" id="autre-container" style="display: none;">
                    <label for="reponse_autre">Précisez</label>
                    <input type="text" name="reponse_autre" id="reponse_autre"
                           value="{{ (!in_array($demande->reponse_admin, ['', 'acceptée', 'refusée'])) ? $demande->reponse_admin : '' }}">
                </div>

                <div class="form-actions">
                    <a href="{{ route('admin.demandes-logements.index') }}" class="btn btn-gray text-decoration-none">Annuler</a>
                    <button type="submit" class="btn btn-blue">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleAutre() {
            const select = document.getElementById('reponse_admin');
            const autreContainer = document.getElementById('autre-container');
            if (select.value === 'autre') {
                autreContainer.style.display = 'block';
            } else {
                autreContainer.style.display = 'none';
                document.getElementById('reponse_autre').value = '';
            }
        }

        window.onload = toggleAutre;
    </script>
</x-app-layout>
