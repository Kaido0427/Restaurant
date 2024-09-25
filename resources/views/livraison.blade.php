@extends('layouts.app')

@section('content')
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
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Votre commande est en attente de finalisation</h5>
                        <p class="card-text">{{ $message }}</p>

                        @if (isset($qrCodePath))
                            <div class="my-4">
                                <img src="{{ asset($qrCodePath) }}" alt="QR Code de la commande" class="img-fluid"
                                    style="max-width: 250px;">
                            </div>
                        @endif
                        @auth
                            <!-- Affichage des détails de la commande -->
                            <table class="table mt-4">
                                <thead>
                                    <tr>
                                        <th>Plat</th>
                                        <th>Prix</th>
                                        <th>Quantité</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($commandeMenus as $item)
                                        <tr>
                                            <td>{{ $item->menu->nom }}</td>
                                            <td>{{ $item->menu->prix }} XOF</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->menu->prix * $item->quantity }} XOF</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="3" class="text-end"><strong>Total :</strong></td>
                                        <td><strong>{{ $totalAmount }} XOF</strong></td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- Bouton pour finaliser la commande -->
                            <form action="{{ route('finaliser-commande', ['id' => $commande->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success mt-4">Finaliser la commande</button>
                            </form>
                        @endauth


                        <a href="/" class="btn btn-warning mt-3">Retour à l'accueil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
@endsection
