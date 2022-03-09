<?php
namespace Controllers\Panier;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class Cartvalidation extends Controllers{

    protected $modelName = \Models\Order::class;

    public function CartValidation() {

        session_start();
        
        $id_user = $_SESSION['userId'];
        $date = date('Y-m-d');
        $model = new \Models\Cart();
        $productcart = $model->ProductsInCart();
        $excl_taxe_price = number_format($model->TotalPrice(), $decimals=2);
        $tva = 20;
        $vat = number_format($excl_taxe_price * ($tva/100), $decimals = 2);
        $incl_taxe_price = number_format($excl_taxe_price + $vat, $decimals=2) ;
        $payment_state ='En attente';
        $state = 'En attente de paiement';

        $id_order = $this->model->CreateOrder($_SESSION['cart'], $id_user, $date, $productcart, $excl_taxe_price, $vat, $incl_taxe_price, $payment_state, $state);

        $pageTitle = "Validation_panier";

        Header('Location: livraison?order='.$id_order.'');
        Renderer::render('articles/cartvalidation', compact('pageTitle'));

    }
}