@extends('layouts.welcome')

@section('content')
    <!-- Bootstrap (si pas déjà inclus) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .register-container {
            min-height: 75vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #e7f7e9;
        }

        .register-box {
            background: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
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

    <div class="register-container">
        <div class="register-box">




            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-3">
                    <x-input-label for="name" :value="__('Nom')" class="form-label" />
                    <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')"
                        required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="text-danger mt-1" />
                </div>

                <!-- WhatsApp Number -->
                <div class="mb-3">
                    <x-input-label for="whatsapp_number" :value="__('Numéro WhatsApp')" class="form-label" />
                    <x-text-input id="whatsapp_number" class="form-control" type="tel" name="whatsapp_number"
                        :value="old('whatsapp_number')" autocomplete="tel" required  />
                    <x-input-error :messages="$errors->get('whatsapp_number')" class="text-danger mt-1" />
                </div>


                <!-- Email Address -->
                <div class="mb-3">
                    <x-input-label for="email" :value="__('Email')" class="form-label" />
                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')"
                        required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="text-danger mt-1" />
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <x-input-label for="password" :value="__('Mot de passe')" class="form-label" />
                    <x-text-input id="password" class="form-control" type="password" name="password" required
                        autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="text-danger mt-1" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" class="form-label" />
                    <x-text-input id="password_confirmation" class="form-control" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="text-danger mt-1" />
                </div>

                <!-- Actions -->
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <a class="text-muted small" href="{{ route('login') }}">
                        {{ __('Déjà inscrit ? Se connecter') }}
                    </a>

                    <x-primary-button class="btn btn-primary btn-primary-custom">
                        {{ __('S’inscrire') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
@endsection
