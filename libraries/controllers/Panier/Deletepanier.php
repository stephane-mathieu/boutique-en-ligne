<?php
namespace Controllers\Panier;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class Deletepanier extends Controllers{

   protected $modelName = \Models\Article::class;

   public function DeletePanier(){
      session_start();

     $id_session = $_GET['id'];
     unset($_SESSION['panier'][$id_session]);
     Http::redirect("panier");

    }


}







?>