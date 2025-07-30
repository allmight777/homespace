@extends('layouts.usersConnecter')

@section('content')
<div class="container text-center mt-5">
    <h2>Paiement réussi 🎉</h2>
    <p>Merci pour votre paiement.</p>
    <p><strong>ID Transaction:</strong> {{ $paiement->transaction_id }}</p>
</div>
@endsection
