<?php
namespace Controllers\Article;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class Produits extends Controllers{

    protected $modelName = \Models\Article::class;

    public function Produit(){

        session_start();

        $pageTitle = "Produit";
        Renderer::render('articles/produit', compact('pageTitle'));


    }


}







?>