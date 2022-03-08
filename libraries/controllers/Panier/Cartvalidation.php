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
        $total = $model->TotalPrice();



        $cart2 = $this->model->CreateOrder($total,$date,$id_user);
        var_dump($cart2);


        $pageTitle = "Validation_panier";
        Renderer::render('articles/cartvalidation', compact('pageTitle'));

    }
}