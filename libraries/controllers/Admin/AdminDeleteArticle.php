<?php
namespace Controllers\Admin;
use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class AdminDeleteArticle extends Controllers{

    protected $modelName = \Models\Article::class;

    public function AdminDeleteArticle(){

        session_start();
        if($_SESSION['role'] == "admin"){
            $id = $_GET['id'];
            $this->model->deleteArticle($id);
            Http::redirect("adminArticle");
            $pageTitle = "AdminDeleteArticle";

        }else{
            Http::redirect("home");
        }

    }

}

?>