@extends('layouts.welcome')
@section('content')
    <!-- Titre de la page -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Politique de Confidentialité</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/') }}">Accueil</a></li>
                    <li class="current">Politique de Confidentialité</li>
                </ol>
            </nav>
        </div>
    </div><!-- Fin Titre de la page -->

    <!-- Section Confidentialité -->
    <section id="privacy" class="privacy section">

        <div class="container" data-aos="fade-up">
            <!-- En-tête -->
            <div class="privacy-header" data-aos="fade-up">
                <div class="header-content">
                    <div class="last-updated">Date d'entrée en vigueur : 27 février 2023</div>
                    <h1>Politique de Confidentialité</h1>
                    <p class="intro-text">
                        Cette politique de confidentialité explique comment nous collectons, utilisons, traitons et partageons vos informations, y compris vos données personnelles, dans le cadre de votre utilisation de nos services de location étudiante.
                    </p>
                </div>
            </div>

            <!-- Contenu principal -->
            <div class="privacy-content" data-aos="fade-up">
                <!-- Introduction -->
                <div class="content-section">
                    <h2>1. Introduction</h2>

                    <p>Cette politique a pour but de vous expliquer quelles informations nous collectons, pourquoi nous les collectons et comment vous pouvez gérer vos données.</p>
                </div>

                <!-- Collecte d'informations -->
                <div class="content-section">
                    <h2>2. Informations que nous collectons</h2>
                    <p>Nous collectons des informations afin de mieux répondre à vos besoins en matière de location étudiante. Les types d’informations collectées incluent :</p>

                    <h3>2.1 Informations que vous nous fournissez</h3>
                    <p>Lorsque vous créez un compte ou effectuez une réservation, vous nous transmettez des données telles que :</p>
                    <ul>
                        <li>Votre nom et coordonnées</li>
                        <li>Informations d'identification de votre compte</li>
                        <li>Détails de paiement nécessaires pour la réservation</li>
                        <li>Préférences de communication</li>
                    </ul>


                </div>

                <!-- Utilisation des informations -->
                <div class="content-section">
                    <h2>3. Utilisation de vos informations</h2>
                    <p>Nous utilisons vos données pour fournir, améliorer et personnaliser nos services de location étudiante, notamment pour :</p>
                    <ul>
                        <li>Gérer vos réservations et profils</li>
                        <li>Traiter les paiements et envoyer les confirmations</li>
                        <li>Vous informer des nouveautés et mises à jour</li>
                        <li>Assurer la sécurité et vérifier l'identité</li>
                        <li>Analyser et améliorer notre plateforme</li>
                    </ul>
                </div>

                <!-- Partage des informations -->
                <div class="content-section">
                    <h2>4. Partage et divulgation des données</h2>
                    <p>Nous ne partageons pas vos informations personnelles avec des tiers sauf dans les cas suivants :</p>

                    <h3>4.1 Avec votre consentement</h3>
                    <p>Nous pouvons partager vos données avec des partenaires ou prestataires lorsque vous y avez consenti.</p>

                    <h3>4.2 Pour raisons légales</h3>
                    <p>Nous pouvons divulguer vos données si la loi l’exige ou pour protéger nos droits, notamment :</p>
                    <ul>
                        <li>Respecter les obligations légales et réglementaires</li>
                        <li>Faire respecter nos conditions d’utilisation</li>
                        <li>Prévenir ou détecter la fraude ou problèmes techniques</li>
                        <li>Protéger les droits, la sécurité ou la propriété de nos utilisateurs</li>
                    </ul>
                </div>

                <!-- Sécurité des données -->
                <div class="content-section">
                    <h2>5. Sécurité des données</h2>
                    <p>Nous mettons en œuvre des mesures techniques et organisationnelles pour protéger vos données :</p>
                    <ul>
                        <li>Utilisation du chiffrement SSL pour sécuriser les échanges</li>
                        <li>Révision régulière de nos pratiques de collecte et stockage</li>
                        <li>Accès limité aux informations personnelles aux employés concernés</li>
                    </ul>
                </div>

                <!-- Vos droits -->
                <div class="content-section">
                    <h2>6. Vos droits et choix</h2>
                    <p>Vous bénéficiez de plusieurs droits sur vos données personnelles, notamment :</p>
                    <ul>
                        <li>Droit d’accès à vos données</li>
                        <li>Droit de rectification en cas d’erreur</li>
                        <li>Droit à la suppression sous certaines conditions</li>
                        <li>Droit de limiter ou de vous opposer au traitement de vos données</li>
                    </ul>
                </div>

                <!-- Modifications de la politique -->
                <div class="content-section">
                    <h2>7. Modifications de cette politique</h2>
                    <p>Nous pouvons mettre à jour cette politique de confidentialité périodiquement. Toute modification sera affichée sur cette page avec une nouvelle date d’entrée en vigueur.</p>
                    <p>En continuant à utiliser nos services après ces modifications, vous acceptez les nouvelles conditions.</p>
                </div>
            </div>

            <!-- Contact -->
            <div class="privacy-contact" data-aos="fade-up">
                <h2>Contactez-nous</h2>
                <p>Pour toute question concernant cette politique ou vos données, veuillez nous contacter :</p>
                <div class="contact-details">
                    <p><strong>Email :</strong> agoliganange15@gmail.com</p>
                    <p><strong>Adresse :</strong> Cadjehoun , 75000 </p>
                </div>
            </div>

        </div>

    </section><!-- /Section Confidentialité -->
@endsection
