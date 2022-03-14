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

            $password = htmlspecialchars($_POST['password']);
            $email = htmlspecialchars(trim($_POST['email']));
            $NumberPhone = htmlspecialchars(trim($_POST['number']));
            $firstname = htmlspecialchars(ucwords(strtolower(trim($_POST['firstname']))));
            $lastname = htmlspecialchars(ucwords(strtolower(trim($_POST['lastname']))));
            $adress = htmlspecialchars($_POST['adress']);
            $date = date('Y-m-d H:i');
            $droits = "utilisateur";

            //recupere les informations de lutilisateur choisis pour verifier si il ya pas deja le meme login
            $checkemail = $this->model->findAllInfoUser($email);

            if(empty($_POST['email'])){
                $check = false;
                $error_email = "Renseignez une adresse email";
                $email = "";
            }

            elseif(filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
                $valid=false;
                $err_email = "Votre email n'est pas au bon format example@gmail";
                $email="";
            }

            if(count($checkemail) != 0){
                $check = false;
                $error_email = "Cet email est déjà utilisé";
                $email = "";
            }

            if(empty($_POST['password'])){
                $check = false;
                $error_password = "Renseignez votre mot de passe.";
                $password = '';
            }

            elseif( strlen($password) < 10 ) {
                $check = false;
                $error_password = "Le mot de passe doit être au moins de 10 caractères";
                $password = '';
            }

            elseif(!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]$/',$password)) {
                $error_password = "Le mot de passe ne respecte pas les conditions.";
                $check = false;
                $password='';

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