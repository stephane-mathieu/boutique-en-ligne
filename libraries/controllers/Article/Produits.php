<?php
namespace Controllers\Article;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class Produits extends Controllers{

    protected $modelName = \Models\Article::class;

    public function Produits(){

        session_start();
        
        $all_products = $this->model->DisplayAllProducts();
        $all_categories = $this->model->ListingCategories();
        $all_sub_categories = $this->model->ListingSubCategories();

        if(isset($_GET['type'])){
            $recherche = htmlspecialchars($_GET['type']);
            var_dump($recherche);
            $all_products = $this->model->DisplayAllProductsBySeach("$recherche");
        }

        if(isset($_GET['type'])){
            $nom_categorie = htmlspecialchars($_GET['type']);
            $all_products = $this->model->DisplayAllProductsByCat($nom_categorie);
        }
        
        if(isset($_GET['type'])){
            $nom_sub_categorie = htmlspecialchars($_GET['type']);
            $all_products = $this->model-> DisplayAllProductsBySubCat($nom_sub_categorie);
        }

        

        $pageTitle = "Produits";
        Renderer::render('articles/produits', compact('pageTitle', 'all_products', 'all_categories', 'all_sub_categories'));


    }


}
