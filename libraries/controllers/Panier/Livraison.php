<?php

namespace Controllers\Panier;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class Livraison extends Controllers{

    protected $modelName = \Models\Shipping::class;

  

  
    $pageTitle = "Livraison";
    Renderer::render('articles/livraison', compact('pageTitle','model');


}



?>