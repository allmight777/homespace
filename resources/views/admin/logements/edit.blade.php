<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Modifier le logement : {{ $logement->nom }}
            </h2>

            <a href="{{ route('admin.logements.index') }}"
                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md text-sm font-semibold hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Voir la liste
            </a>
        </div>
    </x-slot>


    <div class="py-6 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded p-6">
            <form action="{{ route('admin.logements.update', $logement) }}" method="POST" enctype="multipart/form-data"
                class="max-w-4xl mx-auto p-6 bg-white rounded shadow">
                @csrf
                @method('PUT')

                <!-- Ligne 1 : Nom + Type -->
                <div class="flex gap-4 mb-4">
                    <div class="flex-1">
                        <label for="nom" class="block font-medium mb-1">Nom</label>
                        <input type="text" name="nom" id="nom" value="{{ old('nom', $logement->nom) }}"
                            required class="w-full border rounded px-3 py-2">
                        @error('nom')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex-1">
                        <label for="type" class="block font-medium mb-1">Type</label>
                        <input type="text" name="type" id="type" value="{{ old('type', $logement->type) }}"
                            required class="w-full border rounded px-3 py-2">
                        @error('type')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Ligne 2 : Prix + Caution + Charges -->
                <div class="flex gap-4 mb-4">
                    <div class="flex-1">
                        <label for="prix" class="block font-medium mb-1">Prix (FCFA)</label>
                        <input type="number" step="0.01" name="prix" id="prix"
                            value="{{ old('prix', $logement->prix) }}" required class="w-full border rounded px-3 py-2">
                        @error('prix')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex-1">
                        <label for="caution" class="block font-medium mb-1">Caution (FCFA)</label>
                        <input type="number" step="0.01" name="caution" id="caution"
                            value="{{ old('caution', $logement->caution) }}" required
                            class="w-full border rounded px-3 py-2">
                        @error('caution')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex-1">
                        <label for="charges" class="block font-medium mb-1">Charges (FCFA)</label>
                        <input type="number" step="0.01" name="charges" id="charges"
                            value="{{ old('charges', $logement->charges) }}" class="w-full border rounded px-3 py-2">
                        @error('charges')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Ligne 3 : Localisation + Propriétaire + Contact -->
                <div class="flex gap-4 mb-4">
                    <div class="flex-1">
                        <label for="localisation" class="block font-medium mb-1">Localisation</label>
                        <input type="text" name="localisation" id="localisation"
                            value="{{ old('localisation', $logement->localisation) }}" required
                            class="w-full border rounded px-3 py-2">
                        @error('localisation')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex-1">
                        <label for="proprietaire" class="block font-medium mb-1">Propriétaire</label>
                        <input type="text" name="proprietaire" id="proprietaire"
                            value="{{ old('proprietaire', $logement->proprietaire) }}" required
                            class="w-full border rounded px-3 py-2">
                        @error('proprietaire')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex-1">
                        <label for="contact_tel" class="block font-medium mb-1">Contact propriétaire</label>
                        <input type="text" name="contact_tel" id="contact_tel"
                            value="{{ old('contact_tel', $logement->contact_tel) }}"
                            class="w-full border rounded px-3 py-2" maxlength="50">
                        @error('contact_tel')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Ligne 4 : Locataire + Genre Locataire + Nb avances -->
                <div class="flex gap-4 mb-4">
                    <div class="flex-1">
                        <label for="locataire" class="block font-medium mb-1">Locataire</label>
                        <input type="text" name="locataire" id="locataire"
                            value="{{ old('locataire', $logement->locataire) }}"
                            class="w-full border rounded px-3 py-2" maxlength="255">
                        @error('locataire')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex-1">
                        <label for="genre_locataire" class="block font-medium mb-1">Genre Locataire</label>
                        <select name="genre_locataire" id="genre_locataire" required
                            class="w-full border rounded px-3 py-2">
                            <option value="">-- Sélectionnez --</option>
                            <option value="homme"
                                {{ old('genre_locataire', $logement->genre_locataire) == 'homme' ? 'selected' : '' }}>
                                Homme</option>
                            <option value="femme"
                                {{ old('genre_locataire', $logement->genre_locataire) == 'femme' ? 'selected' : '' }}>
                                Femme</option>
                            <option value="mixte"
                                {{ old('genre_locataire', $logement->genre_locataire) == 'mixte' ? 'selected' : '' }}>
                                Mixte</option>
                        </select>
                        @error('genre_locataire')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex-1">
                        <label for="nbr_avance" class="block font-medium mb-1">Nombre d’avances</label>
                        <input type="number" name="nbr_avance" id="nbr_avance" min="0"
                            value="{{ old('nbr_avance', $logement->nbr_avance) }}" required
                            class="w-full border rounded px-3 py-2">
                        @error('nbr_avance')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Ligne 5 : Eau + Type compteur eau + Électricité + Type compteur électricité -->
                <div class="flex flex-wrap gap-4 mb-4">
                    <div class="flex items-center flex-1 min-w-[150px]">
                        <input type="checkbox" name="eau" id="eau" value="1"
                            {{ old('eau', $logement->eau) ? 'checked' : '' }} class="mr-2">
                        <label for="eau" class="font-medium">Eau</label>
                    </div>

                    <div class="flex-1 min-w-[200px]">
                        <label for="type_compteur_eau" class="block font-medium mb-1">Type compteur eau</label>
                        <input type="text" name="type_compteur_eau" id="type_compteur_eau"
                            value="{{ old('type_compteur_eau', $logement->type_compteur_eau) }}"
                            class="w-full border rounded px-3 py-2">
                        @error('type_compteur_eau')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center flex-1 min-w-[150px]">
                        <input type="checkbox" name="electricite" id="electricite" value="1"
                            {{ old('electricite', $logement->electricite) ? 'checked' : '' }} class="mr-2">
                        <label for="electricite" class="font-medium">Electricité</label>
                    </div>

                    <div class="flex-1 min-w-[200px]">
                        <label for="type_compteur_electricite" class="block font-medium mb-1">Type compteur
                            électricité</label>
                        <input type="text" name="type_compteur_electricite" id="type_compteur_electricite"
                            value="{{ old('type_compteur_electricite', $logement->type_compteur_electricite) }}"
                            class="w-full border rounded px-3 py-2">
                        @error('type_compteur_electricite')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Ligne 6 : Surface + Nombre de pièces + Meublé + Wifi inclus -->
                <div class="flex flex-wrap gap-4 mb-4 items-center">
                    <div class="flex-1 min-w-[150px]">
                        <label for="surface" class="block font-medium mb-1">Surface (m²)</label>
                        <input type="number" step="0.01" name="surface" id="surface"
                            value="{{ old('surface', $logement->surface) }}" class="w-full border rounded px-3 py-2">
                        @error('surface')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex-1 min-w-[150px]">
                        <label for="nombre_pieces" class="block font-medium mb-1">Nombre de pièces</label>
                        <input type="number" name="nombre_pieces" id="nombre_pieces"
                            value="{{ old('nombre_pieces', $logement->nombre_pieces) }}"
                            class="w-full border rounded px-3 py-2">
                        @error('nombre_pieces')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center min-w-[150px]">
                        <input type="checkbox" name="meuble" id="meuble" value="1"
                            {{ old('meuble', $logement->meuble) ? 'checked' : '' }} class="mr-2">
                        <label for="meuble" class="font-medium">Meublé</label>
                    </div>

                    <div class="flex items-center min-w-[150px]">
                        <input type="checkbox" name="wifi_inclus" id="wifi_inclus" value="1"
                            {{ old('wifi_inclus', $logement->wifi_inclus) ? 'checked' : '' }} class="mr-2">
                        <label for="wifi_inclus" class="font-medium">Wifi inclus</label>
                    </div>
                </div>

                <!-- Ligne 7 : Type chauffage + Statut + Disponibilité -->
                <div class="flex gap-4 mb-4 items-center">
                    <div class="flex-1">
                        <label for="type_chauffage" class="block font-medium mb-1">Type chauffage</label>
                        <input type="text" name="type_chauffage" id="type_chauffage"
                            value="{{ old('type_chauffage', $logement->type_chauffage) }}"
                            class="w-full border rounded px-3 py-2">
                        @error('type_chauffage')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex-1">
                        <label for="statut" class="block font-medium mb-1">Statut</label>
                        <select name="statut" id="statut" required class="w-full border rounded px-3 py-2">
                            <option value="">-- Sélectionnez --</option>
                            <option value="disponible"
                                {{ old('statut', $logement->statut) == 'disponible' ? 'selected' : '' }}>Disponible
                            </option>
                            <option value="loué" {{ old('statut', $logement->statut) == 'loué' ? 'selected' : '' }}>
                                Loué</option>
                            <option value="en maintenance"
                                {{ old('statut', $logement->statut) == 'en maintenance' ? 'selected' : '' }}>En
                                maintenance</option>
                        </select>
                        @error('statut')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex-1">
                        <label for="disponibilite" class="block font-medium mb-1">Disponibilité</label>
                        <input type="date" name="disponibilite" id="disponibilite"
                            value="{{ old('disponibilite', optional($logement->disponibilite)->format('Y-m-d')) }}"
                            class="w-full border rounded px-3 py-2">
                        @error('disponibilite')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Ligne 8 : Description -->
                <div class="mb-4">
                    <label for="description" class="block font-medium mb-1">Description</label>
                    <textarea name="description" id="description" rows="4" class="w-full border rounded px-3 py-2">{{ old('description', $logement->description) }}</textarea>
                    @error('description')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Ligne 9 : Photos -->
                <div class="mb-4">
                    <label for="photos" class="block font-medium mb-1">Photos (plusieurs fichiers autorisés)</label>
                    <input type="file" name="photos[]" id="photos" multiple accept="image/*"
                        class="block w-full border rounded px-3 py-2">
                    @error('photos.*')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    @if ($logement->photos)
                        @php
                            $photos = is_string($logement->photos)
                                ? json_decode($logement->photos, true)
                                : $logement->photos;
                        @endphp
                        <div class="mt-4 flex flex-wrap gap-4">
                            @foreach ($photos as $photo)
                                <img src="{{ asset('storage/' . $photo) }}" alt="Photo logement"
                                    class="w-24 h-16 object-cover rounded border">
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Bouton -->
              <div style="display: flex; justify-content: center; margin-top: 24px;">
  <button
    type="submit"
    style="
      width: 20%;
      padding: 10px 0;
      background-color: #4f46e5; /* Indigo 600 */
      color: white;
      border: none;
      border-radius: 6px;
      font-weight: 600;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      outline: none;
    "
    onmouseover="this.style.backgroundColor='#4338ca'"
    onmouseout="this.style.backgroundColor='#4f46e5'"
    onfocus="this.style.boxShadow='0 0 0 3px rgba(99, 102, 241, 0.5)'"
    onblur="this.style.boxShadow='none'"
  >
    Modifier
  </button>
</div>

            </form>

        </div>
    </div>
</x-app-layout>
