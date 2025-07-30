<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Ajouter un logement') }}
            </h2>
            <a href="{{ route('admin.logements.index') }}"
                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md text-sm font-semibold hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Voir la liste
            </a>

        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('admin.logements.store') }}" method="POST" enctype="multipart/form-data"
                    novalidate>
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nom -->
                        <div>
                            <label for="nom" class="block font-medium text-sm text-gray-700">Nom <span
                                    class="text-red-600">*</span></label>
                            <input id="nom" name="nom" type="text" value="{{ old('nom') }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                focus:border-indigo-500 focus:ring-indigo-500 @error('nom') border-red-600 @enderror" />
                            @error('nom')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Type -->
                        <div>
                            <label for="type" class="block font-medium text-sm text-gray-700">Type <span
                                    class="text-red-600">*</span></label>
                            <input id="type" name="type" type="text" value="{{ old('type') }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                focus:border-indigo-500 focus:ring-indigo-500 @error('type') border-red-600 @enderror" />
                            @error('type')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Prix -->
                        <div>
                            <label for="prix" class="block font-medium text-sm text-gray-700">Prix <span
                                    class="text-red-600">*</span></label>
                            <input id="prix" name="prix" type="number" step="0.01"
                                value="{{ old('prix') }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                focus:border-indigo-500 focus:ring-indigo-500 @error('prix') border-red-600 @enderror" />
                            @error('prix')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Localisation -->
                        <div>
                            <label for="localisation" class="block font-medium text-sm text-gray-700">Localisation <span
                                    class="text-red-600">*</span></label>
                            <input id="localisation" name="localisation" type="text"
                                value="{{ old('localisation') }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                focus:border-indigo-500 focus:ring-indigo-500 @error('localisation') border-red-600 @enderror" />
                            @error('localisation')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Propriétaire -->
                        <div>
                            <label for="proprietaire" class="block font-medium text-sm text-gray-700">Propriétaire <span
                                    class="text-red-600">*</span></label>
                            <input id="proprietaire" name="proprietaire" type="text"
                                value="{{ old('proprietaire') }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                focus:border-indigo-500 focus:ring-indigo-500 @error('proprietaire') border-red-600 @enderror" />
                            @error('proprietaire')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Locataire -->
                        <div>
                            <label for="locataire" class="block font-medium text-sm text-gray-700">Locataire (Non
                                obligatoire)</label>
                            <input id="locataire" name="locataire" type="text" value="{{ old('locataire') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                focus:border-indigo-500 focus:ring-indigo-500 @error('locataire') border-red-600 @enderror" />
                            @error('locataire')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Genre locataire -->
                        <div>
                            <label for="genre_locataire" class="block font-medium text-sm text-gray-700">Genre
                                Proprietaire <span class="text-red-600">*</span></label>
                            <select id="genre_locataire" name="genre_locataire" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                focus:border-indigo-500 focus:ring-indigo-500 @error('genre_locataire') border-red-600 @enderror">
                                <option value="">-- Sélectionnez --</option>
                                <option value="homme" {{ old('genre_locataire') == 'homme' ? 'selected' : '' }}>Homme
                                </option>
                                <option value="femme" {{ old('genre_locataire') == 'femme' ? 'selected' : '' }}>Femme
                                </option>
                                <option value="mixte" {{ old('genre_locataire') == 'mixte' ? 'selected' : '' }}>Mixte
                                </option>
                            </select>
                            @error('genre_locataire')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nombre d'avances -->
                        <div>
                            <label for="nbr_avance" class="block font-medium text-sm text-gray-700">Nombre d'avances
                                <span class="text-red-600">*</span></label>
                            <input id="nbr_avance" name="nbr_avance" type="number" min="0" required
                                value="{{ old('nbr_avance') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                focus:border-indigo-500 focus:ring-indigo-500 @error('nbr_avance') border-red-600 @enderror" />
                            @error('nbr_avance')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Caution -->
                        <div>
                            <label for="caution" class="block font-medium text-sm text-gray-700">Caution (FCFA) <span
                                    class="text-red-600">*</span></label>
                            <input id="caution" name="caution" type="number" step="0.01" min="0" required
                                value="{{ old('caution') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                focus:border-indigo-500 focus:ring-indigo-500 @error('caution') border-red-600 @enderror" />
                            @error('caution')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Eau -->
                        <div class="flex items-center space-x-3">
                            <input type="checkbox" id="eau" name="eau" value="1"
                                {{ old('eau') ? 'checked' : '' }}
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" />
                            <label for="eau" class="font-medium text-sm text-gray-700">Eau (Disponible ou
                                non)</label>
                        </div>

                        <!-- Type compteur eau -->
                        <div>
                            <label for="type_compteur_eau" class="block font-medium text-sm text-gray-700">Type
                                compteur eau (Non obligatoire)</label>
                            <input id="type_compteur_eau" name="type_compteur_eau" type="text"
                                value="{{ old('type_compteur_eau') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                focus:border-indigo-500 focus:ring-indigo-500 @error('type_compteur_eau') border-red-600 @enderror" />
                            @error('type_compteur_eau')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Electricité -->
                        <div class="flex items-center space-x-3">
                            <input type="checkbox" id="electricite" name="electricite" value="1"
                                {{ old('electricite') ? 'checked' : '' }}
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" />
                            <label for="electricite" class="font-medium text-sm text-gray-700">Electricité (Disponible
                                ou non)</label>
                        </div>

                        <!-- Type compteur électricité -->
                        <div>
                            <label for="type_compteur_electricite"
                                class="block font-medium text-sm text-gray-700">Type compteur électricité (Non
                                obligatoire)</label>
                            <input id="type_compteur_electricite" name="type_compteur_electricite" type="text"
                                value="{{ old('type_compteur_electricite') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                focus:border-indigo-500 focus:ring-indigo-500 @error('type_compteur_electricite') border-red-600 @enderror" />
                            @error('type_compteur_electricite')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Surface -->
                        <div>
                            <label for="surface" class="block font-medium text-sm text-gray-700">Surface (Non
                                obligatoire)</label>
                            <input id="surface" name="surface" type="number" step="0.01" min="0"
                                value="{{ old('surface') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                focus:border-indigo-500 focus:ring-indigo-500 @error('surface') border-red-600 @enderror" />
                            @error('surface')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nombre pièces -->
                        <div>
                            <label for="nombre_pieces" class="block font-medium text-sm text-gray-700">Nombre de
                                pièces (Non obligatoire)</label>
                            <input id="nombre_pieces" name="nombre_pieces" type="number" min="0"
                                value="{{ old('nombre_pieces') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                focus:border-indigo-500 focus:ring-indigo-500 @error('nombre_pieces') border-red-600 @enderror" />
                            @error('nombre_pieces')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Meublé -->
                        <div class="flex items-center space-x-3">
                            <input type="checkbox" id="meuble" name="meuble" value="1"
                                {{ old('meuble') ? 'checked' : '' }}
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" />
                            <label for="meuble" class="font-medium text-sm text-gray-700">Meublé (Oui ou
                                Non)</label>
                        </div>

                        <!-- Disponibilité -->
                        <div>
                            <label for="disponibilite" class="block font-medium text-sm text-gray-700">Disponibilité
                                (Non obligatoire)</label>
                            <input id="disponibilite" name="disponibilite" type="date"
                                value="{{ old('disponibilite') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                focus:border-indigo-500 focus:ring-indigo-500 @error('disponibilite') border-red-600 @enderror" />
                            @error('disponibilite')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>



                        <!-- Type chauffage -->
                        <div>
                            <label for="type_chauffage" class="block font-medium text-sm text-gray-700">Type chauffage
                                (Non obligatoire)</label>
                            <input id="type_chauffage" name="type_chauffage" type="text"
                                value="{{ old('type_chauffage') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                focus:border-indigo-500 focus:ring-indigo-500 @error('type_chauffage') border-red-600 @enderror" />
                            @error('type_chauffage')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Charges -->
                        <div>
                            <label for="charges" class="block font-medium text-sm text-gray-700">Charges (Non
                                obligatoire)</label>
                            <input id="charges" name="charges" type="number" step="0.01" min="0"
                                value="{{ old('charges') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                focus:border-indigo-500 focus:ring-indigo-500 @error('charges') border-red-600 @enderror" />
                            @error('charges')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Contact téléphone -->
                        <div>
                            <label for="contact_tel" class="block font-medium text-sm text-gray-700">Contact
                                Proprietaire</label>
                            <input id="contact_tel" name="contact_tel" type="text"
                                value="{{ old('contact_tel') }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                focus:border-indigo-500 focus:ring-indigo-500 @error('contact_tel') border-red-600 @enderror" />
                            @error('contact_tel')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Wifi inclus -->
                        <div class="flex items-center space-x-3">
                            <input type="checkbox" id="wifi_inclus" name="wifi_inclus" value="1"
                                {{ old('wifi_inclus') ? 'checked' : '' }}
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" />
                            <label for="wifi_inclus" class="font-medium text-sm text-gray-700">Wifi inclus (Oui ou
                                Non)</label>
                        </div>

                        <!-- Statut -->
                        <div>
                            <label for="statut" class="block font-medium text-sm text-gray-700">Statut <span
                                    class="text-red-600">*</span></label>
                            <select id="statut" name="statut" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                focus:border-indigo-500 focus:ring-indigo-500 @error('statut') border-red-600 @enderror">
                                <option value="">-- Sélectionnez --</option>
                                <option value="disponible" {{ old('statut') == 'disponible' ? 'selected' : '' }}>
                                    Disponible</option>
                                <option value="loué" {{ old('statut') == 'loué' ? 'selected' : '' }}>Loué</option>
                                <option value="en maintenance"
                                    {{ old('statut') == 'en maintenance' ? 'selected' : '' }}>En maintenance</option>
                            </select>
                            @error('statut')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="md:col-span-2">
                            <label for="description" class="block font-medium text-sm text-gray-700">Description (Non
                                obligatoire)</label>
                            <textarea id="description" name="description" rows="3"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                focus:border-indigo-500 focus:ring-indigo-500 @error('description') border-red-600 @enderror">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Photos -->


                        <style>
                            .upload-btn {
                                display: inline-flex;
                                align-items: center;
                                padding: 0.5rem 1rem;
                                background-color: #4F46E5;
                                /* indigo-600 */
                                color: #fff;
                                border-radius: 0.375rem;
                                cursor: pointer;
                                transition: background-color 0.3s ease;
                                font-weight: 500;
                            }

                            .upload-btn:hover {
                                background-color: #4338CA;
                                /* indigo-700 */
                            }

                            .upload-btn svg {
                                margin-right: 0.5rem;
                            }

                            .preview-img {
                                width: 120px;
                                height: 90px;
                                object-fit: cover;
                                border-radius: 0.5rem;
                                box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
                            }

                            .photos-preview {
                                display: flex;
                                flex-wrap: wrap;
                                gap: 1rem;
                                margin-top: 1rem;
                            }

                            .error-text {
                                color: #DC2626;
                                /* red-600 */
                                font-size: 0.875rem;
                                margin-top: 0.5rem;
                            }
                        </style>

                        <div class="md:col-span-2">
                            <label for="photos" class="block font-medium text-sm text-gray-700 mb-2">Photos</label>

                            <label for="photos" class="upload-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M4 12l4-4m0 0l4 4m-4-4v12" />
                                </svg>
                                Sélectionner des photos
                            </label>

                            <input id="photos" name="photos[]" type="file" multiple accept="image/*"
                                class="hidden" onchange="previewImages(event)" />

                            <div id="photosPreview" class="photos-preview"></div>

                            @error('photos.*')
                                <p class="error-text">{{ $message }}</p>
                            @enderror
                        </div>

                        <script>
                            function previewImages(event) {
                                const preview = document.getElementById('photosPreview');
                                preview.innerHTML = ''; // Clear existing previews

                                const files = event.target.files;

                                if (files) {
                                    Array.from(files).forEach(file => {
                                        const reader = new FileReader();
                                        reader.onload = function(e) {
                                            const img = document.createElement('img');
                                            img.src = e.target.result;
                                            img.classList.add('preview-img');
                                            preview.appendChild(img);
                                        };
                                        reader.readAsDataURL(file);
                                    });
                                }
                            }
                        </script>


                    </div>

                    <style>
                        .btn-ajouter {
                            width: 20%;
                            padding: 0.5rem 1rem;
                            background-color: #4F46E5;
                            /* indigo-600 */
                            border: none;
                            border-radius: 0.375rem;
                            font-weight: 600;
                            color: #fff;
                            cursor: pointer;
                            transition: background-color 0.3s ease, box-shadow 0.3s ease;
                            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
                        }

                        .btn-ajouter:hover {
                            background-color: #4338CA;
                            /* indigo-700 */
                        }

                        .btn-ajouter:focus {
                            outline: none;
                            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.5);
                        }
                    </style>

                    <div class="flex justify-center mt-6">
                        <button type="submit" class="btn-ajouter">
                            Ajouter
                        </button>
                    </div>



                </form>

            </div>

        </div>
    </div>
</x-app-layout>
