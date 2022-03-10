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

    public function RecapPayement()
    {

        session_start();
        var_dump($_GET['id']);

        $confirm_payment = $this->model->ConfirmPayment($id_order);
        $pageTitle = "RecapPayement";
        Renderer::render('articles/RecapPayement', compact('pageTitle'));
    }
}
