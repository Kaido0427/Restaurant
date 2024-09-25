<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Administration-SERVICES RAPIDES</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="https://demo.dashboardpack.com/architectui-html-free/main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        .app-header__logo .logo-src {
            background: url('{{ asset(' images/logo_sr.png') }}') !important;
        }
    </style>

</head>

<body>
    <div class="position-relative">
        <!-- Affichage des messages de session -->
        @if (session('success'))
            <div class="alert alert-success fade-out" role="alert"
                style="z-index: 9999; position: absolute; top: 20px; left: 50%; transform: translateX(-50%);">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger fade-out" role="alert"
                style="z-index: 9999; position: absolute; top: 20px; left: 50%; transform: translateX(-50%);">
                {{ session('error') }}
            </div>
        @endif
    </div>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                            data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button"
                        class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="app-header__content">

                <div class="app-header-left">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                            class="p-0 btn">
                                            <img width="42" class="rounded-circle"
                                                src="{{ asset('images/logo_sr.png') }}" alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true"
                                            class="dropdown-menu dropdown-menu-right">
                                            <!-- Formulaire de déconnexion -->
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>

                                            <button type="button" tabindex="0" class="dropdown-item"
                                                onclick="document.getElementById('logout-form').submit();">
                                                Déconnexion
                                            </button>
                                        </div>

                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                        {{ Auth::user()->name }}
                                    </div>

                                    <div class="widget-subheading">
                                        Compte Administrateur
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src">SERVICES RAPIDES</div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                                data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button"
                            class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">

                            <li>
                                <a href="/" class="mm-active">
                                    <i class="metismenu-icon pe-7s-rocket"></i>
                                    Accueil
                                </a>

                            </li>
                            <li>
                                <a href="#menuList" class="mm-active">
                                    <i class="metismenu-icon pe-7s-rocket"></i>
                                    Gestion des Menus
                                </a>

                            </li>


                        </ul>
                    </div>
                </div>
            </div>
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-car icon-gradient bg-mean-fruit">
                                    </i>
                                </div>
                                <div> {{ Auth::user()->name }}
                                    <div class="page-title-subheading">Panel d'administration.
                                    </div>
                                </div>
                            </div>
                            <div class="page-title-actions">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-midnight-bloom">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">SOLDE</div>
                                        <div class="widget-subheading"></div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-white"><span>XOF {{ $totalMontantPaye }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-arielle-smile">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">TOTAL DES COMMANDES</div>
                                        <div class="widget-subheading"></div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-white"><span>{{ $commandes->count() }} </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-grow-early">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">COMMANDES EN COURS</div>
                                        <div class="widget-subheading"></div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-white"><span> {{ $pendingCommandes->count() }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-premium-dark">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">COMMANDES PAYEES</div>
                                        <div class="widget-subheading"></div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-warning">
                                            <span>{{ $paidCommandes->count() }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content">
                                <div class="widget-content-outer">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">COMMANDES ANNULEES</div>
                                            <div class="widget-subheading"></div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-success">{{ $canceledCommandes->count() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content">
                                <div class="widget-content-outer">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">COMMANDES LIVREES</div>
                                            <div class="widget-subheading">commerciaux enregistrés</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-warning">
                                                {{ $deliveredCommandes->count() }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-header">COMMANDES

                                </div>
                                <div class="table-responsive">
                                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nom du Client</th>
                                                <th class="text-center">Code</th>
                                                <th class="text-center">Montant</th>
                                                <th class="text-center">Statut</th>
                                                <th class="text-center">QR Code</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($commandes as $commande)
                                                <tr>
                                                    <td>
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left flex2">
                                                                    <div class="widget-heading">
                                                                        {{ $commande->nom_client }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">{{ $commande->client_id }}</td>
                                                    <td class="text-center">{{ number_format($commande->montant) }}
                                                        XOF</td>
                                                    <td class="text-center">
                                                        <div
                                                            class="badge 
                                                        @if ($commande->status == 'paid') badge-success 
                                                        @elseif($commande->status == 'pending') badge-warning 
                                                        @elseif($commande->status == 'canceled') badge-danger 
                                                         @elseif($commande->status == 'delivered') badge-info 
                                                        @else badge-secondary @endif">

                                                            @switch($commande->status)
                                                                @case('paid')
                                                                    Payée
                                                                @break

                                                                @case('pending')
                                                                    En attente
                                                                @break

                                                                @case('canceled')
                                                                    Annulée
                                                                @break

                                                                @case('delivered')
                                                                    Livrée
                                                                @break

                                                                @default
                                                                    Inconnu
                                                            @endswitch
                                                        </div>

                                                    </td>
                                                    <td class="text-center">
                                                        @if ($commande->status == 'paid' && $commande->qr_code)
                                                            <img src="{{ asset($commande->qr_code) }}" alt="QR Code"
                                                                style="max-width: 50px; cursor: pointer;"
                                                                id="qrCode_{{ $commande->id }}"
                                                                onclick="showQRCode('{{ asset($commande->qr_code) }}')">
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="d-block text-center card-footer">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="menuList" class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-header">
                                    Liste des menus
                                    <!-- Button to trigger the add menu form -->
                                    <button id="addMenuBtn" class="btn btn-primary float-right">Ajouter un
                                        menu</button>
                                </div>
                                <div class="table-responsive">
                                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Description</th>
                                                <th>Prix</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($menus as $menu)
                                                <tr>
                                                    <td>{{ $menu->nom }}</td>
                                                    <td>{{ $menu->description }}</td>
                                                    <td>{{ $menu->prix }} XOF</td>
                                                    <td>
                                                        <!-- Update icon (SVG) -->
                                                        <a class="btn btn-outline-warning"
                                                            onclick="openUpdateForm('{{ $menu->id }}', '{{ $menu->nom }}', '{{ $menu->description }}', '{{ $menu->prix }}', '{{ $menu->image }}')">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                            </svg>
                                                        </a>
                                                        <!-- Delete icon (SVG) -->
                                                        <a class="btn btn-outline-danger"
                                                            href="{{ route('menus.destroy', $menu->id) }}"
                                                            onclick="event.preventDefault(); if(confirm('Are you sure?')) document.getElementById('delete-form-{{ $menu->id }}').submit();">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                                            </svg>
                                                        </a>
                                                        <form id="delete-form-{{ $menu->id }}"
                                                            action="{{ route('menus.destroy', $menu->id) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Add menu form (hidden by default) -->
                        <div id="overlay" class="overlay d-none"></div>
                        <!-- Add menu form (hidden by default) -->
                        <div id="addMenuForm" class="d-none"
                            style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999; background: white; padding: 20px; border-radius: 10px; width: 400px; max-width: 90%; margin: 0 10px;">
                            <div class="d-flex justify-content-end">
                                <button id="closeMenuForm" class="btn btn-danger">X</button>
                            </div>
                            <h4>Ajouter un nouveau menu</h4>
                            <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="nom">Nom du menu</label>
                                    <input type="text" class="form-control" name="nom" id="nom"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="prix">Prix</label>
                                    <input type="number" class="form-control" name="prix" id="prix"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                </div>
                                <button type="submit" class="btn btn-success">Ajouter</button>
                            </form>
                        </div>

                        <style>
                            @media (max-width: 768px) {
                                #addMenuForm {
                                    width: 90%;
                                    /* Reduce width on mobile */
                                    max-width: 90%;
                                    /* Ensure form doesn't exceed viewport width */
                                    padding: 10px;
                                    /* Reduce padding */
                                    margin: 20px;
                                    /* Add margin for better spacing */
                                }
                            }

                            .overlay {
                                position: fixed;
                                top: 0;
                                left: 0;
                                width: 100%;
                                height: 100%;
                                background: rgba(0, 0, 0, 0.5);
                                /* Semi-transparent dark background */
                                backdrop-filter: blur(5px);
                                /* Blur effect */
                                z-index: 9998;
                                /* Make sure it’s behind the form but above other content */
                                display: none;
                                /* Hidden by default */
                            }

                            /* Make overlay visible */
                            .overlay.d-block {
                                display: block;
                            }
                        </style>


                    </div>

                    <script>
                        document.getElementById('addMenuBtn').addEventListener('click', function() {
                            document.getElementById('addMenuForm').classList.remove('d-none');
                            document.getElementById('overlay').classList.add('d-block');
                        });

                        document.getElementById('closeMenuForm').addEventListener('click', function() {
                            document.getElementById('addMenuForm').classList.add('d-none');
                            document.getElementById('overlay').classList.remove('d-block');
                        });
                    </script>  

                </div>
                <!-- Update menu form (hidden by default) -->
                <div id="updateMenuForm" class="d-none"
                    style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999; background: white; padding: 20px; border-radius: 10px; width: 400px; max-width: 90%; margin: 0 10px;">
                    <div class="d-flex justify-content-end">
                        <button id="closeUpdateMenuForm" class="btn btn-danger">X</button>
                    </div>
                    <h4>Modifier le menu</h4>
                    <form id="updateMenuFormAction" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="updateMenuId">
                        <div class="form-group">
                            <label for="updateNom">Nom du menu</label>
                            <input type="text" class="form-control" name="nom" id="updateNom" required>
                        </div>
                        <div class="form-group">
                            <label for="updateDescription">Description</label>
                            <textarea class="form-control" name="description" id="updateDescription"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="updatePrix">Prix</label>
                            <input type="number" class="form-control" name="prix" id="updatePrix" required>
                        </div>
                        <div class="form-group">
                            <label for="updateImage">Image</label>
                            <input type="file" class="form-control" name="image" id="updateImage">
                        </div>
                        <button type="submit" class="btn btn-success">Mettre à jour</button>
                    </form>
                </div>

                <style>
                    @media (max-width: 768px) {
                        #updateMenuForm {
                            width: 90%;
                            max-width: 90%;
                            padding: 10px;
                            margin: 20px;
                        }
                    }
                </style>



                <!-- Div qui affiche le QR Code en grand -->
                <div id="qrCodeDisplay" class="qr-code-overlay d-none">
                    <div class="qr-code-content">
                        <span class="close-btn" onclick="hideQRCode()">&times;</span>
                        <img id="qrCodeImage" src="" alt="QR Code" class="img-fluid">
                    </div>
                </div>

                <!-- Styles pour la div responsive -->
                <style>
                    .qr-code-overlay {
                        position: fixed;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        background-color: rgba(0, 0, 0, 0.7);
                        /* Fond sombre */
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        z-index: 9999;
                    }

                    .qr-code-content {
                        position: relative;
                        background-color: white;
                        padding: 20px;
                        border-radius: 8px;
                        max-width: 90%;
                        max-height: 90%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }

                    .qr-code-content img {
                        max-width: 100%;
                        max-height: 100%;
                    }

                    .close-btn {
                        position: absolute;
                        top: 10px;
                        right: 10px;
                        font-size: 30px;
                        cursor: pointer;
                        color: #333;
                    }

                    .d-none {
                        display: none;
                    }
                </style>

                <!-- Script pour afficher et cacher le QR code -->
                <script>
                    function showQRCode(src) {
                        // Afficher la div et mettre à jour l'image
                        const qrCodeDisplay = document.getElementById('qrCodeDisplay');
                        const qrCodeImage = document.getElementById('qrCodeImage');
                        qrCodeImage.src = src;
                        qrCodeDisplay.classList.remove('d-none');
                    }

                    function hideQRCode() {
                        // Cacher la div
                        const qrCodeDisplay = document.getElementById('qrCodeDisplay');
                        qrCodeDisplay.classList.add('d-none');
                    }
                </script>
                <div class="app-wrapper-footer">
                    <div class="app-footer">
                        <div class="app-footer__inner">
                            <div class="app-footer-left">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a href="/" class="nav-link">
                                            MON RESTAURANT
                                        </a>
                                        Tous droits réservés &copy; 2024

                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
    <script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-free/assets/scripts/main.js">
    </script>

    <style>
        /* Style pour faire disparaître progressivement l'alerte */
        .fade-out {
            transition: opacity 0.5s ease-in-out;
            opacity: 1;
        }

        .fade-out.hidden {
            opacity: 0;
        }
    </style>

    <script>
        // Fonction pour faire disparaître l'alerte après 3 secondes
        document.addEventListener('DOMContentLoaded', function() {
            let alertElement = document.querySelector('.alert');
            if (alertElement) {
                setTimeout(function() {
                    alertElement.classList.add('hidden'); // Réduit l'opacité
                }, 3000); // 3 secondes avant de commencer la disparition

                // Supprime l'alerte du DOM après la transition d'opacité
                setTimeout(function() {
                    alertElement.remove();
                }, 3500); // 3.5 secondes pour laisser le temps à la transition de finir
            }
        });
    </script>
    <script>
        function openUpdateForm(id, nom, description, prix, image) {
            document.getElementById('updateMenuForm').classList.remove('d-none');
            document.getElementById('overlay').classList.add('d-block');

            document.getElementById('updateMenuId').value = id;
            document.getElementById('updateNom').value = nom;
            document.getElementById('updateDescription').value = description;
            document.getElementById('updatePrix').value = prix;
            // Set the action URL of the form
            document.getElementById('updateMenuFormAction').action = `{{ route('menus.update', '') }}/${id}`;

            // If needed, you can handle the image preview or reset
            // document.getElementById('updateImage').value = '';
        }

        document.getElementById('closeUpdateMenuForm').addEventListener('click', function() {
            document.getElementById('updateMenuForm').classList.add('d-none');
            document.getElementById('overlay').classList.remove('d-block');
        });
    </script>

</body>

</html>
