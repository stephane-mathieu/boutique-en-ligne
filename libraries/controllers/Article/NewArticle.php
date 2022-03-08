<?php
namespace Controllers\Article;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class NewArticle extends Controllers{

    protected $modelName = \Models\Article::class;

    public function NewArticle() {
        session_start();
        $all_products = $this->model->findAllArticleBy3();
        $pageTitle = "Accueil";
        Renderer::render('articles/newarticle',compact('pageTitle','all_products'));
    }

}

?>