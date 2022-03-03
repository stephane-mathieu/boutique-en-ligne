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

            if(isset($_POST['addtocart'])) {
                $CreateCart = $this->model->CreateCart();
            }   
    
            $pageTitle = "Produit";
            Renderer::render('articles/produit', compact('pageTitle','article', 'CreateCart'));
    
        }else
        Http::redirect("produits");
      

    }


}
