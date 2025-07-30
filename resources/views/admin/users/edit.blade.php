<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier un utilisateur
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow">
            <form action="{{ route('admin.users.update', $user) }}" method="POST">
                @csrf @method('PUT')

                {{-- Nom --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Nom</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>

                {{-- Email --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>

                {{-- WhatsApp --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Numéro WhatsApp</label>
                    <input type="text" name="whatsapp_number" value="{{ old('whatsapp_number', $user->whatsapp_number) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>

                {{-- Mot de passe (facultatif) --}}
              <div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Nouveau mot de passe (optionnel)</label>

    <div class="relative">
        <input type="password" name="password" id="password"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm pr-10">

        <button type="button" onclick="togglePassword()"
            class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
            👁️
        </button>
    </div>
</div>

<script>
    function togglePassword() {
        const input = document.getElementById('password');
        input.type = input.type === 'password' ? 'text' : 'password';
    }
</script>


                {{-- Admin ? --}}
                <div class="mb-4">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="isadmin" value="1"
                            {{ old('isadmin', $user->isadmin) ? 'checked' : '' }}
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                        <span class="ml-2">Administrateur</span>
                    </label>
                </div>

                {{-- Actif ? --}}
                <div class="mb-4">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="isactif" value="1"
                            {{ old('isactif', $user->isactif) ? 'checked' : '' }}
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                        <span class="ml-2">Compte actif</span>
                    </label>
                </div>

             <div class="flex justify-end gap-3">
    <a href="{{ route('admin.users.index') }}"
        style="padding: 8px 16px; background-color: #4B5563; color: white; border-radius: 4px; text-decoration: none; transition: background-color 0.3s;"
        onmouseover="this.style.backgroundColor='#374151'"
        onmouseout="this.style.backgroundColor='#4B5563'">
        Annuler
    </a>

    <button type="submit"
        style="padding: 8px 16px; background-color: #2563EB; color: white; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s;"
        onmouseover="this.style.backgroundColor='#1D4ED8'"
        onmouseout="this.style.backgroundColor='#2563EB'">
        Mettre à jour
    </button>
</div>

            </form>
        </div>
    </div>
</x-app-layout>
