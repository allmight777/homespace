<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logement;

class MaisonController extends Controller
{
        public function index()
    {
        $logements = Logement::where('statut', 'disponible')->paginate(6);
        return view('maison', compact('logements'));
    }
}
