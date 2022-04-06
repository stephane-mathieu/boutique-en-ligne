<?php
namespace Controllers\Admin;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class AdminUpdateCategories extends Controllers{

    protected $modelName = \Models\Categories::class;

    public function AdminUpdateCategory(){
        session_start();
        if($_SESSION['role'] == "admin"){
            $id = $_GET['id'];
            if(isset($_POST['submit'])){
                $titre = htmlspecialchars($_POST['titre']);
                $description = htmlspecialchars($_POST['description']);
                $this->model->UpdateCategory($titre,$description,$id);
                Http::redirect("adminCategory");
            }
            $pageTitle ="AdminUpdateCategories";
            Renderer::render2('admin/AdminUpdateCategories', compact('pageTitle'));
        }else{
            Http::redirect("home");
        }
    }

}

?>