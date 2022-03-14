<?php
namespace Controllers\Admin;
use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class AdminDeleteCommentaire extends Controllers{

    protected $modelName = \Models\Commentaire::class;

    public function AdminDeleteCommentaire(){

        session_start();
        if($_SESSION['role'] == "admin"){
            $id = $_GET['id'];
            $delete = $this->model->deleteCommentaire($id);
            Http::redirect("admincommentaire");
            $pageTitle = "admindelete";

        }else{
            Http::redirect("home");
        }

    }

}

?>