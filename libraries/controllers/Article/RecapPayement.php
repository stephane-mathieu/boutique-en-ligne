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

        $payment_state ='Payée';

        $confirm_payment = $this->model->ConfirmPayment($id_order, $payment_state);

        $model = new \Models\Shipping() ;

        $now = date('Y-m-d');

        // date minimum de livraison => 5 jours après le paiement
        $min_date = strtotime($now . "+5days");
        $min_date = date('Y-m-d', $min_date);

        // date maximum de livraison => 10 jours après le paiement
        $max_date = strtotime($now . "+10days");
        $max_date = date('Y-m-d', $max_date);

        $model = new \Models\Shipping();

        $shipping_dates = $model->ShippingDates($id_order, $min_date, $max_date)

        unset($_SESSION['order']);


        $pageTitle = "RecapPayement";
        Renderer::render('articles/RecapPayement', compact('pageTitle'));
    }
}
