@extends('layouts.welcome')

@section('content')
    <!-- Bootstrap CDN (si pas déjà dans le layout) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .reset-container {
            min-height: 70vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #e7f7e9;
        }

        .reset-box {
            background: #fff;
            padding: 40px;
            border-radius: 8px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .btn-primary-custom {
            background-color: #077F46;
            border-color: #011E2C;
        }

        .btn-primary-custom:hover {
            background-color: #077F46;
            border-color: #03354a;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>

    <div class="reset-container">
        <div class="reset-box">
            <!-- Message d'instruction -->
            <div class="mb-4 text-muted">
                {{ __('Mot de passe oublié ? Aucun problème. Entrez votre adresse e-mail et nous vous enverrons un lien de réinitialisation.') }}
            </div>

            <!-- Statut de la session (confirmation d'envoi) -->
            <x-auth-session-status class="mb-4 text-success" :status="session('status')" />

            <!-- Formulaire -->
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Adresse e-mail -->
                <div class="mb-3">
                    <x-input-label for="email" :value="__('Adresse e-mail')" class="form-label" />
                    <x-text-input id="email" class="form-control" type="email" name="email"
                                  :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="text-danger mt-1" />
                </div>

                <!-- Bouton envoyer -->
                <div class="text-end">
                    <x-primary-button class="btn btn-primary btn-primary-custom">
                        {{ __('Envoyer le lien de réinitialisation') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
@endsection
