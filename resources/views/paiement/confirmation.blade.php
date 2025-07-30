@extends('layouts.usersConnecter')

@section('content')
<div class="container mt-5">
    <div class="confirmation-container text-center p-5 bg-white rounded shadow">
        <div class="success-icon mb-4">
            <i class="fas fa-check-circle text-success" style="font-size: 5rem;"></i>
        </div>

        <h2 class="mb-4">Paiement Réussi!</h2>

        <div class="confirmation-details bg-light p-4 rounded text-left mx-auto" style="max-width: 500px;">
            <h4 class="mb-4 text-center">Détails du paiement</h4>

            <div class="detail-item d-flex justify-content-between mb-3">
                <span class="font-weight-bold">ID Appartement:</span>
                <span>{{ $paiement->apartment_id }}</span>
            </div>

            <div class="detail-item d-flex justify-content-between mb-3">
                <span class="font-weight-bold">Montant:</span>
                <span>1 500 FCFA</span>
            </div>

            <div class="detail-item d-flex justify-content-between mb-3">
                <span class="font-weight-bold">ID Transaction:</span>
                <span>{{ $paiement->transaction_id }}</span>
            </div>

            <div class="detail-item d-flex justify-content-between mb-3">
                <span class="font-weight-bold">Date:</span>
                <span>{{ $paiement->created_at->format('d/m/Y H:i') }}</span>
            </div>

            @if($paiement->description)
            <div class="detail-item">
                <span class="font-weight-bold">Description:</span>
                <p class="mt-2">{{ $paiement->description }}</p>
            </div>
            @endif
        </div>

        <div class="actions mt-5">
            <a href="{{ route('home') }}" class="btn btn-primary">
                <i class="fas fa-home mr-2"></i> Retour à l'accueil
            </a>
        </div>
    </div>
</div>

<style>
    .confirmation-container {
        max-width: 800px;
        margin: 0 auto;
    }

    .confirmation-details {
        border: 1px solid #dee2e6;
    }

    .detail-item {
        padding-bottom: 10px;
        border-bottom: 1px dashed #dee2e6;
    }
</style>
@endsection
