@extends('layouts.usersConnecter')

@section('content')
    <div class="container mt-0">
        <br><br>
        <div class="payment-container animate__animated animate__fadeInUp">
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
                <h1 class="payment-title m-0">
                    💳 Paiement
                </h1>

                <a href="{{ route('mes.paiements') }}"
                    class="btn btn-outline-primary d-flex align-items-center gap-2 mt-2 mt-md-0">
                    📄 Suivre mes demandes
                </a>
            </div>


            <div id="error-message" class="mt-3"></div>
            <div class="tenant-info bg-light p-4 rounded mb-4"
                style="display: flex; align-items: center; gap: 20px; flex-wrap: wrap;">

                <div style="min-width: 150px; flex: 1 1 200px;">
                    <p><strong>Utilisateur:</strong> {{ auth()->user()->name }}</p>
                    <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                </div>

                <div style="display: flex; gap: 10px; flex-wrap: wrap; flex: 1 1 200px; justify-content: flex-start;">
                    <img src="{{ asset('images/image_22.webp') }}" alt="Moov money"
                        style="width: 80px; height: 80px; object-fit: cover; border-radius: 6px;">
                    <img src="{{ asset('images/image_23.webp') }}" alt="MTN Momo"
                        style="width: 80px; height: 80px; object-fit: cover; border-radius: 6px;">
                    <img src="{{ asset('images/image_21.webp') }}" alt="CELTIS Cash"
                        style="width: 80px; height: 80px; object-fit: cover; border-radius: 6px;">
                </div>

            </div>



            <form id="paiement-form" class="mt-4">
                @csrf

                <div class="form-group mb-4">
                   <p class="text-danger">Veuillez cliquer sur "Voir les étapes" pour mieux comprendre ou trouver l'ID de l'appartement souhaité.</p>

                    <div class="d-flex justify-content-between align-items-center">

                        <label for="apartment_id" class="form-label mb-1 fw-bold">
                            🏠 ID de l'appartement
                        </label>
                        <button type="button" class="btn btn-sm btn-outline-info" data-bs-toggle="modal"
                            data-bs-target="#etapesModal">
                            📘 Voir les étapes
                        </button>
                    </div>
                    <input type="text" class="form-control shadow-sm" id="apartment_id" name="apartment_id" required
                        placeholder="Ex : 1,3,5">
                </div>


                <div class="form-group">
                    <label for="description">📝 Description (facultative)</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>

                <div class="payment-summary bg-light p-4 rounded mt-4">
                    <h3 class="mb-3">Récapitulatif du paiement</h3>
                    <div class="summary-item d-flex justify-content-between font-weight-bold">
                        <span>Total à payer :</span>
                        <span>1 500 FCFA</span>
                    </div>
                </div>
                <div class="d-flex flex-column flex-md-row justify-content-between gap-3 mt-4">
                    <a href="{{ route('maison') }}" class="btn btn-primary w-100 w-md-50 py-2">
                        Retour
                    </a>

                    <button id="pay-btn" type="button" class="btn btn-success w-100 w-md-50 py-2">
                        <i class="fas fa-credit-card me-2"></i> Payer (Double clic)
                    </button>
                </div>



            </form>
        </div>
        <br><br>
    </div>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.fedapay.com/checkout.js?v=1.1.7"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <style>
        .payment-container {
            max-width: 700px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        .tenant-info {
            border-left: 4px solid #007bff;
        }

        .payment-summary {
            border-left: 4px solid #28a745;
        }

        .summary-item {
            font-size: 1.1rem;
        }

        #pay-btn {
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s;
        }

        #pay-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            border-radius: 8px;
            padding: 12px 15px;
        }

        textarea.form-control {
            min-height: 100px;
        }

        .btn-outline-secondary:hover {
            background-color: #e2e6ea;
            border-color: #dae0e5;
        }

        .me-2 {
            margin-right: 0.5rem !important;
        }

        .ms-2 {
            margin-left: 0.5rem !important;
        }

        @media (max-width: 576px) {
            .d-flex.justify-content-between {
                flex-direction: column;
            }

            .btn-lg.w-50 {
                width: 100% !important;
                margin-bottom: 10px;
            }
        }



        .payment-title {
            position: relative;
            font-weight: 700;
            font-size: 2.2rem;
            display: inline-block;
            padding-bottom: 8px;
            color: #2c3e50;
            animation: fadeInUp 0.8s ease-out both;
        }

        .payment-title::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: 0;
            width: 100%;
            height: 4px;
            background-color: #007bff;
            transform: translateX(-50%) scaleX(0);
            transform-origin: center;
            transition: transform 0.4s ease;
            border-radius: 2px;
        }

        .payment-title:hover::after {
            transform: translateX(-50%) scaleX(1);
        }

        /* Animation fadeInUp */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>


    <script>
        document.getElementById('pay-btn').addEventListener('click', async function() {
            const apartmentId = document.getElementById('apartment_id').value.trim();
            const description = document.getElementById('description').value.trim();
            const errorDiv = document.getElementById('error-message');

            // Reset des messages
            errorDiv.innerHTML = '';

            if (!apartmentId) {
                errorDiv.innerHTML =
                    '<div class="alert alert-danger">Veuillez saisir l\'ID de l\'appartement.</div>';
                return;
            }

            try {
                // 1. D'abord enregistrer en base
                const initResponse = await fetch("{{ route('paiement.initier') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Accept": "application/json",
                    },
                    body: JSON.stringify({
                        apartment_id: apartmentId,
                        description: description
                    })
                });

                const initData = await initResponse.json();

                if (!initResponse.ok) {
                    throw new Error(initData.message || 'Erreur lors de l\'initialisation');
                }

                // 2. Lancer FedaPay avec l'ID du paiement
                FedaPay.init('#pay-btn', {
                    public_key: "{{ config('services.fedapay.public_key') }}",
                    transaction: {
                        amount: 100,
                        description: 'Paiement pour appartement ' + apartmentId
                    },
                    customer: {
                        email: "{{ auth()->user()->email }}",
                        firstname: "{{ auth()->user()->name }}",
                        phone_number: {
                            number: "{{ auth()->user()->phone ?? '97000000' }}",
                            country: 'bj'
                        }
                    },
                    callback: async function(response) {
                        try {
                            // 3. Confirmer le paiement après succès FedaPay
                            const confirmResponse = await fetch(
                                "{{ route('paiement.confirmer') }}", {
                                    method: "POST",
                                    headers: {
                                        "Content-Type": "application/json",
                                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                        "Accept": "application/json",
                                    },
                                    body: JSON.stringify({
                                        paiement_id: initData.paiement_id,
                                        transaction_id: response.transaction.id
                                    })
                                });

                            const confirmData = await confirmResponse.json();

                            if (!confirmResponse.ok) {
                                throw new Error(confirmData.message ||
                                    'Erreur lors de la confirmation');
                            }

                            // Redirection vers la page de confirmation
                            window.location.href = "{{ url('paiement/confirmation') }}/" + initData
                                .paiement_id;

                        } catch (error) {
                            console.error('Erreur confirmation:', error);
                            errorDiv.innerHTML = `
                        <div class="alert alert-warning">
                            Paiement effectué mais erreur technique: ${error.message}<br>
                            Contactez le support avec cette référence: ${initData.paiement_id}
                        </div>
                    `;
                        }
                    }
                });

            } catch (error) {
                console.error('Erreur initialisation:', error);
                errorDiv.innerHTML = `
            <div class="alert alert-danger">
                Erreur: ${error.message}
            </div>
        `;
            }
        });
    </script>


    <!-- Modal des étapes -->
    <div class="modal fade" id="etapesModal" tabindex="-1" aria-labelledby="etapesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow-lg">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="etapesModalLabel">🔍 Comment trouver l'ID de l'appartement ?</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item">Connectez-vous à votre tableau de bord locataire.</li>
                        <li class="list-group-item">Accédez à la section "Appartements".</li>
                        <li class="list-group-item">Repérez l'appartement concerné.</li>
                        <li class="list-group-item">Notez ou copiez l'ID (en rouge) affiché en haut du nom de l'appartement.
                        </li>
                        <li class="list-group-item bg-light text-dark">
                            📝 <strong>Astuce :</strong> Vous pouvez saisir <strong>plusieurs ID</strong> séparés par des
                            virgules.<br>
                            <span class="text-muted small">Exemple : <code>1,2,6</code></span><br>
                            📌 Collez ces ID dans le champ de paiement.
                        </li>

                    </ol>


                    <div class="bg-light border-start border-4 border-primary rounded p-3 shadow-sm mb-3">
                        <h5 class="mb-0 text-danger fw-bold">
                            Exemple d'ID de l'appartement :
                            <span class="badge bg-danger text-white ms-2 px-3 py-2">
                                1
                            </span>
                        </h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
@endsection
