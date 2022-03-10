<?php
namespace Controllers\Article;

use AltoRouter;
use Models\Http;
use Stripe\Order;
use Stripe\Stripe;
use Models\Renderer;
use Stripe\PaymentIntent;
use Controllers\Controllers;

class Payement extends Controllers{

    protected $modelName = \Models\Order::class;

    public function Payement(){

        session_start();

        $id = $_GET["id"];
        $order = $this->model->SelectOrder($id);
        $price = $order[0]['incl_taxe_price'];

            if(isset($_GET['id'])){
                // Nous appelons l'autoloader pour avoir accès à Stripe
                $prix = (float)$order[0]['incl_taxe_price'];

                // Nous instancions Stripe en indiquand la clé privée, pour prouver que nous sommes bien à l'origine de cette demande
                \Stripe\Stripe::setApiKey('sk_test_51KMXz2L8eUNbBHo6sgsAeEAIaLa7YN4KePAc6VyIzBD6vYPobi6nvhiIZc2i7IwDQ6mY7st3C9SGpQ8EqTeIa8tt00N7j8mWAF');

                // Nous créons l'intention de paiement et stockons la réponse dans la variable $intent
                $intent = \Stripe\PaymentIntent::create([
                    'amount' => $prix*100, // Le prix doit être transmis en centimes
                    'currency' => 'eur',
                ]);

            }else{
                Http::redirect("indexpayement");
            }
            $pageTitle = "Payement";
            Renderer::render('articles/payement', compact('pageTitle','intent','price'));

    }


}
