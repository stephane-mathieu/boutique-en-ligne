<?php
namespace Controllers\Admin;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class AdminCreateSubCategory extends Controllers{

    protected $modelName = \Models\Categories::class;

    public function AdminCreateSubCategory(){
        session_start();

        $categories = $this->model->DisplayCategoriesSubCategories();

        var_dump($categories);
        
        if($_SESSION['role'] == "admin"){
            if(isset($_POST['submit'])){
                $title = htmlspecialchars($_POST['title']);
                $description = htmlspecialchars($_POST['description']);
                $insert = $this->model->InsertCategory($title, $description);
                Http::redirect("adminArticle");
            }
           
            $pageTitle = "AdminCreateSubCategory";
            Renderer::render2('admin/AdminCreeSubCategory', compact('pageTitle'));
        }else{
            Http::redirect("home");
        }
    }

}

?>