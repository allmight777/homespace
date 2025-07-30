@extends('layouts.welcome')

@section('content')
<div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;">
    <h2 style="color: #2d3748;">Confirmation de Paiement</h2>

    <p>Bonjour {{ $user->name }},</p>

    <p>Votre paiement a été traité avec succès. Voici les détails :</p>

    <div style="background: #f7fafc; padding: 15px; border-radius: 8px; margin: 15px 0;">
        <p><strong>Référence:</strong> {{ $paiement->transaction_id }}</p>
        <p><strong>Appartement:</strong> {{ $paiement->apartment_id }}</p>
        <p><strong>Montant:</strong> 1 500 FCFA</p>
        <p><strong>Date:</strong> {{ $paiement->created_at->format('d/m/Y H:i') }}</p>
        @if($paiement->description)
        <p><strong>Description:</strong> {{ $paiement->description }}</p>
        @endif
    </div>

    <p>Merci pour votre confiance.</p>

    <p>Cordialement,<br>L'équipe de gestion</p>
</div>
@endsection
