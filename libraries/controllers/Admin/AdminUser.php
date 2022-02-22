<?php
namespace Controllers\Admin;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class AdminUser extends Controllers{

    protected $modelName = \Models\User::class;

    public function AdminUser(){
        session_start();
        if($_SESSION['role'] == "admin"){
            $user= $this->model->findAllUser();
            $pageTitle = "AdminUSer";
            Renderer::render2('admin/AdminUser', compact('pageTitle','user'));
    
        }else{
            Http::redirect("home");
        }
      
    }
}

?>