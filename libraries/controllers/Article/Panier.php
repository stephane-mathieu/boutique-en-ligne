<?php
namespace Controllers\Article;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class Panier extends Controllers{

    protected $modelName = \Models\Article::class;

    public function Panier(){

        session_start();
        
            $pageTitle = "Panier";
            Renderer::render('articles/panier', compact('pageTitle'));
      

    }


}







?>