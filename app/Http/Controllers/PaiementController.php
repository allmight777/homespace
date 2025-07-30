<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaiementController extends Controller
{
    public function payer()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('register');
        }

        return view('paiement.lancer', compact('user'));
    }

    

    public function paiementSuccess(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|string',
            'apartment_id' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $user = Auth::user();

        $paiement = Paiement::create([
            'user_id' => $user->id,
            'montant' => 100,
            'status' => 'approuvé',
            'transaction_id' => $request->transaction_id,
            'apartment_id' => $request->apartment_id,
            'description' => $request->description,
        ]);

        return response()->json(['success' => true]);
    }

    public function confirmation()
    {
        return view('paiement.confim');
    }
}
