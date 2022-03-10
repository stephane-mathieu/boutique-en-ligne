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
        Http::redirect("RecapPayement");
            $pageTitle = "IndexPayement";
            Renderer::render('articles/Indexpayement', compact('pageTitle'));
    
      

    }


}
