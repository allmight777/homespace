@extends('layouts.welcome')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="text-center p-5 shadow rounded bg-white">
            <div class="mb-4">
                <center> <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_w51pcehl.json"
                        background="transparent" speed="1" style="width: 300px; height: 180px; margin-bottom: 0px;" loop
                        autoplay>

                    </lottie-player> </center>


            </div>

            <h2 class="mb-3">Merci pour votre message !</h2>
            <p class="mb-4">Nous l'avons bien reçu. Nous vous répondrons dans les plus brefs délais.</p>
            <a href="{{ url('/') }}" class="btn btn-success">Retour à l'accueil</a>
        </div>
    </div>
@endsection
