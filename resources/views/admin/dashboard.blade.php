<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            Dashboard Admin
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded-lg p-8 border border-gray-200">
            <h3 class="text-xl font-semibold mb-4 text-gray-800">Bienvenue dans le dashboard admin</h3>

            <p class="text-gray-600 mb-6 leading-relaxed">
                Ici, vous pouvez gérer facilement les logements et suivre leur statut.
            </p>

            <a href="{{ route('admin.logements.index') }}"
                class="inline-block bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:outline-none
                      text-white font-semibold py-4 px-10 rounded-lg shadow text-lg transition duration-300">
                Gérer les logements
            </a>
        </div>
    </div>
</x-app-layout>
