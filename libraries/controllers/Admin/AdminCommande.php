<?php
namespace Controllers\Admin;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class AdminCommande extends Controllers{

    protected $modelName = \Models\Order::class;


    public function AdminCommande(){

        session_start();
        if($_SESSION['role'] == "admin"){
            $Order = $this->model->DisplayAllOrder();
            
        
            $pageTitle = "adminArticle";
            Renderer::render2('admin/AdminCommande', compact('pageTitle','Order'));
        }else{
            Http::redirect("home");
        }

    }




}

?>