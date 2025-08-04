@extends('layouts.welcome')

@section('content')
    <!-- Bootstrap 5 CDN (si pas déjà inclus dans layouts.welcome) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Centrage du formulaire */
        .login-container {
            min-height: 70vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #e7f7e9;
        }

        /* Style de la boîte */
        .login-box {
            background: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        /* Bouton personnalisé */
        .btn-primary-custom {
            background-color: #077F46;
            border-color: #16df48;
        }

        .btn-primary-custom:hover {
            background-color: #077F46;
            border-color: #f3fcf2;
        }

        /* Icône accueil */
        .icon {
            width: 40px;
            height: 40px;
            color: #011E2C;
        }


        a {
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        #inscrire {
            color: black;
        }

        #inscrire:hover {
            background-color: transparent;
            color: inherit;
            text-decoration: underline;
        }
    </style>

    <div class="login-container">
        <div class="login-box">



            <!-- Statut de session -->
            <x-auth-session-status class="mb-4 text-success" :status="session('status')" />

            <!-- Formulaire -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-3">
                    <x-input-label for="email" :value="__('Adresse email')" class="form-label" />
                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')"
                        required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="text-danger mt-2" />
                </div>

                <!-- Mot de passe -->
                <div class="mb-3">
                    <x-input-label for="password" :value="__('Mot de passe')" class="form-label" />
                    <x-text-input id="password" class="form-control" type="password" name="password" required
                        autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="text-danger mt-2" />
                </div>

                <!-- Se souvenir de moi -->
                <div class="form-check mb-3">
                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                    <label for="remember_me" class="form-check-label">
                        {{ __('Se souvenir de moi') }}
                    </label>
                </div>

                <!-- Actions -->
                <div class="d-flex justify-content-end align-items-center gap-2 mt-4">
                    @if (Route::has('password.request'))
                        <a class="text-muted small me-auto" href="{{ route('password.request') }}">
                            {{ __('Mot de passe oublié ?') }}
                        </a>
                    @endif

                    <a href="{{ route('register') }}" class="btn btn-outline-secondary" id="inscrire">
                        {{ __("S'inscrire") }}
                    </a>

                    <x-primary-button class="btn btn-primary btn-primary-custom">
                        {{ __('Se connecter') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
@endsection
