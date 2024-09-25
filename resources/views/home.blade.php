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
                                <a href="#" class="mm-active">
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

                    <div id="prestaByLoc" class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-header">Liste des prestataires par localité

                                </div>
                                <div class="table-responsive">
                                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center" colspan="3">Quartier</th>
                                                <!-- Colspan ajusté -->
                                            </tr>
                                            <tr>
                                                <th class="text-center">Nom</th>
                                                <th class="text-center">Prénoms</th>
                                                <th class="text-center">Profession</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $prestatairesByLocation = [];
                                            @endphp
                                            @foreach ($prestatairesByLocation as $locationId => $prestataires)
                                                @php
                                                    // Récupérer le quartier correspondant
                                                    $quartier = $locations->find($locationId);
                                                @endphp
                                                <!-- Affichage du quartier -->
                                                <tr>
                                                    <td colspan="3" class="text-center" style="font-weight:bold;">
                                                        {{ $quartier->quartiers }}
                                                    </td>
                                                </tr>

                                                <!-- Affichage des prestataires -->
                                                @foreach ($prestataires as $prestataire)
                                                    <tr>
                                                        <td class="text-center">{{ $prestataire->nom }}</td>
                                                        <td class="text-center">{{ $prestataire->prenom }}</td>
                                                        <td class="text-center">
                                                            @if ($prestataire->service->nom === 'Autres')
                                                                @php
                                                                    $autresService = DB::table('autres_services')
                                                                        ->where('prestataire_id', $prestataire->id) // Remplacez 'autres_service_id' par le nom de la colonne qui fait le lien
                                                                        ->value('nom');
                                                                @endphp
                                                                {{ $autresService }}
                                                            @else
                                                                {{ $prestataire->service->nom }}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>


                                </div>
                                <div class="d-block text-center card-footer">

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal fade" id="updatePasswordModal" tabindex="-1"
                    aria-labelledby="updatePasswordModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updatePasswordModalLabel">Mettre à jour le mot de passe
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Formulaire de mise à jour du mot de passe -->
                                <form action="" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="currentPassword" class="form-label">Mot de passe actuel</label>
                                        <input type="password" class="form-control" id="currentPassword"
                                            name="current_password" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="newPassword" class="form-label">Nouveau mot de passe</label>
                                        <input type="password" class="form-control" id="newPassword"
                                            name="new_password" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="newPasswordConfirmation" class="form-label">Confirmer le nouveau
                                            mot de passe</label>
                                        <input type="password" class="form-control" id="newPasswordConfirmation"
                                            name="new_password_confirmation" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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

</body>

</html>
