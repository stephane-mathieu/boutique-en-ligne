<?php
namespace Controllers\Admin;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class AdminViewCommande extends Controllers{

    protected $modelName = \Models\Order::class;


    public function AdminViewCommande(){

        session_start();
        $id = $_GET["id"];
        if($_SESSION['role'] == "admin"){
            $Order = $this->model->DisplayOrder($id);
        
            $pageTitle = "adminArticle";
            Renderer::render2('admin/AdminViewCommande', compact('pageTitle','Order'));
        }else{
            Http::redirect("home");
        }

    }




}

?>