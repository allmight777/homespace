<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DemandeLogement;
use Illuminate\Http\Request;

class DemandeLogementAdminController extends Controller
{
    public function index()
    {
        $demandes = DemandeLogement::orderBy('created_at', 'desc')->get();

        return view('admin.demandeLogements.index', compact('demandes'));
    }

    public function show(DemandeLogement $demandesLogement)
    {
        return view('admin.demandeLogements.show', ['demande' => $demandesLogement]);
    }

    public function edit(DemandeLogement $demandesLogement)
    {
        return view('admin.demandeLogements.edit', ['demande' => $demandesLogement]);
    }

    public function update(Request $request, $id)
    {
        $demande_logement = DemandeLogement::findOrFail($id);

        $data = $request->all();

        if (isset($data['reponse_autre'])) {
            $demande_logement->reponse_admin = $data['reponse_autre'];
        } else {
            $demande_logement->reponse_admin = $data['reponse_admin'] ?? null;
        }

        $demande_logement->save(); 

        return redirect()->route('admin.demandes-logements.index')->with('success', 'Statut mis à jour avec succès.');
    }

    public function destroy(DemandeLogement $demandesLogement)
    {
        $demandesLogement->delete();

        return redirect()->route('admin.demandes-logements.index')->with('success', 'Demande supprimée');
    }
}
