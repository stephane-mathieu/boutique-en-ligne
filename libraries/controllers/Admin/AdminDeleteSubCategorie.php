<?php
namespace Controllers\Admin;
use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class AdminDeleteSubCategorie extends Controllers{

    protected $modelName = \Models\Categories::class;

    public function AdminDeleteSubCategories(){

        session_start();
        if($_SESSION['role'] == "admin"){
            $id = $_GET['id'];
            $this->model->DeleteSubCategory($id);
            Http::redirect("adminSubCategory");
            $pageTitle = "adminDeleteSubCategory";
        }else{
            Http::redirect("home");
        }

    }

}

?>