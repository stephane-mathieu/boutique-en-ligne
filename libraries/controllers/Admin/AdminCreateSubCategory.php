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

        $categories = $this->model->DisplayCategories();

        if($_SESSION['role'] == "admin"){

            $valid = (boolean) true;
            $err_title='';

            if(isset($_POST['submit'])){

                $title = htmlspecialchars($_POST['title']);
                $category = htmlspecialchars(ucwords(strtolower($_POST['category'])));


                if (empty($title)) {
                    $err_title ="Veuillez renseigner le nom de la sous catégorie";
                    $valid = false;
                }

                if($valid) {
                    $insert = $this->model->InsertSubCategory($title,$category);
                    Http::redirect("adminArticle");
                }
            }
           
            $pageTitle = "AdminCreateSubCategory";
            Renderer::render2('admin/AdminCreeSubCategory', compact('pageTitle', 'categories', 'err_title'));
        }else{
            Http::redirect("home");
        }
    }

}

?>