<?php
namespace Controllers\User;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class MesCommande extends Controllers{

    protected $modelName = \Models\Order::class;

    public function MesCommande(){

        session_start();
        $id = $_GET['id'];
        $commandes = $this->model->DisplayAllOrderbyme($id);
        $pageTitle = "MesCommande";
        Renderer::render('users/mescommandes',compact('pageTitle','commandes'));
    }

}

?>