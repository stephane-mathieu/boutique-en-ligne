<?php
namespace Controllers\Admin;
use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class AdminDeleteUser extends Controllers{

    protected $modelName = \Models\User::class;

    public function AdminDeleteUser(){

        session_start();
        if($_SESSION['role'] == "admin"){
            $id = $_GET['id'];
            $this->model->deleteUsers($id);
            Http::redirect("adminuser");
            $pageTitle = "admindelete";

        }else{
            Http::redirect("home");
        }

    }

}

?>