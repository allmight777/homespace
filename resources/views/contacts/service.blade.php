@extends('layouts.welcome')

@section('content')
    <!-- Titre de la Page -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Nos Services</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('welcome') }}">Accueil</a></li>
                    <li class="current">Services</li>
                </ol>
            </nav>
        </div>
    </div><!-- Fin du Titre de la Page -->

    <!-- Section des Services -->
    <section id="services" class="services section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-5">

                <div class="col-xl-6" data-aos="fade-right" data-aos-delay="200">
                    <div class="service-block">
                        <div class="service-content">
                            <div class="service-number">01</div>
                            <div class="service-info">
                                <h4>Trouvez Votre Logement Étudiant</h4>
                                <p>Parcourez une sélection de logements adaptés aux étudiants : studios, chambres en
                                    colocation ou résidences universitaires.</p>
                                <ul class="service-features">
                                    <li><i class="bi bi-check-circle"></i> Recherche personnalisée</li>
                                    <li><i class="bi bi-check-circle"></i> Proximité des universités</li>
                                    <li><i class="bi bi-check-circle"></i> Assistance à la réservation</li>
                                </ul>
                                <a href="{{ route('maison') }}" class="service-btn">
                                    Rechercher un logement <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="service-image">
                            <img src="{{ asset('images/image_13.webp') }}" alt="Logement étudiant"
                                class="img-fluid">
                            <div class="image-overlay">
                                <i class="bi bi-house-heart"></i>
                            </div>
                        </div>
                    </div>
                </div><!-- Fin du Bloc Service -->

                <div class="col-xl-6" data-aos="fade-left" data-aos-delay="300">
                    <div class="service-block">
                        <div class="service-content">
                            <div class="service-number">02</div>
                            <div class="service-info">
                                <h4>Publiez Votre Bien à Louer</h4>
                                <p>Vous disposez d’un logement disponible pour les étudiants ? Mettez-le en ligne et trouvez
                                    un locataire rapidement.</p>
                                <ul class="service-features">
                                    <li><i class="bi bi-check-circle"></i> Contacter le service client</li>
                                    <li><i class="bi bi-check-circle"></i> Prendre rendez-vous pour discuter de votre
                                        proposition</li>
                                    <li><i class="bi bi-check-circle"></i> Suivi personnalisé de votre annonce</li>
                                </ul>

                                <a href="{{ route('contact') }}" class="service-btn">
                                    Mettre en location <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="service-image">
                            <img src="{{ asset('images/image_2.webp') }}" alt="Propriétaire" class="img-fluid">
                            <div class="image-overlay">
                                <i class="bi bi-currency-dollar"></i>
                            </div>
                        </div>
                    </div>
                </div><!-- Fin du Bloc Service -->

                <div class="col-xl-6" data-aos="fade-right" data-aos-delay="400">
                    <div class="service-block">
                        <div class="service-content">
                            <div class="service-number">03</div>
                            <div class="service-info">
                                <h4>Locations de Courte Durée</h4>
                                <p>Pour vos stages, séjours d’étude ou examens, trouvez un logement temporaire rapidement et
                                    sans tracas.</p>
                                <ul class="service-features">
                                    <li><i class="bi bi-check-circle"></i> Durées flexibles</li>
                                    <li><i class="bi bi-check-circle"></i> Options meublées</li>
                                    <li><i class="bi bi-check-circle"></i> Réservation rapide</li>
                                </ul>
                                <a href="{{ route('maison') }}" class="service-btn">
                                    Voir les offres <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="service-image">
                            <img src="{{ asset('images/image_14.webp') }}" alt="Locations courte durée"
                                class="img-fluid">
                            <div class="image-overlay">
                                <i class="bi bi-key"></i>
                            </div>
                        </div>
                    </div>
                </div><!-- Fin du Bloc Service -->

                <div class="col-xl-6" data-aos="fade-left" data-aos-delay="500">
                    <div class="service-block">
                        <div class="service-content">
                            <div class="service-number">04</div>
                            <div class="service-info">
                                <h4>Conseils & Accompagnement</h4>
                                <p>Notre équipe vous guide dans vos démarches pour trouver ou louer un logement en toute
                                    sérénité.</p>
                                <ul class="service-features">
                                    <li><i class="bi bi-check-circle"></i> Conseils juridiques</li>
                                    <li><i class="bi bi-check-circle"></i> Aide aux démarches administratives</li>
                                    <li><i class="bi bi-check-circle"></i> Suivi personnalisé</li>
                                </ul>
                                <a href="{{ route('contact') }}" class="service-btn">
                                    Demander un accompagnement <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="service-image">
                            <img src="{{ asset('images/image_15.webp') }}" alt="Conseils étudiants" class="img-fluid">
                            <div class="image-overlay">
                                <i class="bi bi-graph-up-arrow"></i>
                            </div>
                        </div>
                    </div>
                </div><!-- Fin du Bloc Service -->

            </div>

            <div class="row">
                <div class="col-lg-12" data-aos="fade-up" data-aos-delay="600">
                    <div class="cta-section">
                        <div class="cta-content">
                            <h3>Prêt à Trouver Votre Logement ?</h3>
                            <p>Rejoignez notre plateforme dès maintenant et simplifiez votre recherche de logement pour
                                l’année universitaire.</p>
                            <div class="cta-buttons">
                                <a href="{{ route('contact') }}" class="btn-primary">Contactez-nous</a>
                                <a href="tel:+2290153947056" class="btn-secondary">
                                    <i class="bi bi-telephone"></i> Appeler maintenant
                                </a>
                            </div>
                        </div>
                        <div class="cta-stats">
                            <div class="stat-item">
                                <div class="stat-number">500+</div>
                                <div class="stat-label">Étudiants logés</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">15+</div>
                                <div class="stat-label">Universités partenaires</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">98%</div>
                                <div class="stat-label">Satisfaction</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Section des Services -->
@endsection
