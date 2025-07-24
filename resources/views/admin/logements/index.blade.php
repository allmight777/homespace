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

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 rounded-md bg-green-50 p-4">
                    <p class="text-green-700">{{ session('success') }}</p>
                </div>
            @endif

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
                            <th scope="col"
                                class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-32">
                                Nom
                            </th>
                            <th scope="col"
                                class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-24">
                                Type
                            </th>
                            <th scope="col"
                                class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-20">
                                Prix
                            </th>
                            <th scope="col"
                                class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-28">
                                Propriétaire
                            </th>
                            <th scope="col"
                                class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-28">
                                Contact propriétaire
                            </th>
                            <th scope="col"
                                class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-24">
                                Statut
                            </th>

                            <th scope="col"
                                class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-40">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($logements as $logement)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $logement->nom }}</td>
                                <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">{{ $logement->type }}</td>
                                <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">
                                    {{ number_format($logement->prix, 2, ',', ' ') }} FCFA</td>
                                <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">
                                    {{ $logement->proprietaire ?? '-' }}</td>
                                <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">
                                    {{ $logement->contact_tel ?? '-' }}</td>
                                <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">
                                    {{ ucfirst($logement->statut) }}</td>
                                <td
                                    class="px-4 py-2 w-40 text-center text-sm font-medium flex justify-center space-x-3">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ route('admin.logements.show', $logement) }}"
                                        class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition duration-150 font-semibold">
                                         Détails
                                    </a>
                                    <a href="{{ route('admin.logements.edit', $logement) }}"
                                        class="px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition duration-150 font-semibold">
                                        Modifier
                                    </a>
                                    <form action="{{ route('admin.logements.destroy', $logement) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Confirmer la suppression ?');"
                                            class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition duration-150 font-semibold">
                                            Supprimer
                                        </button>
                                    </form>
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

            // Parcours des lignes (ignore la première ligne d'en-tête)
            for (let i = 1; i < tr.length; i++) {
                let rowText = tr[i].textContent.toLowerCase();

                if (rowText.indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    </script>
</x-app-layout>
