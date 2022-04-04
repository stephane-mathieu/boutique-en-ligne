<?php
namespace Controllers\Admin;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class AdminCreateCategoryAndSubCategory extends Controllers{

    protected $modelName = \Models\Article::class;

    public function AdminCreateCategoryAndSubCategory(){
        session_start();
        if($_SESSION['role'] == "admin"){

            $pageTitle = "AdminCreateCategoryAndSubCategory";
            Renderer::render2('admin/AdminCreeCategoryAndSubCategory', compact('pageTitle'));
        }else{
            Http::redirect("home");
        }
    }

}

?>