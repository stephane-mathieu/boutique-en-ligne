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
        
            $pageTitle = "Produits";
            Renderer::render2('articles/produits', compact('pageTitle'));
        

    }




}

?>