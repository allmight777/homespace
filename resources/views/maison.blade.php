@extends('layouts.welcome')

@section('content')

  <style>
    #main{
          background-color: #e7f7e9;
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

    <div class="results-header mb-4" data-aos="fade-up" data-aos-delay="200">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <h5>{{ $logements->total() }} Logements trouvés</h5>
        </div>
      </div>
    </div>

    <div class="properties-container">
      <div class="properties-masonry view-masonry active" data-aos="fade-up" data-aos-delay="250">
        <div class="row g-4">
          @foreach($logements as $logement)
            <div class="col-lg-4 col-md-6">
              <div class="property-item">
                <a href="#" class="property-link">
                  <div class="property-image-wrapper">
                    <img src="{{ isset($logement->photos[0]) ? asset('storage/' . $logement->photos[0]) : asset('assets/img/real-estate/default.jpg') }}" class="img-fluid" alt="{{ $logement->nom }}">
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
                    <i class="bi bi-geo-alt"></i>
                    {{ $logement->localisation }}
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
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>

    <div class="mt-4">
      {{ $logements->links() }}
    </div>

  </div>
</section>
@endsection
