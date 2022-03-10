<?php
namespace Controllers\Admin;
use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class AdminDeleteCommande extends Controllers{

    protected $modelName = \Models\Order::class;

    public function AdminDeleteCommande(){

        session_start();
        if($_SESSION['role'] == "admin"){
            $id = $_GET['id'];
            $model = new \Models\Shipping();
             $delete_shipping =$model->DeleteShipping($id);
             $delete_order = $this->model->DeleteOrder($id);
            Http::redirect("adminCommande");
            $pageTitle = "admindelete";

        }else{
            Http::redirect("home");
        }

    }

}

?>