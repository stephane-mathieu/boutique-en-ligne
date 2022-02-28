<?php
namespace Controllers\Article;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class Produits extends Controllers{

    protected $modelName = \Models\Article::class;

    public function Produits(){

        session_start();

        $all_products = $this->model->DisplayAllProducts();

        
        $pageTitle = "Produits";
        Renderer::render('articles/produits', compact('pageTitle', 'allproducts'));


    }


}







?>