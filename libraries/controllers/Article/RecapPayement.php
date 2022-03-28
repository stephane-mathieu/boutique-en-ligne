<?php

namespace Controllers\Article;

use AltoRouter;
use Models\Http;
use Stripe\Order;
use Stripe\Stripe;
use Models\Renderer;
use Stripe\PaymentIntent;
use Controllers\Controllers;

class RecapPayement extends Controllers
{

    protected $modelName = \Models\Order::class;

    public function RecapPayement(){

        session_start();
        
        $id_order = $_SESSION['order'];

        echo $id_order;

        $payment_state ='Payée';

        // statut du paiement passe en "Payé".

        $confirm_payment = $this->model->ConfirmPayment($id_order, $payment_state);

        // ajout des dates min et max de livraison / entre 5 et 10 jours ouvrés après le paiement

        $order = $this->model->DisplayOrder($id_order);

        // update du stock des articles

        $ModelArticle = new \Models\Article();

        foreach ($order as $product) {
            $product_id = $product['id_product'];
            $stock = $ModelArticle->ProductStock($product_id);
           

            var_dump($stock);

            $new_stock = $stock - $product['quantity'];

            var_dump($new_stock);

            $update_stock = $ModelArticle->UpdateStock($product_id, $new_stock);
    

        }


        $model = new \Models\Shipping();

        $now = date('Y-m-d');

        // date minimum de livraison => 5 jours après le paiement
        $min_date = strtotime($now . "+5days");
        $min_date = date('Y-m-d', $min_date);

        // date maximum de livraison => 10 jours après le paiement
        $max_date = strtotime($now . "+10days");
        $max_date = date('Y-m-d', $max_date);

        $model = new \Models\Shipping();

        $shipping_dates = $model->ShippingDates($id_order, $min_date, $max_date);

        Http::redirect('macommande?id='.$id_order.'');



        $pageTitle = "RecapPayement";
        Renderer::render('articles/RecapPayement', compact('pageTitle'), 'order');
    }
}
