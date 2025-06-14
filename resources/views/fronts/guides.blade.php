@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section class="bg-light text-dark text-center py-5">
    <div class="container">
        <h1 class="display-3 fw-bold">Guide de création de Compte Deriv</h1>
        <p class="lead mt-3">Prêt à commencer ? Suivez notre guide détaillé pour configurer votre compte en quelques minutes !</p>
    </div>
</section>

<!-- Main Content -->
<section class="container py-5">
    <div class="row mb-5">
        <div class="col-lg-10 mx-auto">
            <h2>Pour créer un compte de trading sur Deriv, voici les étapes à suivre :</h2>
            <p>
                <img src="images/deriv.png" alt="deriv_image">
                <h3>1. Accéder au site Deriv</h3>
                <p>👉 Rendez-vous sur le site officiel de Deriv <a href="https://deriv.com">https://deriv.com</a></p>
                <h3>2. S'inscrire</h3>
                <ol>
                    <li>Cliquez sur <strong>"Créer un compte"</strong></li>
                    <li>Choisissez votre méthode d'inscription :</li>
                    <ul>
                        <li>Email</li>
                        <li>Compte Google / Facebook / Apple</li>
                    </ul>
                    <li>Si vous utilisez l'email, entrez votre adresse et validez.</li>
                </ol>
                <h3>3. Vérification de l'email</h3>
                <ul>
                    <li>Vous recevrez un email de confirmation.</li>
                    <li>Cliquez sur le lien pour activer votre compte.</li>
                </ul>
                <h3>4. Configuration du compte</h3>
                <ul>
                    <li>Créez un mot de passe sécurisé.</li>
                    <li>Sélectionnez votre pays de résidence.</li>
                    <li>Acceptez les conditions d'utilisation.</li>
                </ul>
                <h3>5. Création d’un compte de trading</h3>
                <ol>
                    <li>Une fois connecté, cliquez sur <strong>"Comptes réels"</strong> ou <strong>"Comptes démo"</strong>.</li>
                    <li>Choisissez le type de compte :</li>
                        <ul>
                            <li>Compte Deriv Synthetic (pour indices synthétiques comme V75)</li>
                            <li>Compte Forex / Crypto / Commodities (via DMT5)</li>
                        </ul>
                    <li>Sélectionnez la devise de votre compte (USD, EUR, etc.).</li>
                </ol>
                <h3>6. Vérification d’identité (KYC) (Optionnel au début, mais obligatoire pour les retraits)</h3>
                <ul>
                    <li>Fournissez une pièce d’identité (passeport, carte d’identité, permis).</li>
                    <li>Envoyez une preuve d’adresse (facture, relevé bancaire).</li>
                </ul>
                <h3>7. Dépôt et Trading</h3>
                <ul>
                    <li>Déposez des fonds via cartes bancaires, crypto, Skrill, Neteller, etc.</li>
                    <li>Accédez à Deriv Trader, Deriv Bot, ou <a href="https://download.mql5.com/cdn/web/22698/mt5/derivsvg5setup.exe">MT5</a> pour commencer à trader.</li>
                </ul>
            </p>
        </div>
    </div>

    <div class="row mb-5 bg-light p-4 rounded shadow-sm">
        <div class="col-lg-10 mx-auto">
            <h2>Pour ajouter un compte de trading sur MT5 (MetaTrader 5) pour Deriv</h2>
            <p class="mt-2">
                <img src="images/mt5.png" alt="mt5_image">
                <h3>1. Se connecter à Deriv</h3>
                <ul>
                    <li>Va sur <a href="https://deriv.com">Deriv.com</a></li>
                    <li>Connecte-toi à ton compte</li>
                </ul>
                <h3>2. Accéder à Deriv MT5 (DMT5)</h3>
                <ul>
                    <li>Va dans le menu "Trader"</li>
                    <li>Sélectionne Deriv MT5 (DMT5)</li>
                </ul>
                <h3>3. Créer un compte MT5</h3>
                <ul>
                    <li>Clique sur "Créer un compte réel" (ou "Démo" si tu veux tester)</li>
                    <li>Choisis un type de compte :</li>
                    <ul>
                        <li>Compte financier (Trading Forex et Crypto)</li>
                        <li>Compte synthétique (Indice de volatilité, Boom & Crash, etc.)</li>
                        <li>Définis un mot de passe MT5 (différent du mot de passe Deriv)</li>
                    </ul>
                </ul>
                <h3>4. Télécharger et configurer MetaTrader 5</h3>
                <ul>
                    <li>Télécharge MT5 sur ton PC, mobile ou navigateur web</li>
                    <li>Ouvre l'application et clique sur "Se connecter à un compte de trading"</li>
                    <li>Recherches le serveur Deriv correspondant à ton compte :</li>
                    <ul>
                        <li>Deriv-Server → Pour compte réel</li>
                        <li>Deriv-Demo → Pour compte démo</li>
                    </ul>
                    <li>Entre ton Identifiant MT5 (fourni par Deriv) et ton mot de passe</li>
                </ul>
                <h3>5. Déposer de l'argent sur MT5 (si compte réel)</h3>
                <ul>
                    <li>Retourne sur <a href="https://deriv.com">Deriv.com</a></li>
                    <li>Va dans Caissier > Transfert</li>
                    <li>Déplace des fonds de Deriv vers MT5</li>
                </ul>
            </p>
        </div>
    </div>

    
</section>



@endsection