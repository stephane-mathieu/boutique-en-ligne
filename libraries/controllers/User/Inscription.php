<?php
namespace Controllers\User;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class Inscription extends Controllers{

    protected $modelName = \Models\User::class;

    public function inscription(){
        // insert un user
        $check = true;
        if(isset($_POST['submit'])){
            // Erreurs possibles
            $errors = array();
            // $login = $_POST['login'];
            $password = htmlspecialchars($_POST['password']);
            $email = htmlspecialchars($_POST['email']);
            $NumberPhone = htmlspecialchars($_POST['number']);
            $firstname = htmlspecialchars($_POST['firstname']);
            $lastname = htmlspecialchars($_POST['lastname']);
            $adress = htmlspecialchars($_POST['adress']);
            $date = date('Y-m-d H:i');
            $droits = "utilisateur";
            $point = strpos($email, ".");
            $aroba = strpos($email, "@");

            //recupere les informations de lutilisateur choisis pour verifier si il ya pas deja le meme login
            $checkemail = $this->model->findAllInfoUser($email);

            if(count($checkemail) != 0){
                $check = false;
                $errors['email'] = "email not available";
                echo $errors['email'];
            }
            if(empty($_POST['email'])){
                $check = false;
                $errors['email'] = "You must enter a valid email";
                echo $errors['email'];
                echo "email";
            }else if ($point === false){
                $check = false;
                echo 'Votre email doit comporter un point.';
            }
		    else if ($aroba === false){
                $check = false;
                echo 'Votre email doit comporter un arobase.';
            }

            if(empty($_POST['password'])){
                $check = false;
                $errors['password'] = "You must enter a valid password";
                echo $errors['password'];
            }

            if(empty($_POST['number'])){
                $check = false;
                $errors['number'] = "You must enter a valid number";
                echo $errors['number'];
            }
            if(!is_numeric($_POST['number'])){
                $check = false;
                echo "pas bon format nombre";
            }
            if(empty($_POST['firstname'])){
                $check = false;
                $errors['firstname'] = "You must enter a valid firstname";
                echo $errors['password'];
            }
            if(empty($_POST['lastname'])){
                $check = false;
                $errors['lastname'] = "You must enter a valid lastname";
                echo $errors['lastname'];
            }
            if(empty($_POST['adress'])){
                $check = false;
                $errors['password'] = "You must enter a valid adress";
                echo $errors['adress'];
            }


            if($_POST['password'] != $_POST['password_confirm']){
                $check = false;
                $errors['password_confirm'] = "Your password doesn't match";
                echo $errors['password_confirm'];
            }


                if($check){
                $password = password_hash($password, PASSWORD_BCRYPT);
                // insert les donner dans la bdd
                $addUser= $this->model->insertUser($firstname,$lastname,$email,$password,$NumberPhone,$adress,$date,$droits);
                    session_start();
                    $_SESSION['flash']['sucess'] = "Your account has been create, you can now log in. ";
                    Http::redirect("connexion");
                    echo "inscription good";
                }
    }

        $pageTitle = "inscription";
        Renderer::render('users/inscription',compact('pageTitle'));
    }

}

?>