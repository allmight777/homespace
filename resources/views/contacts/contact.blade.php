@extends('layouts.welcome')

@section('content')

<style>
    #contact{
        background-color: rgb(244, 252, 245);
    }
</style>
    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Contact</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('welcome') }}">Home</a></li>
                    <li class="current">Contact</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Contact 2 Section -->
    <section id="contact-2" class="contact-2 section">



        <!-- Map Section -->
        <div class="map-container mb-5">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7930.54717936124!2d2.405705443888432!3d6.358623337390097!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x102354f98d8b935b%3A0x948d9dbbcb9eb5dc!2sCadjehoun%2C%20Cotonou!5e0!3m2!1sfr!2sbj!4v1753376516865!5m2!1sfr!2sbj"
                width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <!-- Contact Info -->
            <div class="row g-4 mb-5" data-aos="fade-up" data-aos-delay="300">
                <div class="col-md-6">
                    <div class="contact-info-card d-flex align-items-center p-3 shadow-sm rounded " id="contact">
                        <div class="icon-box bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="width: 50px; height: 50px;">
                            <i class="bi bi-telephone fs-4"></i>
                        </div>
                        <div class="info-content">
                            <h5 class="mb-2">Appeler maintenant 1</h5>
                            <a href="tel:+2290194849958" class="btn btn-outline-success btn-sm text-dark">
                                📞 +229 01 94 84 99 58
                            </a>
                        </div>
                    </div>
                </div>

                   <div class="col-md-6">
                    <div class="contact-info-card d-flex align-items-center p-3 shadow-sm rounded " id="contact">
                        <div class="icon-box bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="width: 50px; height: 50px;">
                            <i class="bi bi-telephone fs-4"></i>
                        </div>
                        <div class="info-content">
                            <h5 class="mb-2">Appeler maintenant 2</h5>
                            <a href="tel:+2290147877811" class="btn btn-outline-success btn-sm text-dark">
                                📞 +229 01 47 87 78 11
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="contact-info-card d-flex align-items-center p-3 shadow-sm rounded " id="contact">
                        <div class="icon-box bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="width: 50px; height: 50px;">
                            <i class="bi bi-envelope fs-4"></i>
                        </div>
                        <div class="info-content">
                            <h5 class="mb-2">Envoyer un mail 1</h5>
                            <a href="mailto:agoliganange15@gmail.com" class="btn btn-outline-success btn-sm text-dark">
                                ✉️ agoliganange15@gmail.com
                            </a>
                        </div>
                    </div>
                </div>

                  <div class="col-md-6">
                    <div class="contact-info-card d-flex align-items-center p-3 shadow-sm rounded " id="contact">
                        <div class="icon-box bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="width: 50px; height: 50px;">
                            <i class="bi bi-envelope fs-4"></i>
                        </div>
                        <div class="info-content">
                            <h5 class="mb-2">Envoyer un mail 2</h5>
                            <a href="mailto:noelfassinou53@gmail.com" class="btn btn-outline-success btn-sm text-dark">
                                ✉️ noelfassinou53@gmail.com
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Contact Form -->
            <div class="row justify-content-center mb-5" data-aos="fade-up" data-aos-delay="200">
                <div class="col-lg-10">
                    <div class="contact-form-wrapper">
                        <h2 class="text-center mb-4">Send a Message</h2>

                        <form action="forms/contact.php" method="post" class="php-email-form">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" placeholder="Your Name"
                                            required="">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email"
                                            placeholder="Email Address" required="">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="subject" placeholder="Subject"
                                            required="">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" placeholder="Your Message" rows="6" required=""></textarea>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>
                                </div>

                                <div class="col-12 text-center">
                                    <button type="submit" class="btn-submit" disabled>SEND MESSAGE</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Contact 2 Section -->
@endsection
