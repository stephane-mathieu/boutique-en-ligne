<?php
namespace Controllers\Admin;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class AdminCreateCategoryAndSubCategory extends Controllers{

    protected $modelName = \Models\Categories::class;

    public function AdminCreateCategoryAndSubCategory(){
        session_start();
        if($_SESSION['role'] == "admin"){
            if(isset($_POST['submit'])){
                $title = htmlspecialchars($_POST['title']);
                $description = htmlspecialchars($_POST['description']);
                $insert = $this->model->InsertCategory($title, $description);
                Http::redirect("adminArticle");
            }
           
            $pageTitle = "AdminCreateCategoryAndSubCategory";
            Renderer::render2('admin/AdminCreeCategoryAndSubCategory', compact('pageTitle'));
        }else{
            Http::redirect("home");
        }
    }

}

?>