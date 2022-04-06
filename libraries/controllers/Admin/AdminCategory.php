<?php
namespace Controllers\Admin;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class AdminCategory extends Controllers{

    protected $modelName = \Models\Categories::class;

    public function AdminCategory(){
        session_start();
        if($_SESSION['role'] == "admin"){
            $category = $this->model->FindCategory();
            var_dump($category);
            $pageTitle = "AdminCategory";
            Renderer::render2('admin/AdminCategories', compact('pageTitle','category'));
        }else{
            Http::redirect("home");
        }
    }

}

?>