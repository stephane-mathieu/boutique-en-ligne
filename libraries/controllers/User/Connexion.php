<?php
namespace Controllers\User;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class Connexion extends Controllers{

    protected $modelName = \Models\User::class;
    public function connexion(){

        if(!empty($_POST) && !empty($_POST['email']) && !empty($_POST['password'])){

            @$email = htmlspecialchars($_POST['email']);
            @$password = htmlspecialchars($_POST['password']);
            @$errors = array();

            $user= $this->model->findAllInfoUser($email);

            if(password_verify($password, $user['0']['password'])){
                if($user[0]['role'] == "admin"){
                    session_start();
                    $_SESSION['email'] = $user['0']['email'];
                    $_SESSION['role'] = $user['0']['role'];
                    $_SESSION['Pass'] = $user['0']['password'];
                    $_SESSION['userId'] = $user['0']['id'];
                    $_SESSION['flash']['error'] = "You are logged now. ";
                    Http::redirect("home");
                }else
                    session_start();
                    $_SESSION['email'] = $user['0']['email'];
                    $_SESSION['role'] = $user['0']['role'];
                    $_SESSION['Pass'] = $user['0']['password'];
                    $_SESSION['userId'] = $user['0']['id'];
                    $_SESSION['flash']['error'] = "You are logged now. ";
                    Http::redirect("home");

            }
            else {
                    $errors['connect'] = "Incorrect login or password";
                    echo $errors['connect'];
            }
        }

        $pageTitle = "connexion";

        Renderer::render('users/connexion',compact('pageTitle'));

    }

}

?>