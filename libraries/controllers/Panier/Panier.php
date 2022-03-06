<?php
namespace Controllers\Panier;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class Panier extends Controllers{

  protected $modelName = \Models\Cart::class;

  public function Panier(){

    $model = new \Models\Cart();
    
    session_start();

    $products = $this->model->ProductsInCart();

    $total = $this->model->TotalPrice();
    $panier = '';
    $delete_cart = '';

    if (isset($_GET['del'])) {
      $panier = $this->model->DeleteProduct($_GET['del']);
    }

    if (isset($_GET['DelCart'])) {
      $delete_cart = $this->model->DeleteCart();

    }

    if (isset($_POST['cart'])) {
      $recalculate = $this->model->Recalculate();
    }

    $products_number = $this->model->CountProducts();

    

    $pageTitle = "Panier";
    Renderer::render('articles/panier', compact('pageTitle','model','products', 'panier', 'total', 'products_number', 'delete_cart', 'recalculate'));
      

  }


}







?>