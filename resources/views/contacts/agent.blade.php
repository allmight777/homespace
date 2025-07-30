@extends('layouts.welcome')

@section('content')
    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Agents</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('welcome') }}">Home</a></li>
                    <li class="current">Agents</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Agents Section -->
    <section id="agents" class="agents section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="agent-card">
                        <div class="agent-image">
                            <img src="{{ asset('images/image_12.webp') }}" alt="Agent" class="img-fluid">
                            <div class="badge-overlay">
                                <span class="top-seller-badge">Top Seller</span>
                            </div>
                        </div>
                        <div class="agent-info">
                            <h4>AGOLIGAN T. Ange</h4>
                            <span class="role">Senior Property Advisor</span>
                            <p class="location"><i class="bi bi-geo-alt"></i>Cadjehoun</p>
                            <div class="specialties">
                                <span class="specialty-tag">Luxury Homes</span>
                                <span class="specialty-tag">Condos</span>
                            </div>
                            <div class="contact-links">
                                <a href="tel:+2290194849958"><i class="bi bi-telephone"></i></a>
                                <a href="mailto:agoliganange15@gmail.com"><i class="bi bi-envelope"></i></a>
                                <a href="https://wa.me/94849958?text=Bonjour%2C%20je%20suis%20intéressé(e)%20par%20le%20logement."
                                    target="_blank"><i class="bi bi-whatsapp"></i></a>
                                <!-- <a href="#"><i class="bi bi-linkedin"></i></a> -->
                            </div>
                            <a href="#" class="view-listings-btn">View Listings</a>
                        </div>
                    </div>
                </div><!-- End Agent Card -->

                <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="agent-card">
                        <div class="agent-image">
                            <img src="{{ asset('images/image_20.webp') }}" alt="Agent" class="img-fluid">
                            <div class="badge-overlay">
                                <span class="top-seller-badge">Top Seller</span>
                            </div>
                        </div>
                        <div class="agent-info">
                            <h4>FASSINOU Noel</h4>
                            <span class="role">Senior Property Advisor</span>
                            <p class="location"><i class="bi bi-geo-alt"></i>Gbegamey</p>
                            <div class="specialties">
                                <span class="specialty-tag">Luxury Homes</span>
                                <span class="specialty-tag">Condos</span>
                            </div>
                            <div class="contact-links">
                                <a href="tel:+2290147877811"><i class="bi bi-telephone"></i></a>
                                <a href="mailto:noelfassinou53@gmail.com"><i class="bi bi-envelope"></i></a>
                                <a href="https://wa.me/53947056?text=Bonjour%2C%20je%20suis%20intéressé(e)%20par%20le%20logement."
                                    target="_blank"><i class="bi bi-whatsapp"></i></a>
                                <!-- <a href="#"><i class="bi bi-linkedin"></i></a> -->
                            </div>
                            <a href="#" class="view-listings-btn">View Listings</a>
                        </div>
                    </div>
                </div><!-- End Agent Card -->


                <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="agent-card">
                        <div class="agent-image">
                            <img src="{{ asset('images/image_12.webp') }}" alt="Agent" class="img-fluid">
                            <div class="badge-overlay">
                                <span class="top-seller-badge">Top Seller</span>
                            </div>
                        </div>
                        <div class="agent-info">
                            <h4>AGOLIGAN T. Ange</h4>
                            <span class="role">Senior Property Advisor</span>
                            <p class="location"><i class="bi bi-geo-alt"></i>Cadjehoun</p>
                            <div class="specialties">
                                <span class="specialty-tag">Luxury Homes</span>
                                <span class="specialty-tag">Condos</span>
                            </div>
                            <div class="contact-links">
                                <a href="tel:+2290194849958"><i class="bi bi-telephone"></i></a>
                                <a href="mailto:agoliganange15@gmail.com"><i class="bi bi-envelope"></i></a>
                                <a href="https://wa.me/94849958?text=Bonjour%2C%20je%20suis%20intéressé(e)%20par%20le%20logement."
                                    target="_blank"><i class="bi bi-whatsapp"></i></a>
                                <!-- <a href="#"><i class="bi bi-linkedin"></i></a> -->
                            </div>
                            <a href="#" class="view-listings-btn">View Listings</a>
                        </div>
                    </div>
                </div><!-- End Agent Card -->

                <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="agent-card">
                        <div class="agent-image">
                            <img src="{{ asset('images/image_20.webp') }}" alt="Agent" class="img-fluid">
                            <div class="badge-overlay">
                                <span class="top-seller-badge">Top Seller</span>
                            </div>
                        </div>
                        <div class="agent-info">
                            <h4>FASSINOU Noel</h4>
                            <span class="role">Senior Property Advisor</span>
                            <p class="location"><i class="bi bi-geo-alt"></i>Gbegamey</p>
                            <div class="specialties">
                                <span class="specialty-tag">Luxury Homes</span>
                                <span class="specialty-tag">Condos</span>
                            </div>
                            <div class="contact-links">
                                <a href="tel:+2290147877811"><i class="bi bi-telephone"></i></a>
                                <a href="mailto:noelfassinou53@gmail.com"><i class="bi bi-envelope"></i></a>
                                <a href="https://wa.me/53947056?text=Bonjour%2C%20je%20suis%20intéressé(e)%20par%20le%20logement."
                                    target="_blank"><i class="bi bi-whatsapp"></i></a>
                                <!-- <a href="#"><i class="bi bi-linkedin"></i></a> -->
                            </div>
                            <a href="#" class="view-listings-btn">View Listings</a>
                        </div>
                    </div>
                </div><!-- End Agent Card -->






            </div>

            <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="500">
                <a href="#" class="btn-view-all-agents">View All Agents</a>
            </div>

        </div>

    </section><!-- /Agents Section -->
@endsection
