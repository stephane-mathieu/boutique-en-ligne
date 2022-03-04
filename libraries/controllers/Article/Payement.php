<?php
namespace Controllers\Article;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class Payement extends Controllers{

    protected $modelName = \Models\Article::class;

    public function Payement(){

        session_start();

            $pageTitle = "Payement";
            Renderer::render('articles/payement', compact('pageTitle'));
    
      

    }


}
