<?php
namespace Controllers\Panier;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class Panier extends Controllers{

   protected $modelName = \Models\Article::class;

   public function Panier(){

    $model = new \Models\Article();
      session_start();
     
      $_SESSION['idA'] = $_GET['id'];
      $id = $_SESSION['idA'] ;  //id du produit, pourrait être un nombre
        // La ligne suivante remet le tableau à zéro, on ne l'utilise que si il n'existe pas
        if(!isset($_SESSION['panier']))
            $_SESSION['panier'] = array();
        
        // ajout d'un élément
        $_SESSION['panier'][$id] = $id;



      $pageTitle = "Panier";
      Renderer::render('articles/panier', compact('pageTitle','model'));
      

    }


}







?>