<?php
namespace Controllers\User;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class Profil extends Controllers{

    protected $modelName = \Models\User::class;
    public function profil(){
        // update le login
        session_start();
      
        if(isset($_SESSION['email'])){

            //recup de la session conn
            @$sessLogin = $_SESSION['email'];
            @$sessPasswrd = $_SESSION['Pass'];
            @$id = $_SESSION['userId'];
            @$newlog = $_POST['login'];

            if (isset($_SESSION['email'])) {
                // recup email et password
                $recuper = $this->model->findInfoUser($id);

                if(isset($_POST['submit'])){
                    $password = $_POST['password'];
                    $email = $_POST['email'];
                    $NumberPhone = $_POST['number'];
                    $firstname = $_POST['firstname'];
                    $lastname = $_POST['lastname'];
                    $adress = $_POST['adress'];
                    $password = password_hash($password, PASSWORD_BCRYPT);
                    // insert les donner dans la bdd
                    $addUser= $this->model->UpdateProfil($email,$firstname,$lastname,$password,$adress,$NumberPhone,$id);
                    Http::redirect("profil");
                }
            }
            
                $pageTitle = "profil";
                Renderer::render('users/profil', compact('pageTitle','recuper'));
        }
}


}

?>