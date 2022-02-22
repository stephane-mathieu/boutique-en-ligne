<?php
namespace Controllers;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class Index extends Controllers{

    protected $modelName = \Models\User::class;

    public function index() {

  
        $pageTitle = "Accueil";
        Renderer::render('users/index',compact('pageTitle'));
    }

}

?>