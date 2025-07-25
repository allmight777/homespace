@extends('layouts.welcome')

@section('content')
    <style>
        #main {
            background-color: #e7f7e9;
        }

        .search-bar input {
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 1.1rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        .search-bar input:focus {
            box-shadow: 0 4px 12px rgba(0, 123, 255, 0.5);
            outline: none;
        }

        #noResults {
            display: none;
            text-align: center;
            font-weight: 600;
            color: #dc3545;
            margin-top: 2rem;
        }
    </style>

    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Logements disponibles</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/') }}">Accueil</a></li>
                    <li class="current">Logements</li>
                </ol>
            </nav>
        </div>
    </div>

    <section id="properties" class="properties section" id="main">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="search-bar mb-5" data-aos="fade-up" data-aos-delay="150">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="search-wrapper">
                            <div class="row g-3">
                                <div class="col-lg-3 col-md-6">
                                    <div class="mb-3">
                                        <label for="location" class="form-label">Recherche</label>
                                        <input type="text" id="location" name="location" class="form-control"
                                            placeholder="Recherche via le champ👇" disabled>
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-6">
                                    <div class="search-field">
                                        <label>Type</label>
                                        <select class="form-select">
                                            <option>Any Type</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6">
                                    <div class="search-field">
                                        <label>Price</label>
                                        <select class="form-select">
                                            <option>Any Price</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="search-field">
                                        <label>Bedrooms</label>
                                        <div class="bedroom-quick">
                                            <button class="bed-btn" data-beds="any">Any</button>
                                            <button class="bed-btn" data-beds="1">1+</button>
                                            <button class="bed-btn" data-beds="2">2+</button>
                                            <button class="bed-btn" data-beds="3">3+</button>
                                            <button class="bed-btn" data-beds="4">4+</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-12">
                                    <div class="search-field">
                                        <label>&nbsp;</label>
                                        <button class="btn btn-primary w-100 search-btn">
                                            <i class="bi bi-house-door"></i> {{ $logements->total() }} Logements disponibles
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Barre de recherche -->
            <div class="search-bar mb-4">
                <input type="text" id="searchInput" class="form-control"
                    placeholder="Rechercher logements sur des critères...">
            </div>

            <div class="properties-container">
                <div class="properties-masonry view-masonry active" data-aos="fade-up" data-aos-delay="250">
                    <div class="row g-4" id="logementsContainer">
                        @foreach ($logements as $logement)
                            <div class="col-lg-4 col-md-6 property-item">
                                <div class="property-item-inner">
                                    <a href="#" class="property-link">
                                        <div class="property-image-wrapper">
                                            @php
                                                $photos = $logement->photos;
                                                if (is_string($photos)) {
                                                    $photos = json_decode($photos, true);
                                                }
                                                $photoPath =
                                                    !empty($photos) && is_array($photos)
                                                        ? ltrim($photos[0], '/')
                                                        : null;
                                                $photoUrl = $photoPath
                                                    ? asset("storage/{$photoPath}")
                                                    : asset('assets/img/real-estate/default.jpg');
                                            @endphp
                                            <img src="{{ $photoUrl }}" class="img-fluid" alt="{{ $logement->nom }}">
                                            <div class="property-status">
                                                <span class="status-badge sale">{{ ucfirst($logement->statut) }}</span>

                                            </div>
                                        </div>
                                    </a>
                                    <div class="property-details">
                                        <div class="property-header">
                                            <div class="property-price">${{ number_format($logement->prix, 2) }}</div>
                                            <div class="property-type">{{ $logement->type }}</div>
                                        </div>
                                        <h4 class="property-title">{{ $logement->nom }}</h4>
                                        <p class="property-address">
                                            <i class="bi bi-geo-alt"></i> {{ $logement->localisation }}
                                        </p>
                                        <div class="property-specs">
                                            <div class="spec-item">
                                                <i class="bi bi-house-door"></i>
                                                <span>{{ $logement->nombre_pieces ?? 'N/A' }} pièces</span>
                                            </div>
                                            <div class="spec-item">
                                                <i class="bi bi-arrows-angle-expand"></i>
                                                <span>{{ $logement->surface ?? '—' }} m²</span>
                                            </div>
                                            <div class="spec-item">
                                                <i class="bi bi-wifi"></i>
                                                <span>{{ $logement->wifi_inclus ? 'WiFi Inclus' : 'Pas de WiFi' }}</span>
                                            </div>
                                        </div>
                                        <div class="agent-contact mt-3">
                                            <a href="tel:{{ $logement->contact_tel }}" class="contact-btn">
                                                <i class="bi bi-telephone"></i> {{ $logement->contact_tel }}
                                            </a>
                                        </div>
                                        <br>
                                        <a href="{{ route('logements.show', $logement->id) }}"
                                            class="btn btn-success w-100 rounded py-2 text-white">
                                            Informations
                                        </a>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Message si pas de résultats -->
                    <p id="noResults">Aucun logement ne correspond à vos critères. Ajustez votre recherche.</p>
                </div>
            </div>

            <div class="mt-4">
                {{ $logements->links() }}
            </div>

        </div>
        <br><br><br><br>
    </section>

    <script>
        document.getElementById('searchInput').addEventListener('input', function() {
            const filter = this.value.toLowerCase().trim();
            const logements = document.querySelectorAll('.property-item');
            let visibleCount = 0;

            logements.forEach(logement => {
                const text = logement.textContent.toLowerCase();
                if (text.includes(filter)) {
                    logement.style.display = '';
                    visibleCount++;
                } else {
                    logement.style.display = 'none';
                }
            });

            document.getElementById('noResults').style.display = visibleCount === 0 ? 'block' : 'none';
        });
    </script>
@endsection
