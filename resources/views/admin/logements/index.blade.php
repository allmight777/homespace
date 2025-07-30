<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Gestion des Logements</h2>
            <a href="{{ route('admin.logements.create') }}"
                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md text-sm font-semibold hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Ajouter un logement
            </a>
        </div>
    </x-slot>

    <style>
        .badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            font-size: 0.75rem;
            font-weight: 600;
            border-radius: 9999px;
        }

        .badge-disponible {
            background-color: #D1FAE5;
            color: #065F46;
        }

        .badge-attente {
            background-color: #FEF3C7;
            color: #92400E;
        }

        .badge-indisponible {
            background-color: #FEE2E2;
            color: #991B1B;
        }

        .btn-create-logement {
            display: inline-block;
            background-color: #2563EB;
            /* blue-600 */
            color: #fff;
            padding: 0.5rem 1.25rem;
            font-weight: 600;
            border-radius: 0.375rem;
            text-decoration: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-create-logement:hover {
            background-color: #1D4ED8;
            /* blue-700 */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
            color: white;
        }
    </style>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 rounded-md bg-green-50 p-4">
                    <p class="text-green-700">{{ session('success') }}</p>
                </div>
            @endif
            <a href="{{ route('admin.logements.create') }}" class="btn-create-logement">
                Créer un logement
            </a>
            <br><br>
            <!-- Barre de recherche -->
            <div class="mb-4">
                <input type="text" id="searchInput" placeholder="Rechercher un logement..."
                    class="w-full md:w-1/3 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    onkeyup="filterTable()" />
            </div>

            <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-md">
                <table id="logementsTable" class="w-full divide-y divide-gray-200 table-auto">
                    <thead class="bg-gray-50">
                        <tr>
                               <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nom</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Type</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Prix</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Localisation</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Contact</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Statut</th>
                            <th
                                class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($logements as $logement)
                            @php
                                $statut = strtolower($logement->statut);
                                $badgeClass = match ($statut) {
                                    'disponible' => 'badge badge-disponible',
                                    'en attente' => 'badge badge-attente',
                                    'indisponible' => 'badge badge-indisponible',
                                    default => 'badge badge-attente',
                                };
                            @endphp
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 text-sm font-medium text-gray-900">{{ $logement->id }}</td>
                                <td class="px-4 py-2 text-sm font-medium text-gray-900">{{ $logement->nom }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $logement->type }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">
                                    {{ number_format($logement->prix, 2, ',', ' ') }} FCFA</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $logement->localisation ?? '-' }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $logement->contact_tel ?? '-' }}</td>
                                <td class="px-4 py-2 text-sm">
                                    <span class="{{ $badgeClass }}">{{ ucfirst($logement->statut) }}</span>
                                </td>
                                <td class="px-4 py-2 text-sm text-center">
                                    <div style="display: flex; justify-content: center; gap: 0.5rem; flex-wrap: wrap;">

                                        <!-- Bouton Détails (gris) -->
                                        <a href="{{ route('admin.logements.show', $logement) }}"
                                            style="background-color: #6B7280; color: white; padding: 0.5rem 0.75rem; border-radius: 0.375rem;
                  font-weight: 600; text-decoration: none;"
                                            onmouseover="this.style.backgroundColor='#4B5563';"
                                            onmouseout="this.style.backgroundColor='#6B7280';">
                                            Détails
                                        </a>

                                        <!-- Bouton Modifier (jaune) -->
                                        <a href="{{ route('admin.logements.edit', $logement) }}"
                                            style="background-color: #FACC15; color: black; padding: 0.5rem 0.75rem; border-radius: 0.375rem;
                  font-weight: 600; text-decoration: none;"
                                            onmouseover="this.style.backgroundColor='#EAB308';"
                                            onmouseout="this.style.backgroundColor='#FACC15';">
                                            Modifier
                                        </a>

                                        <!-- Bouton Supprimer (rouge) -->
                                        <form action="{{ route('admin.logements.destroy', $logement) }}" method="POST"
                                            onsubmit="return confirm('Confirmer la suppression ?');"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                style="background-color: #DC2626; color: white; padding: 0.5rem 0.75rem; border-radius: 0.375rem;
                           font-weight: 600; border: none; cursor: pointer;"
                                                onmouseover="this.style.backgroundColor='#B91C1C';"
                                                onmouseout="this.style.backgroundColor='#DC2626';">
                                                Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $logements->links() }}
            </div>
        </div>
    </div>

    <script>
        function filterTable() {
            const input = document.getElementById("searchInput");
            const filter = input.value.toLowerCase();
            const table = document.getElementById("logementsTable");
            const tr = table.getElementsByTagName("tr");

            for (let i = 1; i < tr.length; i++) {
                let rowText = tr[i].textContent.toLowerCase();
                tr[i].style.display = rowText.indexOf(filter) > -1 ? "" : "none";
            }
        }
    </script>
</x-app-layout>
