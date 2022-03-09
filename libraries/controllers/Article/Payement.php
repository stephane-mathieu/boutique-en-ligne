<?php
namespace Controllers\Article;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class Payement extends Controllers{

    protected $modelName = \Models\Article::class;

    public function Payement(){

        session_start();

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
                Http::redirect("indexpayement");
            }
            $pageTitle = "Payement";
            Renderer::render('articles/payement', compact('pageTitle','intent'));
    
      

    }


}
