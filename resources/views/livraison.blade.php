@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-body">
                    <!-- Message personnalisé -->
                    <h5 class="card-title">Votre commande est en attente de finalisation</h5>
                    <p class="card-text">{{ $message }}</p>
                    
                    <!-- Affichage du QR Code -->
                    @if (isset($qrCodePath))
                        <div class="my-4">
                            <img src="{{ asset($qrCodePath) }}" alt="QR Code de la commande" class="img-fluid" style="max-width: 250px;">
                        </div>
                    @endif
                    
                    <!-- Bouton de retour ou autre action -->
                    <a href="/" class="btn btn-primary">Retour à l'accueil</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
