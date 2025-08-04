@extends('layouts.usersConnecter')

@section('content')
    <style>
        #ca-titre {
            background-color: #198754;
            /* Vert Bootstrap ou remplace par ton vert */
            color: white;
            padding: 30px 0;
            width: 100%;
            margin-bottom: 30px;
            padding-bottom: 30px;
            border-radius: 25px;

        }

        #ca-titre h2,
        #ca-titre p {
            color: white;
            margin: 0;
        }
    </style>
    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">{{ $logement->nom }}</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('welcome') }}">Accueil</a></li>
                    <li><a href="{{ route('maison') }}">Logements</a></li>
                    <li class="current">{{ $logement->nom }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- message de succes apres connection -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
        </div>
    @endif

    <!-- Property Details Section -->
    <section id="property-details" class="property-details section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row">

                <!-- Photos Slider -->
                <div class="col-lg-7">
                    <div class="property-hero mb-5" data-aos="fade-up" data-aos-delay="200">
                        <div class="property-gallery-slider swiper init-swiper">
                            <script type="application/json" class="swiper-config">
              {
                "loop": true,
                "speed": 600,
                "autoplay": {"delay": 5000},
                "navigation": {"nextEl": ".swiper-button-next","prevEl": ".swiper-button-prev"},
                "thumbs": {"swiper": ".property-thumbnails-slider"}
              }
            </script>
                            <div class="swiper-wrapper">
                                @php
                                    $photos = is_string($logement->photos)
                                        ? json_decode($logement->photos, true)
                                        : $logement->photos;
                                    $photos = is_array($photos) ? $photos : [];
                                @endphp

                                @forelse ($photos as $photo)
                                    <div class="swiper-slide">
                                        <img src="{{ asset('storage/' . ltrim($photo, '/')) }}" class="img-fluid hero-image"
                                            alt="Photo de {{ $logement->nom }}">
                                    </div>
                                @empty
                                    <div class="swiper-slide">
                                        <img src="{{ asset('assets/img/real-estate/default.jpg') }}"
                                            class="img-fluid hero-image" alt="Image par défaut">
                                    </div>
                                @endforelse
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>

                        <div class="thumbnail-gallery mt-3">
                            <div class="property-thumbnails-slider swiper init-swiper">
                                <script type="application/json" class="swiper-config">
                {"loop":true,"spaceBetween":10,"slidesPerView":4,"freeMode":true,"watchSlidesProgress":true}
              </script>
                                <div class="swiper-wrapper">
                                    @forelse ($photos as $photo)
                                        <div class="swiper-slide">
                                            <img src="{{ asset('storage/' . ltrim($photo, '/')) }}"
                                                class="img-fluid thumbnail-img" alt="Miniature">
                                        </div>
                                    @empty
                                        <div class="swiper-slide">
                                            <img src="{{ asset('assets/img/real-estate/default.jpg') }}"
                                                class="img-fluid thumbnail-img" alt="Miniature par défaut">
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Main Property Info -->
                    <div class="property-info mb-5" data-aos="fade-up" data-aos-delay="300">
                        <div class="property-header">

                            <h2 class="property-title">{{ $logement->nom }}</h2>
                            <div class="property-meta">
                                <span class="address"><i class="bi bi-geo-alt"></i> {{ $logement->localisation }}</span>
                                <span class="listing-id">Disponible ou non : {{ $logement->statut }}</span>
                            </div>
                        </div>

                        <div class="pricing-section my-3">
                            <div class="main-price">{{ number_format($logement->prix, 2) }} FCFA <span class="period">/
                                    mois</span></div>
                            <div class="price-breakdown">
                                <span class="deposit">Caution: {{ number_format($logement->caution, 2) }} FCFA</span>
                                <span class="available">Disponible dès :
                                    {{ $logement->disponibilite ? \Carbon\Carbon::parse($logement->disponibilite)->format('d/m/Y') : 'Non précisé' }}</span>
                            </div>
                        </div>

                        <div class="quick-stats row text-center mb-4">
                            <div class="col-6 col-md-4 stat-card">
                                <i class="bi bi-house"></i>
                                <div>{{ $logement->nombre_pieces ?? '—' }} pièces</div>
                            </div>
                            <div class="col-6 col-md-4 stat-card">
                                <i class="bi bi-droplet"></i>
                                <div>{{ $logement->nbr_avance }} mois avance</div>
                            </div>
                            <div class="col-6 col-md-4 stat-card">
                                <i class="bi bi-arrows-angle-expand"></i>
                                <div>{{ $logement->surface ?? '—' }} m²</div>
                            </div>
                            <div class="col-6 col-md-4 stat-card">
                                <i class="bi bi-wifi"></i>
                                <div>{{ $logement->wifi_inclus ? 'Avec WiFi' : 'Pas de WiFi' }}</div>
                            </div>
                            <div class="col-6 col-md-4 stat-card">
                                <i class="bi bi-lightning-charge"></i>
                                <div>{{ $logement->electricite ? 'Avec électricité' : 'Sans électricité' }}</div>
                            </div>
                            <div class="col-6 col-md-4 stat-card">
                                <i class="bi bi-lightning-charge"></i>
                                <div>Type compteur : {{ $logement->type_compteur_electricite }}</div>
                            </div>
                            <div class="col-6 col-md-4 stat-card">
                                <i class="bi bi-droplet-half"></i>
                                <div>{{ $logement->eau ? 'Avec eau' : 'Sans eau' }}</div>
                            </div>
                            <div class="col-6 col-md-4 stat-card">
                                <i class="bi bi-lightning-charge"></i>
                                <div>Type compteur : {{ $logement->type_compteur_eau }}</div>
                            </div>
                        </div>



                        <div class="quick-stats">
                            <div class="stat-grid">
                                <div class="stat-card">
                                    <div class="stat-icon">
                                        <i class="bi bi-shield-lock"></i>
                                    </div>
                                    <div class="stat-content">
                                        <span class="stat-number">Sécurisé</span>
                                        <span class="stat-label">Résidence</span>
                                    </div>
                                </div>

                                <div class="stat-card">
                                    <div class="stat-icon">
                                        <i class="bi bi-tree-fill"></i>
                                    </div>
                                    <div class="stat-content">
                                        <span class="stat-number">Calme</span>
                                        <span class="stat-label">Quartier</span>
                                    </div>
                                </div>

                                <div class="stat-card">
                                    <div class="stat-icon">
                                        <i class="bi bi-geo-alt"></i>
                                    </div>
                                    <div class="stat-content">
                                        <span class="stat-number">Localisation</span>
                                        <span class="stat-label">{{ $logement->localisation }}</span>
                                    </div>
                                </div>


                            </div>

                        </div>
                        <br><br>


                        <!-- Description stylisée -->
                        <div class="card mb-4 border border-primary-subtle rounded-3 bg-light">
                            <div class="card-body">
                                <h4 class="card-title mb-3 text-dark">Description</h4>
                                <p class="card-text">{{ $logement->description ?? 'Pas de description disponible.' }}</p>
                            </div>
                        </div>


                        <!-- Bouton téléphone -->
<button type="button" class="btn btn-success btn-lg w-100 mb-4" data-bs-toggle="modal"
    data-bs-target="#reservationModal" style="padding: 1.25rem 0; font-size: 1.25rem;">
    <i class="bi bi-calendar-check"></i>
    Lancer une demande de réservation
</button>


                    </div>
                    <div class="action-buttons">
                    </div>

                </div>

                <!-- Sidebar with Calculator -->
                <div class="col-lg-5">
                    <div class="sticky-sidebar">
                        <div class="calculator-card mb-4" data-aos="fade-up" data-aos-delay="250">
                            <h4>Calcul du coût mensuel</h4>
                            <div class="calculator-content">
                                <div class="cost-item">
                                    <span>Avance ({{ $logement->nbr_avance }} ×
                                        {{ number_format($logement->prix, 2) }})</span>
                                    <span>{{ number_format($logement->nbr_avance * $logement->prix, 2) }} FCFA</span>
                                </div>
                                <div class="cost-item">
                                    <span>Caution</span><span>{{ number_format($logement->caution, 2) }}
                                        FCFA</span>
                                </div>
                                <div class="cost-item">
                                    <span>Charges</span><span>{{ number_format($logement->charges, 2) }}
                                        FCFA</span>
                                </div>
                                <hr>
                                <div class="total-cost">
                                    <span>Total à l'entrée</span>
                                    <span><strong>{{ number_format($logement->nbr_avance * $logement->prix + $logement->caution + $logement->charges, 2) }}
                                            FCFA</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="sticky-sidebar">

                        <!-- Quick Actions -->
                        <div class="actions-card mb-4" data-aos="fade-up" data-aos-delay="250">
                            <div class="action-buttons">
                                <button type="button" class="btn btn-primary btn-lg w-100 mb-3" data-bs-toggle="modal"
                                    data-bs-target="#reservationModal">
                                    <i class="bi bi-calendar-check"></i>
                                    Lancer une demande de réservation
                                </button>

                                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap w-100">
                                    <a href="{{ route('mes.paiements') }}"
                                        class="btn btn-warning text-white w-100 d-flex justify-content-center align-items-center gap-2 mt-2 mt-md-0">
                                        <i class="bi bi-file-text-fill"></i>
                                        Suivre mes demandes
                                    </a>
                                </div>



                                <div class="row g-2">
                                    <div class="col-6">
                                        <button onclick="window.print()" class="btn btn-outline-secondary w-100">
                                            <i class="bi bi-printer"></i>
                                            Imprimer
                                        </button>

                                    </div>

                                    <div class="col-6">
                                        <button onclick="shareProperty()" class="btn btn-outline-success w-100">
                                            <i class="bi bi-share-fill"></i>
                                            Partager
                                        </button>
                                    </div>

                                    <script>
                                        function shareProperty() {
                                            const shareData = {
                                                title: document.title,
                                                text: 'Découvrez ce logement disponible !',
                                                url: window.location.href
                                            };

                                            if (navigator.share) {
                                                navigator.share(shareData).catch(console.error);
                                            } else {
                                                // Si l'API Web Share n'est pas dispo
                                                navigator.clipboard.writeText(window.location.href)
                                                    .then(() => alert('Lien copié dans le presse-papiers !'))
                                                    .catch(() => alert('Impossible de copier le lien.'));
                                            }
                                        }
                                    </script>

                                </div>
                            </div>
                        </div><!-- End Quick Actions -->

                        <!-- Agent Card 1-->
                        <div class="agent-card mb-4" data-aos="fade-up" data-aos-delay="350">
                            <div class="agent-header">
                                <div class="agent-avatar">
                                    <img src="{{ asset('images/image_12.webp') }}" class="img-fluid" alt="Agent Photo">
                                    <div class="online-status"></div>
                                </div>
                                <div class="agent-info">
                                    <h4>AGOLIGAN Ange</h4>
                                    <p class="agent-role">Agent immobilier</p>

                                    <div class="agent-rating">
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                        </div>
                                        <span class="rating-text">5.0 (127 reviews)</span>
                                    </div>
                                </div>
                            </div>

                            <div class="agent-contact">
                                <div class="contact-item">
                                    <i class="bi bi-telephone"></i>
                                    <span><a href="tel:+2290194849958">+229 01 94849958</a></span>
                                </div>
                                <div class="contact-item">
                                    <i class="bi bi-envelope"></i>
                                    <span><a href="mailto:agoliganange15@gmail.com">agoliganange15@gmail.com</a></span>
                                </div>
                            </div>

                            <div class="agent-actions mt-3">
                                <!-- Appel téléphonique -->
                                <a href="tel:+2290194849958" class="btn btn-success w-100 mb-2">
                                    <i class="bi bi-telephone"></i>
                                    Appeler maintenant
                                </a>

                                <!-- Message WhatsApp -->
                                <a href="https://wa.me/94849958?text=Bonjour%2C%20je%20suis%20intéressé(e)%20par%20le%20logement."
                                    target="_blank" class="btn btn-outline-success w-100">
                                    <i class="bi bi-whatsapp"></i>
                                    Envoyer un message WhatsApp
                                </a>
                            </div>

                        </div><!-- End Agent Card -->

                        <!-- Agent Card 2 -->
                        <div class="agent-card mb-4" data-aos="fade-up" data-aos-delay="350">
                            <div class="agent-header">
                                <div class="agent-avatar">
                                    <img src="{{ asset('images/image_19.webp') }}" class="img-fluid" alt="Agent Photo">
                                    <div class="online-status"></div>
                                </div>
                                <div class="agent-info">
                                    <h4>FASSINOU Noel</h4>
                                    <p class="agent-role">Agent immobilier</p>

                                    <div class="agent-rating">
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                        </div>
                                        <span class="rating-text">5.0 (120 reviews)</span>
                                    </div>
                                </div>
                            </div>

                            <div class="agent-contact">
                                <div class="contact-item">
                                    <i class="bi bi-telephone"></i>
                                    <span><a href="tel:+2290153947056">+229 01 53947056</a></span>
                                </div>
                                <div class="contact-item">
                                    <i class="bi bi-envelope"></i>
                                    <span><a href="mailto:noelfassinou53@gmail.com">noelfassinou53@gmail.com</a></span>
                                </div>
                            </div>

                            <div class="agent-actions mt-3">
                                <!-- Appel téléphonique -->
                                <a href="tel:+2290153947056" class="btn btn-success w-100 mb-2">
                                    <i class="bi bi-telephone"></i>
                                    Appeler maintenant
                                </a>

                                <!-- Message WhatsApp -->
                                <a href="https://wa.me/53947056?text=Bonjour%2C%20je%20suis%20intéressé(e)%20par%20le%20logement."
                                    target="_blank" class="btn btn-outline-success w-100">
                                    <i class="bi bi-whatsapp"></i>
                                    Envoyer un message WhatsApp
                                </a>
                            </div>

                        </div><!-- End Agent Card -->
                    </div>



                </div>
            </div>


            <!-- Location Section -->
            <div class="location-section mt-5" data-aos="fade-up" data-aos-delay="700">

                <!-- Titre de la section -->
                <div id="ca-titre" class="container-fluid section-title" data-aos="fade-up">
                    <h2>Location &amp; Neighborhood</h2>
                    <p>Nos agents expérimentés vous accompagnent pour trouver un logement confortable, calme et sécurisé,
                        idéalement situé à proximité de votre campus.</p>

                </div><!-- Fin du titre -->
                <br><br>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="map-wrapper">
                            @php
                                $adresseEncodee = urlencode($logement->localisation);
                            @endphp
                            <iframe width="100%" height="350" frameborder="0" style="border:0" loading="lazy"
                                allowfullscreen
                                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAuv_YKAhN8IteFmm6X8FOQm9ZvV3qU5cw&q={{ urlencode($logement->localisation) }}">
                            </iframe>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="neighborhood-info d-flex flex-column gap-5">

                            <div class="poi-item d-flex align-items-center">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i
                                    class="bi bi-shield-lock-fill fs-4 me-2 text-success"></i>
                                <span>Sécurité assurée</span>
                            </div>

                            <div class="poi-item d-flex align-items-center">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i
                                    class="bi bi-moon-stars-fill fs-4 me-2 text-primary"></i>
                                <span>Quartier calme</span>
                            </div>

                            <div class="poi-item d-flex align-items-center">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i
                                    class="bi bi-emoji-smile-fill fs-4 me-2 text-warning"></i>
                                <span>À votre goût</span>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div><!-- End Location Section -->

        <!-- Modal de Réservation -->
        <!-- Modal -->
        <div class="modal fade" id="reservationModal" tabindex="-1" aria-labelledby="reservationModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Détails de la réservation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>
                    <div class="modal-body">
                        <ul class="list-group mb-3">
                            <li class="list-group-item"><strong>Appartement :</strong> {{ $logement->nom }}</li>
                            <li class="list-group-item"><strong>Localisation :</strong> {{ $logement->localisation }}</li>
                            <li class="list-group-item"><strong>Prix :</strong> {{ number_format($logement->prix) }} FCFA
                            </li>
                            <li class="list-group-item"><strong>Nombre de pièces :</strong> {{ $logement->nombre_pieces }}
                            </li>
                            <input type="hidden" id="apartment_id" value="{{ $logement->id }}">

                        </ul>

                        <div class="alert alert-info">
                            En cliquant sur "Payer", vous allez régler les frais de visite, nécessaires avant toute visite
                            de l'appartement. Ce paiement garantit votre rendez-vous, et ces frais ne sont pas
                            remboursables.
                        </div>

                    </div>
                    <center>
                        <a href="#" id="pay-now-btn" class="btn btn-success btn-lg w-50 mt-3">
                            <i class="bi bi-credit-card"></i> Payer maintenant
                        </a>
                    </center>
                    <br>

                </div>
            </div>
        </div>
        <script src="https://cdn.fedapay.com/checkout.js?v=1.1.7"></script>
        <script>
            document.getElementById('pay-now-btn').addEventListener('click', async function(e) {
                e.preventDefault();

                const apartmentId = document.getElementById('apartment_id').value;

                try {
                    // 1. Envoie une requête pour initier le paiement
                    const response = await fetch("{{ route('paiement.initier') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Accept": "application/json",
                        },
                        body: JSON.stringify({
                            apartment_id: apartmentId,
                            description: ''
                        })
                    });

                    const data = await response.json();

                    if (!response.ok) {
                        alert(data.message || "Erreur lors de l'initialisation");
                        return;
                    }

                    // 2. Lance FedaPay
                    FedaPay.init('#pay-now-btn', {
                        public_key: "{{ config('services.fedapay.public_key') }}",
                        transaction: {
                            amount: 1500,
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
                            // 3. Confirme le paiement
                            await fetch("{{ route('paiement.confirmer') }}", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                    "Accept": "application/json",
                                },
                                body: JSON.stringify({
                                    paiement_id: data.paiement_id,
                                    transaction_id: response.transaction.id
                                })
                            });

                            // 4. Redirige vers la page de confirmation
                            window.location.href = "/paiement/confirmation/" + data.paiement_id;
                        }
                    });

                } catch (error) {
                    alert("Erreur technique : " + error.message);
                }
            });
        </script>


    </section>
@endsection
