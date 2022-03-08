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



        $id_order = $this->model->CreateOrder($total,$date,$id_user,$productcart,$_SESSION['cart']);

        

       


        $pageTitle = "Validation_panier";

        Header('Location: livraison?order="'.$id_order.'"');
        Renderer::render('articles/cartvalidation', compact('pageTitle'));

    }
}