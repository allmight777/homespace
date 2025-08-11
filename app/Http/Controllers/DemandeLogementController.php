<?php

namespace App\Http\Controllers;

use App\Models\DemandeLogement;
use Illuminate\Http\Request;

class DemandeLogementController extends Controller
{
    public function index()
    {
        $demandes = auth()->user()->demandesLogements()->get();

        return view('demandes_logements.index', compact('demandes'));
    }

    public function create()
    {
        return view('demandes_logements.create');
    }

    public function store(Request $request)
    {
        // Avant la validation : on force la valeur des checkboxes si elles sont absentes
        $request->merge([
            'electricite' => $request->has('electricite'),
            'eau' => $request->has('eau'),
        ]);

        // Validation
        $validated = $request->validate([
            'lieu' => 'required|string|max:255',
            'type_chambre' => 'required|string|max:255',
            'electricite' => 'boolean',
            'description_electricite' => 'nullable|string',
            'eau' => 'boolean',
            'description_eau' => 'nullable|string',
            'nombre_chambres' => 'required|integer|min:1',
            'autres_criteres' => 'nullable|string',
        ]);

        $validated['user_id'] = auth()->id();

        // Création
        DemandeLogement::create($validated);

        return redirect()->route('demandes-logements.index')->with('success', 'Demande créée avec succès.');
    }

    public function edit(DemandeLogement $demandesLogement)
    {
        // Vérifie que l'utilisateur est bien le propriétaire
        if ($demandesLogement->user_id !== auth()->id()) {
            abort(403, 'Accès non autorisé.');
        }

        return view('demandes_logements.edit', ['demande' => $demandesLogement]);
    }

    public function update(Request $request, DemandeLogement $demandesLogement)
    {
        if ($demandesLogement->user_id !== auth()->id()) {
            abort(403, 'Accès non autorisé.');
        }

        $request->merge([
            'electricite' => $request->has('electricite'),
            'eau' => $request->has('eau'),
        ]);

        $validated = $request->validate([
            'lieu' => 'required|string|max:255',
            'type_chambre' => 'required|string|max:255',
            'electricite' => 'boolean',
            'description_electricite' => 'nullable|string',
            'eau' => 'boolean',
            'description_eau' => 'nullable|string',
            'nombre_chambres' => 'required|integer|min:1',
            'autres_criteres' => 'nullable|string',
        ]);

        $demandesLogement->update($validated);

        return redirect()->route('demandes-logements.index')->with('success', 'Demande mise à jour avec succès.');
    }

    public function destroy(DemandeLogement $demandesLogement)
    {
        if ($demandesLogement->user_id !== auth()->id()) {
            abort(403, 'Accès non autorisé.');
        }

        $demandesLogement->delete();

        return redirect()->route('demandes-logements.index')->with('success', 'Demande supprimée.');
    }
}
