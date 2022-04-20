<?php
namespace Controllers\Admin;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class AdminArticle extends Controllers{

    protected $modelName = \Models\Article::class;


    public function AdminArticle(){

        session_start();
        if($_SESSION['role'] == "admin"){
            $Article = $this->model->FindAllArticle();

            $pageTitle = "adminArticle";
            Renderer::render2('admin/AdminArticle', compact('pageTitle','Article'));
        }else{
            Http::redirect("home");
        }

    }




}

?>