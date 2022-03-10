<?php
namespace Controllers\Article;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class Indexpayement extends Controllers{

    protected $modelName = \Models\Article::class;

    public function IndexPayement(){

        session_start();
      
        $id = $_SESSION['order'];
        
        Http::redirect("RecapPayement?id=$id");
            $pageTitle = "IndexPayement";
            Renderer::render('articles/Indexpayement', compact('pageTitle'));
    
      

    }


}
