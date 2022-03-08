
<?php

use Stripe\Stripe;
if(isset($_POST['prix']) && !empty($_POST['prix'])){
    // Nous appelons l'autoloader pour avoir accès à Stripe
    require_once('vendor/autoload.php');
    $prix = (float)$_POST['prix'];

    // Nous instancions Stripe en indiquand la clé privée, pour prouver que nous sommes bien à l'origine de cette demande
    \Stripe\Stripe::setApiKey('sk_test_51KMXz2L8eUNbBHo6sgsAeEAIaLa7YN4KePAc6VyIzBD6vYPobi6nvhiIZc2i7IwDQ6mY7st3C9SGpQ8EqTeIa8tt00N7j8mWAF');

    // Nous créons l'intention de paiement et stockons la réponse dans la variable $intent
    $intent = \Stripe\PaymentIntent::create([
        'amount' => $_POST['prix']*100, // Le prix doit être transmis en centimes
        'currency' => 'eur',
    ]);

    // echo '<pre>';
    // var_dump($intent);
    // echo '</pre>';
    // die();

}else{
    header('Location: indexpayement');
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
        <!-- <link rel="stylesheet" href="style/paiement.css" type="text/css"> -->
        <title>Paiement</title>

    </head>
    <body>

    <form method="post">
    <div id="errors"></div>
    <input id="cardholder-name" type="text" placeholder="Titulaire de la carte">
    <div id="card-elements" class="test"></div>
    <div id="card-errors" role="alert"></div>
    <button id="card-button" type="button" data-secret="<?= $intent['client_secret'] ?>">Valider le paiement</button>

    </form>

    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://code.jquery.com/jquery-2.0.2.min.js"></script>
    <script src="js/script.js"></script>
    </body>
</html>
