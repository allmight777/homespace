@extends('layouts.usersConnecter')

@section('content')
<div class="container mt-5">
    <h2 class="text-center">Paiement du service</h2>

    <form id="paiement-form" class="mt-4">
        @csrf

        <div class="form-group">
            <label for="apartment_id">ID de l'appartement</label>
            <input type="text" class="form-control" id="apartment_id" name="apartment_id" required>
        </div>

        <div class="form-group mt-3">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>

        <button id="pay-btn" type="button" class="btn btn-success mt-3">Payer maintenant</button>
    </form>
</div>

<meta name="csrf-token" content="{{ csrf_token() }}">

<script src="https://cdn.fedapay.com/checkout.js?v=1.1.7"></script>

<script>
    document.getElementById('pay-btn').addEventListener('click', function () {
        const apartmentId = document.getElementById('apartment_id').value.trim();
        const description = document.getElementById('description').value.trim();

        if (!apartmentId) {
            alert("Veuillez saisir l'ID de l'appartement.");
            return;
        }

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        FedaPay.init('#pay-btn', {
            public_key: "{{ config('services.fedapay.public_key') }}",
            transaction: {
                amount: 100,
                description: 'Paiement service logement'
            },
            customer: {
                email: "{{ auth()->user()->email }}",
                firstname: "{{ auth()->user()->name }}",
                phone_number: {
                    number: "{{ auth()->user()->whatsapp_number ?? '97000000' }}",
                    country: 'bj'
                }
            },
            callback: function (response) {
                if (response.transaction.status === 'approved') {
                    fetch("{{ route('paiement.success') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": csrfToken
                        },
                        credentials: "same-origin",
                        body: JSON.stringify({
                            transaction_id: response.transaction.id,
                            apartment_id: apartmentId,
                            description: description
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            window.location.href = "{{ route('paiement.confirmation') }}";
                        } else {
                            alert("Erreur : " + (data.error || 'Inconnue'));
                        }
                    })
                    .catch(error => {
                        alert("Erreur lors de l'envoi.");
                        console.error(error);
                    });
                } else {
                    alert("Le paiement a été annulé ou refusé.");
                }
            }
        });
    });
</script>
@endsection
