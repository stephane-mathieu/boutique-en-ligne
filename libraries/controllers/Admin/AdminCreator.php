<?php
namespace Controllers\Admin;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class AdminCreator extends Controllers{

    protected $modelName = \Models\User::class;


    public function AdminCreator1(){

        session_start();
        if($_SESSION['role'] == "admin"){
            $pageTitle = "adminCreator";
            Renderer::render2('admin/AdminCreator-steph', compact('pageTitle'));
        }else{
            Http::redirect("home");
        }

    }
    public function AdminCreator2(){

        session_start();
        if($_SESSION['role'] == "admin"){
            $pageTitle = "adminCreator";
            Renderer::render2('admin/AdminCreator-thomas', compact('pageTitle'));
        }else{
            Http::redirect("home");
        }

    }

    public function AdminCreator3(){

        session_start();
        if($_SESSION['role'] == "admin"){
            $pageTitle = "adminCreator";
            Renderer::render2('admin/AdminCreator-valentin', compact('pageTitle'));
        }else{
            Http::redirect("home");
        }

    }




}

?>