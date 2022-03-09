<?php
namespace Controllers\Article;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class Recherche extends Controllers{

    protected $modelName = \Models\Article::class;

    public function Produits(){

        session_start();
        $recherche = htmlspecialchars($_GET['type']);
        $all_products = $this->model->DisplayAllProductsByCat($recherche);
        $all_products = $this->model->DisplayAllProducts();
        $all_categories = $this->model->ListingCategories();
        $all_sub_categories = $this->model->ListingSubCategories();

        if(isset($_GET['type'])){
            $recherche = htmlspecialchars($_GET['type']);
            var_dump($recherche);
            $all_products = $this->model->DisplayAllProductsBySeach("$recherche");
        }




        $pageTitle = "Produits";
        Renderer::render('articles/produits', compact('pageTitle', 'all_products', 'all_categories', 'all_sub_categories'));


    }


}
