<?php
namespace Controllers\Admin;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class AdminCommentaire extends Controllers{

    protected $modelName = \Models\Article::class;


    public function Commentaire(){

        session_start();
        if($_SESSION['role'] == "admin"){
            $Commentaire = $this->model->findComment();
        
            $pageTitle = "adminCommentaire";
            Renderer::render2('admin/AdminCommentaire', compact('pageTitle','Commentaire'));
        }else{
            Http::redirect("home");
        }

    }




}

?>