@extends('layouts.welcome')

@section('content')

    <!-- Titre de la page -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Conditions Générales</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ route('welcome') }}">Accueil</a></li>
            <li class="current">Conditions</li>
          </ol>
        </nav>
      </div>
    </div><!-- Fin Titre de la page -->

    <!-- Section Conditions Générales -->
    <section id="terms-of-service" class="terms-of-service section">

      <div class="container" data-aos="fade-up">
        <!-- En-tête de la page -->
        <div class="tos-header text-center" data-aos="fade-up">
          <span class="last-updated">Dernière mise à jour : 27 février 2025</span>
          <h2>Conditions Générales d’Utilisation</h2>
          <p>Merci de lire attentivement ces conditions avant d’utiliser nos services.</p>
        </div>

        <!-- Contenu -->
        <div class="tos-content" data-aos="fade-up" data-aos-delay="200">
          <!-- Accord -->
          <div id="agreement" class="content-section">
            <h3>1. Accord</h3>
            <p>En accédant à notre site web et à nos services, vous acceptez d’être lié par ces Conditions Générales ainsi que par toutes les lois et réglementations applicables. Si vous n’acceptez pas ces conditions, vous n’êtes pas autorisé à utiliser nos services.</p>
            <div class="info-box">
              <i class="bi bi-info-circle"></i>
              <p>Ces conditions s’appliquent à tous les utilisateurs, visiteurs et toute autre personne utilisant nos services.</p>
            </div>
          </div>

          <!-- Propriété intellectuelle -->
          <div id="intellectual-property" class="content-section">
            <h3>2. Droits de propriété intellectuelle</h3>
            <p>Nos services ainsi que leur contenu original, fonctionnalités et caractéristiques nous appartiennent et sont protégés par les lois internationales relatives au droit d’auteur, marques, brevets et secrets commerciaux.</p>
            <ul class="list-items">
              <li>Tous les contenus sont notre propriété exclusive</li>
              <li>Il est interdit de copier ou modifier le contenu</li>
              <li>Nos marques ne peuvent être utilisées sans autorisation</li>
              <li>Le contenu est destiné à un usage personnel et non commercial</li>
            </ul>
          </div>

          <!-- Comptes utilisateurs -->
          <div id="user-accounts" class="content-section">
            <h3>3. Comptes utilisateurs</h3>
            <p>Lorsque vous créez un compte chez nous, vous devez fournir des informations exactes, complètes et à jour. Tout manquement constitue une violation des présentes conditions, pouvant entraîner la suspension immédiate de votre compte.</p>
            <div class="alert-box">
              <i class="bi bi-exclamation-triangle"></i>
              <div class="alert-content">
                <h5>Attention importante</h5>
                <p>Vous êtes responsable de la confidentialité de votre mot de passe et de toutes les activités réalisées via votre compte.</p>
              </div>
            </div>
          </div>

          <!-- Activités interdites -->
          <div id="prohibited" class="content-section">
            <h3>4. Activités interdites</h3>
            <p>Vous ne devez pas accéder ou utiliser le service pour un usage autre que celui auquel il est destiné.</p>
            <div class="prohibited-list">
              <div class="prohibited-item">
                <i class="bi bi-x-circle"></i>
                <span>Extraction systématique de données ou contenus</span>
              </div>
              <div class="prohibited-item">
                <i class="bi bi-x-circle"></i>
                <span>Publication de contenus malveillants</span>
              </div>
              <div class="prohibited-item">
                <i class="bi bi-x-circle"></i>
                <span>Utilisation non autorisée de cadres (framing)</span>
              </div>
              <div class="prohibited-item">
                <i class="bi bi-x-circle"></i>
                <span>Tentatives d’accès non autorisé</span>
              </div>
            </div>
          </div>

          <!-- Exclusions de garantie -->
          <div id="disclaimer" class="content-section">
            <h3>5. Exclusions de garantie</h3>
            <p>L’utilisation de nos services se fait à vos propres risques. Les services sont fournis « tels quels » et « selon disponibilité » sans aucune garantie expresse ou implicite.</p>
            <div class="disclaimer-box">
              <p>Nous ne garantissons pas :</p>
              <ul>
                <li>Que le service réponde à vos attentes</li>
                <li>Que le service soit ininterrompu ou sans erreur</li>
                <li>Que les résultats obtenus seront exacts</li>
                <li>La correction des éventuelles erreurs</li>
              </ul>
            </div>
          </div>

          <!-- Limitation de responsabilité -->
          <div id="limitation" class="content-section">
            <h3>6. Limitation de responsabilité</h3>
            <p>En aucun cas nous ne saurons responsables des dommages indirects, punitifs, accessoires, spéciaux ou consécutifs liés à l’utilisation des services.</p>
          </div>

          <!-- Indemnisation -->
          <div id="indemnification" class="content-section">
            <h3>7. Indemnisation</h3>
            <p>Vous acceptez d’indemniser et de défendre notre société contre toute réclamation, responsabilité, dommage, perte ou dépense découlant de votre utilisation des services.</p>
          </div>

          <!-- Résiliation -->
          <div id="termination" class="content-section">
            <h3>8. Résiliation</h3>
            <p>Nous pouvons résilier ou suspendre votre compte immédiatement, sans préavis ni responsabilité, en cas de violation des présentes conditions ou pour toute autre raison.</p>
          </div>

          <!-- Droit applicable -->
          <div id="governing-law" class="content-section">
            <h3>9. Droit applicable</h3>
            <p>Ces conditions sont régies par les lois de [Votre Pays], sans tenir compte de leurs principes de conflits de lois.</p>
          </div>

          <!-- Modifications -->
          <div id="changes" class="content-section">
            <h3>10. Modifications des conditions</h3>
            <p>Nous nous réservons le droit de modifier ces conditions à tout moment. Les nouvelles conditions seront publiées sur cette page.</p>
            <div class="notice-box">
              <i class="bi bi-bell"></i>
              <p>En continuant d’utiliser nos services après la publication des modifications, vous acceptez d’être lié par les conditions mises à jour.</p>
            </div>
          </div>

          <!-- Vérification de disponibilité et Paiement -->
          <div id="availability-payment" class="content-section" data-aos="fade-up" data-aos-delay="550">
            <h3>11. Vérification de la disponibilité et Paiement</h3>
            <p>
              Avant d’effectuer tout paiement, vous devez vérifier attentivement la disponibilité de la location. Si vous ne le faites pas et qu’un remboursement s’avère nécessaire, des frais pourront être déduits.
            </p>
          </div>
        </div>

        <!-- Section Contact -->
        <div class="tos-contact" data-aos="fade-up" data-aos-delay="300">
          <div class="contact-box">
            <div class="contact-icon">
              <i class="bi bi-envelope"></i>
            </div>
            <div class="contact-content">
              <h4>Des questions sur les conditions ?</h4>
              <p>Si vous avez des questions concernant ces conditions, n’hésitez pas à nous contacter.</p>
              <a href="#" class="contact-link">Contacter le support</a>
            </div>
          </div>
        </div>
      </div>

    </section><!-- Fin Section Conditions Générales -->

@endsection
