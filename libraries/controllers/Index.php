<?php
namespace Controllers;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class Index extends Controllers{

    protected $modelName = \Models\Article::class;

    public function index() {
        session_start();
        $all_products = $this->model->DisplayAllProducts();
        $pageTitle = "Accueil";
        Renderer::render('users/index',compact('pageTitle','all_products'));
    }

}

?>