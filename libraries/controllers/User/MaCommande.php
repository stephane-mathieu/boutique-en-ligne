<?php
namespace Controllers\User;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class MaCommande extends Controllers{

    protected $modelName = \Models\Order::class;

    public function MaCommande(){

        session_start();
        // $id = $_GET['id'];
        // $commandes = $this->model->DisplayAllOrderbyme($id);
        $pageTitle = "MaCommande";
        Renderer::render('users/macommande',compact('pageTitle'));
    }

}

?>