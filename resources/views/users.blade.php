@extends('layouts.usersConnecter')

@section('content')
    <style>
        @media (max-width: 575.98px) {
            .featured-post .post-overlay {
                padding: 1.1rem 1.8rem;
                /* moins de padding */
            }

            .featured-post .post-title {
                font-size: 1.2rem;
            }

            .featured-post ul.list-group {
                font-size: 0.95rem;
            }

            .featured-post .post-meta {
                margin-bottom: 1rem;
            }

            .featured-post .post-author {
                font-size: 0.9rem;
                margin-top: 1rem;
            }

            .featured-post img {
                width: 100%;
                height: auto;
                object-fit: cover;
                display: block;
            }
        }
    </style>
    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Blog</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('welcome') }}">Home</a></li>
                    <li class="current">Blog</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Blog Hero Section -->
    <section id="blog-hero" class="blog-hero section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-4">
                <!-- Main Content Area -->
                <div class="col-lg-8">
                    <!-- Featured Article -->
                    <article class="featured-post position-relative mb-4" data-aos="fade-up">
                        <img src="{{ asset('images/image_16.webp') }}" alt="Featured post" class="img-fluid">
                        <div class="post-overlay bg-light rounded shadow-sm p-4">
                            <div class="post-content">

                                <div class="post-meta mb-2">
                                    <br><br><br><br>
                                    <span class="badge bg-primary">Information</span>
                                    <span class="text-muted ms-2">Mis à jour le 25/07/2025</span>
                                </div>

                                <h2 class="post-title h4 text-dark mb-3">
                                    <i class="bi bi-info-circle me-2"></i>Comment fonctionne la demande de location ?
                                </h2>

                                <p class="post-excerpt">
                                    Voici comment se déroule le processus pour faire une demande de location sur notre
                                    plateforme :
                                </p>

                                <ul class="list-group list-group-flush mb-3">
                                    <li class="list-group-item">
                                        ✅ Vous lancez une demande de location en cliquant sur le bouton dédié. <a
                                            href="{{ route('paiement.lancer') }}" class="category bg-danger">

                                            <small>Cliquez pour payer </small>

                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        💳 Vous effectuez un paiement unique de <strong>1 500 FCFA</strong> pour valider
                                        une demande.
                                    </li>
                                    <li class="list-group-item">
                                        🕒 Après paiement, accédez à <strong>“Mes
                                            demandes”</strong> pour suivre l’évolution.
                                        <a href="{{ route('mes.paiements') }}" class="category bg-primary">

                                            <small>Cliquez pour suivre </small>

                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        📅 Une fois votre demande traitée, un <strong>rendez-vous</strong> vous sera proposé
                                        par email ou whatsApp
                                        pour finaliser la location.
                                    </li>
                                    <li class="list-group-item">
                                        📝 Lors du rendez-vous, nous vous expliquerons toutes les étapes à suivre pour
                                        emménager dans votre futur logement.
                                    </li>
                                </ul>

                                <div class="post-author mt-3 text-muted">
                                    <i class="bi bi-person-circle"></i> Service Client - Plateforme Étudiante
                                </div>
                            </div>
                        </div>

                    </article>

                    <!-- Secondary Articles -->
                    <div class="row g-4">
                        <div class="col-md-6">
                            <article class="secondary-post" data-aos="fade-up">
                                <div class="post-image">
                                    <img src="{{ asset('images/image_17.webp') }}" alt="Image informative"
                                        class="img-fluid">
                                </div>
                                <div class="post-content">
                                    <div class="post-meta">
                                        <span class="category">Informations</span>
                                        <span class="date">21/03/2024</span>
                                    </div>
                                    <h3 class="post-title">
                                        <a href="#">Mise en place d’un processus simple et efficace pour les
                                            étudiants</a>
                                    </h3>
                                    <div class="post-author">
                                        <i class="bi bi-person-circle me-1"></i> Équipe de la Plateforme Étudiante
                                    </div>
                                </div>
                            </article>

                        </div>
                        <div class="col-md-6">
                            <article class="secondary-post" data-aos="fade-up" data-aos-delay="100">
                                <div class="post-image">
                                    <img src="{{ asset('images/image_5.webp') }}" alt="Suivi des demandes"
                                        class="img-fluid">
                                </div>
                                <div class="post-content">
                                    <div class="post-meta">
                                        <span class="category">Demandes</span>
                                        <span class="date">30/01/2024</span>
                                    </div>
                                    <h3 class="post-title">
                                        <a href="#">
                                            Suivi de votre demande de logement en temps réel
                                        </a>
                                    </h3>
                                    <div class="post-author">
                                        <i class="bi bi-person-circle me-1"></i> Équipe Assistance Étudiants
                                    </div>
                                </div>
                            </article>

                        </div>
                    </div>
                </div><!-- End Main Content Area -->

                <!-- Sidebar with Tabs -->
                <div class="col-lg-4">
                    <div class="news-tabs" data-aos="fade-up" data-aos-delay="200">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#top-stories"
                                    type="button">❤️ Mes favoris</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#trending" type="button"> 🏠
                                    Options disponibles</button>
                            </li>

                        </ul>

                        <div class="tab-content">
                            <!-- Top Stories Tab -->
                            <div class="tab-pane fade show active" id="top-stories">

                                <!-- Section pour payer -->

                                <article class="tab-post">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-4">
                                            <img src="{{ asset('images/image_17.webp') }}" alt="Post" class="img-fluid">
                                        </div>
                                        <div class="col-8">
                                            <div class="post-content">
                                                <h4 class="post-title">
                                                    <a href="{{ route('paiement.lancer') }}">
                                                        Réservez votre chambre en effectuant le paiement maintenant
                                                    </a>
                                                </h4>
                                                <span class="category">Paiement</span>

                                                <a href="{{ route('paiement.lancer') }}"
                                                    class="category bg-danger mt-2 d-inline-block px-2 py-1 text-white rounded">
                                                    <small>Cliquez pour payer</small>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </article>


                                <!-- section pour voir mes demande -->

                                <article class="tab-post">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-4">
                                            <img src="{{ asset('images/image_18.webp') }}" alt="Post"
                                                class="img-fluid">
                                        </div>
                                        <div class="col-8">
                                            <div class="post-content">
                                                <h4 class="post-title">
                                                    <a href="{{ route('paiement.lancer') }}">
                                                        Suivre mes demandes lancées
                                                    </a>
                                                </h4>
                                                <span class="category">Demandes</span>

                                                <a href="{{ route('mes.paiements') }}"
                                                    class="category bg-primary mt-2 d-inline-block px-2 py-1 text-white rounded">
                                                    <small>Cliquez pour suivre</small>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </article>



                            </div>

                            <!-- Trending News Tab -->
                            <div class="tab-pane fade" id="trending">

                                <article class="tab-post">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-4">
                                            <img src="{{ asset('images/image_17.webp') }}" alt="Post"
                                                class="img-fluid">
                                        </div>
                                        <div class="col-8">
                                            <div class="post-content">
                                                <h4 class="post-title">
                                                    <a href="{{ route('paiement.lancer') }}">
                                                        Réservez votre chambre en effectuant le paiement maintenant
                                                    </a>
                                                </h4>
                                                <span class="category">Paiement</span>

                                                <a href="{{ route('paiement.lancer') }}"
                                                    class="category bg-danger mt-2 d-inline-block px-2 py-1 text-white rounded">
                                                    <small>Cliquez pour payer</small>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </article>

                                <article class="tab-post">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-4">
                                            <img src="{{ asset('images/image_18.webp') }}" alt="Post"
                                                class="img-fluid">
                                        </div>
                                        <div class="col-8">
                                            <div class="post-content">
                                                <h4 class="post-title">
                                                    <a href="{{ route('paiement.lancer') }}">
                                                        Suivre mes demandes lancées
                                                    </a>
                                                </h4>
                                                <span class="category">Demandes</span>

                                                <a href="{{ route('mes.paiements') }}"
                                                    class="category bg-primary mt-2 d-inline-block px-2 py-1 text-white rounded">
                                                    <small>Cliquez pour suivre</small>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>

                            <!-- Latest News Tab -->
                            <div class="tab-pane fade" id="latest">


                                <article class="tab-post">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-4">
                                            <img src="assets/img/blog/blog-post-square-6.webp" alt="Post"
                                                class="img-fluid">
                                        </div>
                                        <div class="col-8">
                                            <div class="post-content">
                                                <span class="category">Strategy</span>
                                                <h4 class="post-title"><a href="#">Implementing Agile Framework for
                                                        Project Management Excellence</a></h4>
                                                <div class="post-author">by <a href="#">Marcus Henderson</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Blog Hero Section -->

    <!-- Blog Posts Section -->
    <section id="blog-posts" class="blog-posts section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">

                <!-- Paiement sécurisé -->
                <div class="col-lg-4 text-center">
                    <article>
                        <div class="post-icon mb-3">
                            <i class="bi bi-shield-lock" style="font-size: 4rem; color: #0d6efd;"></i>
                        </div>

                        <p class="post-category">Paiement</p>

                        <h2 class="title">
                            <a href="{{ route('paiement.lancer') }}">Paiement sécurisé et fiable</a>
                        </h2>

                        <div class="d-flex justify-content-center align-items-center">
                            <div class="post-meta">
                                <p class="post-author">Votre sécurité</p>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Suivi en temps réel -->
                <div class="col-lg-4 text-center">
                    <article>
                        <div class="post-icon mb-3">
                            <i class="bi bi-clock-history" style="font-size: 4rem; color: #0d6efd;"></i>
                        </div>

                        <p class="post-category">Suivi</p>

                        <h2 class="title">
                            <a href="#">Suivi en temps réel de vos demandes</a>
                        </h2>

                        <div class="d-flex justify-content-center align-items-center">
                            <div class="post-meta">
                                <p class="post-author">Toujours informé</p>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Communication avec agents -->
                <div class="col-lg-4 text-center">
                    <article>
                        <div class="post-icon mb-3">
                            <i class="bi bi-people" style="font-size: 4rem; color: #0d6efd;"></i>
                        </div>

                        <p class="post-category">Communication</p>

                        <h2 class="title">
                            <a href="{{ route('agent') }}">Communication directe avec nos agents</a>
                        </h2>

                        <div class="d-flex justify-content-center align-items-center">
                            <div class="post-meta">
                                <p class="post-author">À votre écoute</p>
                            </div>
                        </div>
                    </article>
                </div>

            </div>
        </div>


    </section><!-- /Blog Posts Section -->

    <!-- Pagination 2 Section -->
    <section id="pagination-2" class="pagination-2 section">

        <div class="container">
            <nav class="d-flex justify-content-center" aria-label="Page navigation">
                <ul>
                    <li>
                        <a href="#" aria-label="Previous page">
                            <i class="bi bi-arrow-left"></i>
                            <span class="d-none d-sm-inline">Previous</span>
                        </a>
                    </li>

                    <li><a href="#" class="active">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li class="ellipsis">...</li>
                    <li><a href="#">8</a></li>
                    <li><a href="#">9</a></li>
                    <li><a href="#">10</a></li>

                    <li>
                        <a href="#" aria-label="Next page">
                            <span class="d-none d-sm-inline">Next</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

    </section><!-- /Pagination 2 Section -->
@endsection
