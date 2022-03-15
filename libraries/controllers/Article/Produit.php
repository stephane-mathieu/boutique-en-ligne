<?php
namespace Controllers\Article;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class Produit extends Controllers{

    protected $modelName = \Models\Article::class;

    public function Produit(){

        session_start();

        if(isset($_GET['id'])){
            $id_article = htmlspecialchars($_GET['id']);
            $article = $this->model->findinfoArticle($id_article);
            $comment = $this->model->DisplayComment($_GET['id']);
            $count = $this->model->Count($_GET['id']);
            $moyenne = $this->model->MoyenneReview($_GET['id']);
            $pageTitle = "Produit";
            Renderer::render('articles/produit', compact('pageTitle','article','comment','count','moyenne'));
            
        }else
        Http::redirect("produits");
      

    }


}
