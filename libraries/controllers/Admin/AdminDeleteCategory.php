<?php
namespace Controllers\Admin;
use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class AdminDeleteCategory extends Controllers{

    protected $modelName = \Models\Categories::class;

    public function AdminDeleteCategory(){

        session_start();
        if($_SESSION['role'] == "admin"){
            $id = $_GET['id'];
            $this->model->deleteCategory($id);
            Http::redirect("adminCategory");
            $pageTitle = "adminDeleteCategory";

        }else{
            Http::redirect("home");
        }

    }

}

?>