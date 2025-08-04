@extends('layouts.welcome')
@section('content')
    <!-- Titre de la page -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">À propos</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/') }}">Accueil</a></li>
                    <li class="current">À propos</li>
                </ol>
            </nav>
        </div>
    </div><!-- Fin Titre de la page -->

    <!-- Section À propos -->
    <section id="about" class="about section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row justify-content-center">
                <div class="col-lg-10">

                    <div class="hero-content text-center" data-aos="zoom-in" data-aos-delay="200">
                        <h2>Excellence immobilière premium depuis 2023</h2>
                        <p class="hero-description">Depuis plus de 2 ans, nous mettons notre expertise au service des
                            étudiants et jeunes actifs pour leur offrir des logements de qualité, adaptés à leurs besoins et
                            à leur budget.</p>
                    </div>

                    <div class="dual-image-layout" data-aos="fade-up" data-aos-delay="300">
                        <div class="row g-4 align-items-center">
                            <div class="col-lg-6">
                                <div class="primary-image-wrap">
                                    <img src="{{ asset('images/image_13.webp') }}" alt="Propriété de luxe"
                                        class="img-fluid">
                                    <div class="floating-badge" data-aos="zoom-in" data-aos-delay="400">
                                        <div class="badge-content">
                                            <i class="bi bi-award"></i>
                                            <span>Agence</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="secondary-image-wrap">
                                    <img src="{{ asset('images/image_14.webp') }}" alt="Agent professionnel"
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="features-showcase" data-aos="fade-up" data-aos-delay="350">
                <div class="row gy-4">
                    <div class="col-lg-3 col-md-6">
                        <div class="feature-box" data-aos="flip-up" data-aos-delay="400">
                            <div class="feature-icon">
                                <i class="bi bi-house-door"></i>
                            </div>
                            <div class="feature-content">
                                <h4>Locations Résidentielles</h4>
                                <p>Nous proposons un large choix de logements adaptés à la vie étudiante et aux besoins des
                                    jeunes actifs.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="feature-box" data-aos="flip-up" data-aos-delay="450">
                            <div class="feature-icon">
                                <i class="bi bi-building"></i>
                            </div>
                            <div class="feature-content">
                                <h4>Biens Commerciaux</h4>
                                <p>Notre expertise s’étend également à la gestion et à la location de locaux commerciaux.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="feature-box" data-aos="flip-up" data-aos-delay="500">
                            <div class="feature-icon">
                                <i class="bi bi-graph-up-arrow"></i>
                            </div>
                            <div class="feature-content">
                                <h4>Conseils en Investissement</h4>
                                <p>Nous accompagnons nos clients dans leurs projets d’investissement immobilier pour
                                    maximiser leur rentabilité.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="feature-box" data-aos="flip-up" data-aos-delay="550">
                            <div class="feature-icon">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <div class="feature-content">
                                <h4>Assistance Juridique</h4>
                                <p>Un service complet incluant le soutien juridique pour toutes vos démarches locatives.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Fin Features Showcase -->

            <div class="metrics-section" data-aos="fade-up" data-aos-delay="400">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="metrics-wrapper">
                            <div class="row text-center">
                                <div class="col-lg-3 col-6">
                                    <div class="metric-item" data-aos="zoom-in" data-aos-delay="450">
                                        <div class="metric-icon">
                                            <i class="bi bi-trophy"></i>
                                        </div>
                                        <div class="metric-value">
                                            <span data-purecounter-start="0" data-purecounter-end="870"
                                                data-purecounter-duration="2" class="purecounter"></span>+
                                        </div>
                                        <div class="metric-label">Locations réussies</div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <div class="metric-item" data-aos="zoom-in" data-aos-delay="500">
                                        <div class="metric-icon">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="metric-value">
                                            <span data-purecounter-start="0" data-purecounter-end="434"
                                                data-purecounter-duration="2" class="purecounter"></span>+
                                        </div>
                                        <div class="metric-label">Clients satisfaits</div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <div class="metric-item" data-aos="zoom-in" data-aos-delay="550">
                                        <div class="metric-icon">
                                            <i class="bi bi-calendar-check"></i>
                                        </div>
                                        <div class="metric-value">
                                            <span data-purecounter-start="0" data-purecounter-end="2"
                                                data-purecounter-duration="2" class="purecounter"></span>
                                        </div>
                                        <div class="metric-label">Années d’expérience</div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <div class="metric-item" data-aos="zoom-in" data-aos-delay="600">
                                        <div class="metric-icon">
                                            <i class="bi bi-star-fill"></i>
                                        </div>
                                        <div class="metric-value">4.9</div>
                                        <div class="metric-label">Note moyenne</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Fin Metrics Section -->



            <div class="cta-section" data-aos="fade-up" data-aos-delay="500">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-8">
                        <h3>Prêt à trouver votre logement idéal ?</h3>
                        <p>Contactez-nous dès aujourd’hui pour découvrir nos offres exclusives adaptées à vos besoins.</p>
                        <div class="action-buttons">
                            <a href="{{ route('maison') }}" class="btn btn-primary">Commencer maintenant</a>
                            <a href="{{ route('maison') }}" class="btn btn-secondary">Voir les logements</a>
                        </div>
                    </div>
                </div>
            </div><!-- Fin CTA Section -->

        </div>

    </section><!-- /Section À propos -->
@endsection
