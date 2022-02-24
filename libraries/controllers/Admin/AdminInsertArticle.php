<?php
namespace Controllers\Admin;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class AdminInsertArticle extends Controllers{

    protected $modelName = \Models\Article::class;

    public function AdminInsertArticle(){
        session_start();
        if($_SESSION['role'] == "admin"){
            // $user= $this->model->findAllUser();
            $pageTitle = "AdminArticle";
            Renderer::render2('admin/AdminCreeArticle', compact('pageTitle',));
    
        }else{
            Http::redirect("home");
        }
    }

}

?>