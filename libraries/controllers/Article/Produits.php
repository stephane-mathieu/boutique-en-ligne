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

        $pageTitle = "Produits";
        Renderer::render('articles/produits', compact('pageTitle', 'all_products', 'all_categories', 'all_sub_categories'));


    }


}







?>