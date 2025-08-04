<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Logement;
use Illuminate\Http\Request;

class LogementController extends Controller
{
    public function index()
    {
        $logements = Logement::paginate(10);

        return view('admin.logements.index', compact('logements'));
    }

    public function create()
    {
        return view('admin.logements.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'prix' => 'required|numeric|min:0',
            'localisation' => 'required|string|max:255',
            'proprietaire' => 'required|string|max:255',
            'locataire' => 'nullable|string|max:255',
            'genre_locataire' => 'required|in:homme,femme,mixte',
            'nbr_avance' => 'required|integer|min:0',
            'caution' => 'required|numeric|min:0',
            'eau' => 'sometimes|boolean',
            'type_compteur_eau' => 'nullable|string|max:255',
            'electricite' => 'sometimes|boolean',
            'type_compteur_electricite' => 'nullable|string|max:255',
            'surface' => 'nullable|numeric|min:0',
            'nombre_pieces' => 'nullable|integer|min:0',
            'meuble' => 'sometimes|boolean',
            'disponibilite' => 'nullable|date',
            'description' => 'nullable|string',
            'type_chauffage' => 'nullable|string|max:255',
            'charges' => 'nullable|numeric|min:0',
            'contact_tel' => 'nullable|string|max:50',
            'wifi_inclus' => 'sometimes|boolean',
            'statut' => 'required|string|in:disponible,loué,en maintenance',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Gestion des checkbox (elles envoient la valeur uniquement si cochées)
        $validated['eau'] = $request->has('eau');
        $validated['electricite'] = $request->has('electricite');
        $validated['meuble'] = $request->has('meuble');
        $validated['wifi_inclus'] = $request->has('wifi_inclus');

        // Gestion des photos uploadées
        $photosPaths = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('photos_logements', 'public');
                $photosPaths[] = $path;
            }
        }
        $validated['photos'] = json_encode($photosPaths);

        $validated['charges'] = $validated['charges'] ?? 0;

        Logement::create($validated);

        return redirect()->route('admin.logements.index')->with('success', 'Logement ajouté avec succès');
    }

    public function show(Logement $logement)
    {

        return view('admin.logements.show', compact('logement'));
    }

    public function edit(Logement $logement)
    {
        return view('admin.logements.edit', compact('logement'));
    }

    public function update(Request $request, Logement $logement)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'prix' => 'required|numeric|min:0',
            'localisation' => 'required|string|max:255',
            'proprietaire' => 'required|string|max:255',
            'locataire' => 'nullable|string|max:255',
            'genre_locataire' => 'required|in:homme,femme,mixte',
            'nbr_avance' => 'required|integer|min:0',
            'caution' => 'required|numeric|min:0',
            'eau' => 'sometimes|boolean',
            'type_compteur_eau' => 'nullable|string|max:255',
            'electricite' => 'sometimes|boolean',
            'type_compteur_electricite' => 'nullable|string|max:255',
            'surface' => 'nullable|numeric|min:0',
            'nombre_pieces' => 'nullable|integer|min:0',
            'meuble' => 'sometimes|boolean',
            'disponibilite' => 'nullable|date',
            'description' => 'nullable|string',
            'type_chauffage' => 'nullable|string|max:255',
            'charges' => 'nullable|numeric|min:0',
            'contact_tel' => 'nullable|string|max:50',
            'wifi_inclus' => 'sometimes|boolean',
            'statut' => 'required|string|in:disponible,loué,en maintenance',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Pour les checkbox : on force la présence (car si décoché, pas envoyé par le formulaire)
        $validated['eau'] = $request->has('eau');
        $validated['electricite'] = $request->has('electricite');
        $validated['meuble'] = $request->has('meuble');
        $validated['wifi_inclus'] = $request->has('wifi_inclus');

        // Gestion des photos uploadées
        if ($request->hasFile('photos')) {
            $photosPaths = json_decode($logement->photos, true) ?: [];

            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('photos_logements', 'public');
                $photosPaths[] = 'storage/'.$path;
            }
            $validated['photos'] = json_encode($photosPaths);
        } else {
            // Garder les anciennes photos si pas de nouvel upload
            $validated['photos'] = $logement->photos;
        }

        $logement->update($validated);

        return redirect()->route('admin.logements.index')->with('success', 'Logement modifié avec succès');
    }

    public function destroy(Logement $logement)
    {
        $logement->delete();

        return redirect()->route('admin.logements.index')->with('success', 'Logement supprimé avec succès');
    }
}
