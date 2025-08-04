<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Utilisateurs') }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-700">
                    <thead class="bg-gray-100 text-xs uppercase">
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Is actif</th>
                            <th class="px-4 py-2">Is admin</th>
                            <th class="px-4 py-2">Nom</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Numero</th>
                            <th class="px-4 py-2">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="border-b">
                                <td class="px-4 py-2">{{ $user->id }}</td>
                                <td class="px-4 py-2">
                                    @if ($user->isactif)
                                        <span
                                            style="background-color: #d1fae5; color: #065f46; padding: 4px 8px; border-radius: 9999px; font-weight: 600; font-size: 0.875rem;">
                                            Actif
                                        </span>
                                    @else
                                        <span
                                            style="background-color: #fee2e2; color: #991b1b; padding: 4px 8px; border-radius: 9999px; font-weight: 600; font-size: 0.875rem;">
                                            Non actif
                                        </span>
                                    @endif
                                </td>

                                <td class="px-4 py-2">
                                    @if ($user->isadmin)
                                        <span
                                            style="background-color: #d1fae5; color: #065f46; padding: 4px 8px; border-radius: 9999px; font-weight: 600; font-size: 0.875rem;">
                                            Admin
                                        </span>
                                    @else
                                        <span
                                            style="background-color: #fee2e2; color: #991b1b; padding: 4px 8px; border-radius: 9999px; font-weight: 600; font-size: 0.875rem;">
                                            Non_admin
                                        </span>
                                    @endif
                                </td>


                                <td class="px-4 py-2">{{ $user->name }}</td>
                                <td class="px-4 py-2">{{ $user->email }}</td>
                                <td class="px-4 py-2">{{ $user->whatsapp_number }}</td>
                                <td class="px-4 py-2">
                                    <div style="display: flex; flex-direction: column; gap: 6px;">
                                        <div style="display: flex; gap: 6px; align-items: center;">
                                            <a href="{{ route('admin.users.edit', $user) }}"
                                                style="display: inline-block; background-color: #facc15; color: white; padding: 4px 12px; font-size: 12px; border-radius: 4px; text-decoration: none; transition: background-color 0.3s;"
                                                onmouseover="this.style.backgroundColor='#eab308'"
                                                onmouseout="this.style.backgroundColor='#facc15'">
                                                Modifier
                                            </a>

                                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                                onsubmit="return confirm('Supprimer ce compte ?')"
                                                style="display: flex; gap: 6px;">
                                                @csrf
                                                @method('DELETE')
                                                <input type="text" name="reason" required placeholder="Raison"
                                                    style="font-size: 12px; padding: 4px 8px; border: 1px solid #ccc; border-radius: 4px;" />
                                                <button type="submit"
                                                    style="background-color: #dc2626; color: white; font-size: 12px; padding: 4px 12px; border: none; border-radius: 4px; cursor: pointer;"
                                                    onmouseover="this.style.backgroundColor='#b91c1c'"
                                                    onmouseout="this.style.backgroundColor='#dc2626'">
                                                    Supprimer
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
