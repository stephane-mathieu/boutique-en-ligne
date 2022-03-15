<?php
namespace Controllers\Article;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class IndexPayement extends Controllers{

    protected $modelName = \Models\Article::class;

    public function IndexPayement(){

        session_start();
      
        
        
        Http::redirect("RecapPayement?id=".$_SESSION['order']."");
        $pageTitle = "IndexPayement";
        Renderer::render('articles/Indexpayement', compact('pageTitle'));

      

    }


}
