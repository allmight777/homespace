<?php

namespace App\Http\Controllers;

use App\Models\Logement;

class MaisonController extends Controller
{
    public function index()
    {
        $logements = Logement::where('statut', 'disponible')->paginate(6);

        return view('maison', compact('logements'));
    }

    public function show($id)
    {
        $logement = Logement::findOrFail($id);

        // Si photos est JSON string, on le décode
        if (is_string($logement->photos)) {
            $logement->photos = json_decode($logement->photos, true);
        }

        return view('showDetailLogement', compact('logement'));
    }
}
