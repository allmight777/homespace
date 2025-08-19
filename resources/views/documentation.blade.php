@extends('layouts.welcome')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        #head {
            background-color: #EDF6F2;
        }

        a {
            text-decoration: none;
        }


        .logo-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }


        .univ-name {
            font-size: 1.4rem;
            font-weight: 600;
            text-align: center;
            margin: 0;
        }

        .download-btn {
            background-color: #e91e63;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 4px 8px rgba(233, 30, 99, 0.3);
        }

        .download-btn:hover {
            background-color: #c2185b;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(233, 30, 99, 0.4);
        }

        .vertical-divider {
            border-left: 2px dashed #262897;
            height: auto;
            margin: 0 auto;
            margin-bottom: 50px;
        }

        .instruction-section {
            margin-bottom: 40px;
            padding: 25px;
            border-radius: 12px;
            background-color: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s;
        }

        .instruction-section:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        .section-title {
            color: #1a237e;
            font-weight: 700;
            margin-bottom: 0px;
            font-size: 1.5rem;
        }

        .section-content {
            font-size: 1.05rem;
            line-height: 1.6;
            margin-top: 0px;
        }


        #form-images {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        #img-inscription,
        #img-connexion {
            width: 200%;
            max-width: 500px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        #img-inscription:hover,
        #img-connexion:hover {
            transform: scale(1.05);
        }


        .section-img:hover {
            transform: scale(1.03);
        }

        .instruction-section {
            margin-bottom: 20px;
        }

        .form-images {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .section-img {
            width: 100%;
            max-width: 500px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .section-img:hover {
            transform: scale(1.03);
        }

        .download-btn {
            background-color: #3949ab;
            color: white;
            border: none;
            padding: 10px 20px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
        }

        .download-btn:hover {
            background-color: #303f9f;
        }

        /* Lightbox modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            max-width: 90%;
            max-height: 80vh;
            border-radius: 10px;
            animation: zoomIn 0.3s ease;
        }

        @keyframes zoomIn {
            from {
                transform: scale(0.5);
            }

            to {
                transform: scale(1);
            }
        }

        .close {
            position: absolute;
            top: 20px;
            right: 35px;
            color: white;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
        }



        @media (max-width: 768px) {
            .vertical-divider {
                display: none;
            }

            .instruction-section {
                margin-bottom: 25px;
            }

            .section-img {
                width: 100%;
                max-width: 500px;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                cursor: pointer;
                transition: transform 0.3s ease;
            }

            .section-content {
                font-size: 1rem;

            }
        }

        .step-number {
            display: inline-block;
            width: 36px;
            height: 36px;
            background-color: #1a237e;
            color: white;
            text-align: center;
            line-height: 36px;
            border-radius: 50%;
            margin-right: 10px;
            font-weight: bold;
        }
    </style>

    <!-- Header Section -->

    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Documentation</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('welcome') }}" class="text-success">Home</a></li>
                    <li class="current">comment ça marche?</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->


    <br><br>
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <!-- Left Column for Instructions -->
            <div class="col-md-6">
                <div class="instruction-section">
                    <h3 class="section-title mb-0"><span class="step-number">1</span>Recherche</h3>
                    <strong>
                        <p class="text-danger">Vous pouvez cliquer sur les images pour aggrandir pour une meilleur
                            visualisation</p>
                    </strong>
                    <p class="section-content">
                        Sur la page principale, vous pouvez utiliser le formulaire de recherche pour trouver un logement.
                        Vous pouvez également accéder à la section "Appartement" via la barre de navigation en haut de la
                        page.
                        Sur ordinateur, les options sont visibles directement dans la barre de navigation.
                        Sur téléphone, appuyez sur les trois traits verticaux situés en haut à droite (le menu) pour
                        afficher les autres options.
                    </p>
                </div>


                <div class="instruction-section">
                    <h3 class="section-title"><span class="step-number">2</span>Résultats</h3>
                    <p class="section-content mt-0">
                        Vous serez redirigé vers une page affichant les appartements correspondant à vos critères de
                        recherche,
                        ou bien tous les appartements disponibles. Cliquez sur l'appartement qui vous plaît pour voir plus
                        d'informations à son sujet.
                    </p>
                </div>


                <br><br><br><br>

                <div class="instruction-section">
                    <h3 class="section-title"><span class="step-number">3</span>Connexion ou inscription</h3>
                    <p class="section-content">
                        Une fois que vous avez cliqué sur l'appartement de votre choix, vous serez redirigé vers la page de
                        connexion.
                        Si vous avez déjà un compte, connectez-vous avec votre adresse e-mail et votre mot de passe.
                        Sinon, cliquez sur "S'inscrire" pour créer un compte. Remplissez le formulaire d'inscription,
                        puis revenez cliquer sur l'appartement pour vous connecter et accéder à plus d'informations.
                    </p>
                </div>

                <br><br><br><br><br><br><br><br>
                <div class="instruction-section">
                    <h3 class="section-title"><span class="step-number">4</span>Demande de réservation</h3>
                    <p class="section-content">
                        Après vous être connecté, vous serez redirigé vers une page contenant toutes les informations
                        concernant l'appartement sélectionné. Vous pouvez faire défiler la page vers le bas pour voir tous
                        les détails.
                        Si l'appartement vous plaît et que vous souhaitez faire une demande de visite ou de réservation,
                        cliquez sur le bouton vert <strong class="text-success">"Lancer une demande de
                            réservation"</strong>.
                        Le paiement des frais appropriés (Frais de visite) sera requis pour finaliser la demande.
                    </p>
                </div>

                <div class="instruction-section">
                    <h3 class="section-title"><span class="step-number">5</span>Paiement</h3>
                    <p class="section-content">
                        Une fois la demande de réservation lancée, cliquez sur le bouton <strong class="text-success">"Payer
                            maintenant"</strong> pour procéder au paiement via le service sécurisé FedaPay.
                        Suivez les étapes indiquées pour finaliser la transaction.
                        Une fois le paiement effectué, un reçu vous sera automatiquement envoyé à l'adresse e-mail utilisée
                        lors de votre inscription.
                    </p>


                </div>

                <br><br><br>

                <div class="instruction-section">
                    <h3 class="section-title"><span class="step-number">6</span>Suivi de votre demande</h3>
                    <p class="section-content">
                        Une fois le paiement effectué, vous pouvez suivre l’avancement de votre demande
                        dans la section <strong>"Mes paiements"</strong> en haut ou en cliquant sur le bouton <strong
                            class="text-warning">"Suivre mes paiements"</strong>.
                        Vous y trouverez la liste de toutes vos demandes de logement, avec leur statut (par exemple :
                        <em class="text-warning">En attente</em>).
                        <br><br>
                        Pour qu’un de nos agents puisse vous répondre et programmer un rendez-vous pour une visite,
                        le paiement doit être validé.
                        Une fois le paiement confirmé, l’un de nos agents vous contactera par WhatsApp ou par e-mail
                        afin de programmer un rendez-vous pour la visite.
                        Le statut de votre demande passera alors de <em>En attente</em> à <strong
                            class="text-success">Approuvé</strong>.
                    </p>
                </div>
                <br><br><br><br>
                <div class="instruction-section">
                    <h3 class="section-title"><span class="step-number">7</span>Demande personnalisée</h3>
                    <p class="section-content">
                        Si aucun des appartements présents sur le site ne correspond à vos critères,
                        vous pouvez faire une demande personnalisée en cliquant sur l’option <strong>"Lancer une
                            demande"</strong>
                        dans le menu de navigation après vous être connecté.
                        <br><br>
                        Vous serez redirigé vers un formulaire à remplir et à envoyer avec vos critères spécifiques.
                        Une fois la demande envoyée, il vous faudra patienter le temps qu’un de nos agents l’analyse et vous
                        réponde.
                    </p>
                </div>
                <br>

            </div>

            <!-- Vertical Divider -->
            <div class="col-md-1 d-flex justify-content-center">
                <div class="vertical-divider"></div>
            </div>

            <!-- Right Column for Images -->
            <div class="col-md-5">
                <!-- Groupe 1 -->
                <div class="instruction-section">
                    <img src="{{ asset('images/image_25.webp') }}" alt="Gestion des logements" class="section-img"
                        onclick="openModal(this.src)">
                </div>
                <br><br>
                <div class="instruction-section">
                    <img src="{{ asset('images/image_26.webp') }}" alt="Logements" class="section-img"
                        onclick="openModal(this.src)">
                </div>

                <br><br><br><br>
                <div class="instruction-section form-images">
                    <img src="{{ asset('images/image_28.webp') }}" alt="Formulaire d'inscription" class="section-img"
                        onclick="openModal(this.src)">
                    <img src="{{ asset('images/image_27.webp') }}" alt="Page de connexion" class="section-img"
                        onclick="openModal(this.src)">
                </div>
                <br><br>

                <div class="instruction-section">
                    <img src="{{ asset('images/image_29.webp') }}" alt="Processus d'inscription" class="section-img"
                        onclick="openModal(this.src)">
                </div>

                <br><br>
                <div class="instruction-section">
                    <img src="{{ asset('images/image_30.webp') }}" alt="Étapes supplémentaires" class="section-img"
                        onclick="openModal(this.src)">
                </div>

                <br><br><br><br><br>

                <div class="instruction-section form-images">
                    <img src="{{ asset('images/image_31.webp') }}" alt="Image 31" class="section-img"
                        onclick="openModal(this.src)">
                    <img src="{{ asset('images/image_32.webp') }}" alt="Image 32" class="section-img"
                        onclick="openModal(this.src)">
                </div>

                <br><br><br><br>
                <div class="instruction-section form-images">
                    <img src="{{ asset('images/image_33.webp') }}" alt="Image 33" class="section-img"
                        onclick="openModal(this.src)">
                    <img src="{{ asset('images/image_34.webp') }}" alt="Image 34" class="section-img"
                        onclick="openModal(this.src)">
                </div>

                <!-- Bouton de téléchargement -->
                <div class="container text-center">
                    <button class="download-btn" onclick="window.print()">
                        <i class="bi bi-download"></i> Télécharger la page
                    </button>
                </div>
                <br><br>
            </div>

            <!-- Lightbox modal -->
            <div id="img-modal" class="modal" onclick="closeModal()">
                <span class="close">&times;</span>
                <img class="modal-content" id="modal-img">
            </div>

        </div>
    </div>


    <script>
        function openModal(src) {
            const modal = document.getElementById("img-modal");
            const modalImg = document.getElementById("modal-img");
            modal.style.display = "flex";
            modalImg.src = src;
        }

        function closeModal() {
            document.getElementById("img-modal").style.display = "none";
        }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
