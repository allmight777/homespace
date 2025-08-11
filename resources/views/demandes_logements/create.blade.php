@extends('layouts.usersConnecter')

@section('content')
    <style>
        .form-container {
            max-width: 700px;
            margin: 30px auto 20px auto;
            background: transparent;
            padding: 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin-top: 0px;
            margin-bottom: 0px;
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
            color: #222;
            font-weight: 600;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            gap: 15px 30px;
        }

        label.form-label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #333;
        }

        input.form-control,
        textarea.form-control {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #bbb;
            border-radius: 5px;
            font-size: 0.95rem;
            box-sizing: border-box;
            transition: border-color 0.2s ease;
            background-color: #fff;
            color: #111;
        }

        input.form-control:focus,
        textarea.form-control:focus {
            outline: none;
            border-color: #007bff;
        }

        /* Deux champs côte à côte */
        .col-6 {
            flex: 1 1 calc(50% - 15px);
            min-width: 200px;
        }

        /* Champs full width */
        .col-12 {
            flex: 1 1 100%;
        }

        /* Checkbox group inline */
        .form-check {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            width: auto;
        }

        .form-check-input {
            width: 18px;
            height: 18px;
            margin: 0;
            cursor: pointer;
        }

        .form-check-label {
            margin-left: 8px;
            font-weight: 500;
            color: #444;
            cursor: pointer;
        }

        /* Boutons alignés à droite */
        .form-actions {
            width: 100%;
            display: flex;
            gap: 15px;
            margin-top: 15px;
        }

        .form-actions>* {
            flex: 1;

        }


        button.btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
            color: white;
            transition: background-color 0.3s ease;
        }

        button.btn-primary:hover {
            background-color: #0056b3;
        }

        a.btn-secondary {
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 5px;
            border: 1px solid #6c757d;
            color: #ffffff;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
          background-color: #6c757d;
        }

        a.btn-secondary:hover {
            background-color: #6c757d;
            color: white;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .col-6 {
                flex: 1 1 100%;
            }

            .form-actions {
                justify-content: center;
            }
        }
    </style>

    <div class="form-container">
        <br>

        <form action="{{ route('demandes-logements.store') }}" method="POST">
            @csrf

            <div class="col-6">
                <label for="lieu" class="form-label">Lieu</label>
                <input type="text" name="lieu" id="lieu" class="form-control" value="{{ old('lieu') }}" required>
            </div>

            <div class="col-6">
                <label for="type_chambre" class="form-label">Type de chambre</label>
                <input type="text" name="type_chambre" id="type_chambre" class="form-control"
                    value="{{ old('type_chambre') }}" required>
            </div>

            <div class="col-6 form-check">
                <input type="checkbox" name="electricite" id="electricite" class="form-check-input"
                    {{ old('electricite') ? 'checked' : '' }}>
                <label for="electricite" class="form-check-label">Electricité</label>
            </div>

            <div class="col-6 form-check">
                <input type="checkbox" name="eau" id="eau" class="form-check-input"
                    {{ old('eau') ? 'checked' : '' }}>
                <label for="eau" class="form-check-label">Eau</label>
            </div>

            <div class="col-12">
                <label for="description_electricite" class="form-label">Description électricité</label>
                <textarea name="description_electricite" id="description_electricite" class="form-control" rows="2">{{ old('description_electricite') }}</textarea>
            </div>

            <div class="col-12">
                <label for="description_eau" class="form-label">Description eau</label>
                <textarea name="description_eau" id="description_eau" class="form-control" rows="2">{{ old('description_eau') }}</textarea>
            </div>

            <div class="col-6">
                <label for="nombre_chambres" class="form-label">Nombre de chambres</label>
                <input type="number" name="nombre_chambres" id="nombre_chambres" class="form-control"
                    value="{{ old('nombre_chambres', 1) }}" min="1" required>
            </div>

            <div class="col-6">
                <label for="autres_criteres" class="form-label">Autres critères</label>
                <textarea name="autres_criteres" id="autres_criteres" class="form-control" rows="2">{{ old('autres_criteres') }}</textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Envoyer</button>
                <a href="{{ route('demandes-logements.index') }}" class="btn btn-secondary">Annuler</a>
            </div>

        </form>
    </div>
    <br><br>
@endsection
