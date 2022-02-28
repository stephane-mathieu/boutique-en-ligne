<?php
namespace Controllers\Admin;
use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class AdminDashboard extends Controllers{

    protected $modelName = \Models\User::class;

    public function Admin(){
        
        session_start();
        if($_SESSION['role'] == "admin"){
            $user= $this->model->findAllInfoUser($_SESSION['email']);
            $pageTitle = "Admin";
            Renderer::render2('admin/Dashboard', compact('pageTitle','user'));
        }else{
            Http::redirect("home");
        }
    }
}

?>