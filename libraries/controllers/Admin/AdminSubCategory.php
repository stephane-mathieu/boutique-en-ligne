<?php
namespace Controllers\Admin;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class AdminSubCategory extends Controllers{

    protected $modelName = \Models\Categories::class;

    public function AdminSubCategory(){
        session_start();
        if($_SESSION['role'] == "admin"){
            $category = $this->model->DisplayCategoriesSubCategories();
            $pageTitle = "AdminCategory";
            Renderer::render2('admin/AdminSubCategory', compact('pageTitle','category'));
        }else{
            Http::redirect("home");
        }
    }

}

?>