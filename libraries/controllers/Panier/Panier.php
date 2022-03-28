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

    $total_price = $this->model->TotalPrice();
    $panier = '';
    $delete_cart = '';
    $recalculate ='';
    $delete='';

    if (isset($_GET['del'])) {
      $delete = $this->model->DeleteProduct($_GET['del']);
    }

    if (isset($_GET['DelCart'])) {
      $delete_cart = $this->model->DeleteCart();
      Http::redirect("panier");

    }

    if (isset($_POST['cart']['quantity'])) {
      $recalculate = $this->model->Recalculate();
      header('Location: panier');
    }

    $products_number = $this->model->CountProducts();

    $port = 7.90 ;

    $total_HT = $total_price + $port;

    $tva = $total_HT * 0.2 ;

      $total = $total_HT + $tva;

    $pageTitle = "Panier";
    Renderer::render('articles/panier', compact('pageTitle','model','products', 'panier', 'total_price', 'products_number', 'delete_cart', 'recalculate', 'delete', 'total_HT', 'port', 'tva', 'total'));

  }


}







?>