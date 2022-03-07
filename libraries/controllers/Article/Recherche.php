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
        $recherche = htmlspecialchars($_GET['search']);
        $all_products = $this->model->DisplayAllProductsByCat($recherche);
        var_dump($recherche);
        $all_products = $this->model->DisplayAllProducts();
        $all_categories = $this->model->ListingCategories();
        $all_sub_categories = $this->model->ListingSubCategories();

        if(isset($_GET['category'])){
            $nom_categorie = htmlspecialchars($_GET['category']);
            $all_products = $this->model->DisplayAllProductsByCat($nom_categorie);
        }
        
        if(isset($_GET['sub_category'])){
            $nom_sub_categorie = htmlspecialchars($_GET['sub_category']);
            $all_products = $this->model-> DisplayAllProductsBySubCat($nom_sub_categorie);
        }



        $pageTitle = "Produits";
        Renderer::render('articles/produits', compact('pageTitle', 'all_products', 'all_categories', 'all_sub_categories'));


    }


}
