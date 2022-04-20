<?php
namespace Controllers\Admin;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class AdminCreateCategory extends Controllers{

    protected $modelName = \Models\Categories::class;

    public function AdminCreateCategory(){
        session_start();
        if($_SESSION['role'] == "admin"){
            if(isset($_POST['submit'])){
                $title = htmlspecialchars($_POST['title']);
                $insert = $this->model->InsertCategory($title);
                Http::redirect("adminArticle");
            }
           
            $pageTitle = "AdminCreateCategory";
            Renderer::render2('admin/AdminCreeCategory', compact('pageTitle'));
        }else{
            Http::redirect("home");
        }
    }

}

?>