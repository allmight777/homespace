@extends('layouts.welcome') 

@section('title', 'Erreur Serveur')

@section('content')
    <div style="text-align:center; margin-top: 50px;">
        <h1>Erreur 500</h1>
        <p>Une erreur interne est survenue. Veuillez réessayer plus tard.</p>

        {{-- Facultatif : afficher l’erreur si APP_DEBUG est activé --}}
        @if(config('app.debug'))
            <p style="color:red;">{{ $exception->getMessage() }}</p>
        @endif
    </div>
@endsection
