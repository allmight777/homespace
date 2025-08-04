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
                    <li><a href="{{ route('welcome') }}">Accueil</a></li>
                    <li class="current">Logements</li>
                </ol>
            </nav>
        </div>
    </div>

    <section id="properties" class="properties section" id="main">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="search-bar mb-5" data-aos="fade-up" data-aos-delay="150">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <form class="row g-3 align-items-center">

                                <!-- Champ de recherche -->
                                <div class="col-md-10 col-12">
                                    <input type="text" id="searchInput" class="form-control form-control-lg shadow-sm"
                                        placeholder="🔍 Rechercher un logement par ville, prix, type...">
                                </div>

                                <!-- Bouton vert -->

                                <div class="col-md-2 col-12">
                                    <button type="submit"
                                        class="btn btn-success btn-lg w-100 d-flex align-items-center justify-content-center gap-2">
                                        <span>{{ $logements->total() }}</span>
                                        <i class="bi bi-house-door-fill"></i>
                                        <span>Logements</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



            <div class="properties-container">
                <div class="properties-masonry view-masonry active" data-aos="fade-up" data-aos-delay="250">
                    <div class="row g-4" id="logementsContainer">
                        @foreach ($logements as $logement)
                            <div class="col-lg-4 col-md-6 property-item">
                                <a href="{{ route('logements.show', $logement->id) }}"
                                    class="text-decoration-none text-dark">
                                    <div class="property-item-inner">
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

                                        <div class="property-details">
                                            <div class="property-header">
                                                <div class="property-price">{{ number_format($logement->prix, 2) }} FCFA
                                                </div>
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
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>

                    <!-- Message si pas de résultats -->
                    <p id="noResults">Aucun logement ne correspond à vos critères. Ajustez votre recherche.
                        <br><br><br><br><br><br><br>
                    </p>
                </div>
            </div>

            <div class="mt-4">
                {{ $logements->links() }}
            </div>

        </div>

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
