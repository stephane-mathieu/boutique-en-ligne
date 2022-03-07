<?php

namespace Controllers\Panier;

use Cart;
use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class AddToCart extends Controllers{

   protected $modelName = \Models\Cart::class;

    public function AddToCart() {

        session_start();

        $model = new \Models\Cart();

        $product = $this->model->GetProductId();

        if (empty($product))  {
            die("Ce produit n'existe pas.");
        }

        $cart = $this->model->AddProduct($product[0]->id);
        die('Le produit a bien été ajouté à votre panier <a href="produits">retourner sur le catalogue</a>');


        $pageTitle = "Ajouter_au_panier";


        Renderer::render('articles/addtocart', compact('pageTitle','model','product'));
      

    }


}