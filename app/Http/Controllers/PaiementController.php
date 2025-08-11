<?php

namespace App\Http\Controllers;

use App\Mail\PaymentConfirmation;
use App\Models\Paiement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PaiementController extends Controller
{


    

      public function welcome()
    {     

        return view('bienvenue');
    }
    
    public function lancer(Request $request)
    {
        if (! auth()->check()) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter pour effectuer un paiement.');
        }

        $apartmentId = $request->query('apartment_id');

        return view('paiement.lancer', compact('apartmentId'));
    }

    public function initierPaiement(Request $request)
    {
        $request->validate([
            'apartment_id' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        try {
            $userId = auth()->id();
            $apartmentId = $request->apartment_id;
            $description = $request->description;

            // Trouver tous les paiements identiques (user + apartment + description)
            $paiementsDoublons = Paiement::where('user_id', $userId)
                ->where('apartment_id', $apartmentId)
                ->where('description', $description)
                ->get();

            if ($paiementsDoublons->count() > 1) {
                // On garde le premier paiement (le plus ancien) et on supprime les autres
                $paiementAGarder = $paiementsDoublons->sortBy('created_at')->first();
                $idsASupprimer = $paiementsDoublons->pluck('id')->filter(function ($id) use ($paiementAGarder) {
                    return $id != $paiementAGarder->id;
                });

                Paiement::whereIn('id', $idsASupprimer)->delete();

                return response()->json([
                    'success' => true,
                    'paiement_id' => $paiementAGarder->id,
                    'message' => 'Doublons supprimés, paiement conservé',
                ]);
            }

            if ($paiementsDoublons->count() === 1) {
                // Un seul paiement identique trouvé, on le retourne
                return response()->json([
                    'success' => true,
                    'paiement_id' => $paiementsDoublons->first()->id,
                    'message' => 'Paiement existant trouvé',
                ]);
            }

            // Aucun paiement identique, on crée un nouveau
            $paiement = Paiement::create([
                'user_id' => $userId,
                'montant' => 1500,
                'status' => 'en_attente',
                'transaction_id' => 'temp_'.uniqid(),
                'apartment_id' => $apartmentId,
                'description' => $description,
            ]);

            return response()->json([
                'success' => true,
                'paiement_id' => $paiement->id,
                'message' => 'Paiement initié avec succès',
            ]);
        } catch (\Exception $e) {
            Log::error('Erreur création paiement', [
                'error' => $e->getMessage(),
                'user_id' => $userId,
                'data' => $request->all(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l\'initialisation du paiement',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function confirmerPaiement(Request $request)
    {
        $request->validate([
            'paiement_id' => 'required|integer',
            'transaction_id' => 'required|string',
        ]);

        try {
            $paiement = Paiement::where('id', $request->paiement_id)
                ->where('user_id', auth()->id())
                ->firstOrFail();

            // Mise à jour avec le vrai transaction_id
            $paiement->update([
                'transaction_id' => $request->transaction_id,
                'status' => 'approuvé',
            ]);

            // Envoi de l'email
            Mail::to(auth()->user()->email)->send(new PaymentConfirmation($paiement));

            return response()->json([
                'success' => true,
                'message' => 'Paiement confirmé avec succès',
            ]);

        } catch (\Exception $e) {
            Log::error('Erreur confirmation paiement', [
                'error' => $e->getMessage(),
                'paiement_id' => $request->paiement_id,
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la confirmation du paiement',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function confirmation($id)
    {
        $paiement = Paiement::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        return view('paiement.confirmation', [
            'paiement' => $paiement,
            'status' => session('status'),
        ]);
    }

    // Voir les paiments de user

    public function mesPaiements()
    {
        $paiements = \App\Models\Paiement::where('user_id', auth()->id())
            ->orderByDesc('created_at')
            ->get();

        return view('paiement.mes_paiements', compact('paiements'));
    }

    // Gestion paiment admin

    public function index()
    {
        // Récupérer les paiements par date décroissante
        $paiements = Paiement::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.demandes.index', compact('paiements'));
    }

    public function updateStatus(Request $request, Paiement $paiement)
    {
        $request->validate([
            'status' => 'required|string|in:en_attente,validé,rejeté',
            'admin_comment' => 'nullable|string|max:1000',
        ]);

        $paiement->status = $request->status;
        $paiement->admin_comment = $request->admin_comment;
        $paiement->save();

        return redirect()->route('admin.paiements.index')->with('success', 'Statut du paiement mis à jour.');
    }
}
