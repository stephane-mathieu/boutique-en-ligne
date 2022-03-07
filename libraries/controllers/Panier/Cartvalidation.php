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

        $model = new \Models\Order();

        $cart_to_order = $this->model->CartToOrder();

        $pageTitle = "Validation_panier";
        Renderer::render('articles/cartvalidation', compact('pageTitle','model'));

    }
}