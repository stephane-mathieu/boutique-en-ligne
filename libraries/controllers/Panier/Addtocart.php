<?php

namespace Controllers\Panier;

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
        var_dump($product);
        


        if (empty($product))  {
            die("Ce produit n'existe pas.");
        }

        $ModelArticle = new \Models\Article();
        $id_product = $product[0]->id;
        $verif_stock = $ModelArticle->ProductStock($id_product);
        if ($verif_stock > 0){
            $cart = $this->model->AddProduct($product[0]->id);
            die('Le produit a bien été ajouté à votre panier <a href="produits">retourner sur le catalogue</a>');
        }else {
                echo "Votre produit est en rupture de stock";
        }
        var_dump($verif_stock);



        // Http::redirect("panier");


        $pageTitle = "Ajouter_au_panier";


        Renderer::render('articles/addtocart', compact('pageTitle','model','product'));
      

    }


}