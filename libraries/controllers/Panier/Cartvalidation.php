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

        $model = new \Models\Cart();

        $cart = $this->model->ProductsInCart() ;

        // var_dump($cart);
        $pageTitle = "Validation_panier";
        Renderer::render('articles/cartvalidation', compact('pageTitle','model'));

    }
}