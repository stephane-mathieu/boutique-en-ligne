<?php
namespace Controllers\User;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class Inscription extends Controllers{

    protected $modelName = \Models\User::class;

    public function Inscription(){
       
        $check = true;

        $display_form = 1;

        $droits = "utilisateur";
        var_dump($droits);
        if(isset($_POST['submit'])){

            $password = htmlspecialchars($_POST['password']);
            $email = htmlspecialchars(trim($_POST['email']));
            $number = htmlspecialchars(trim($_POST['number']));
            $firstname = htmlspecialchars(ucwords(strtolower(trim($_POST['firstname']))));
            $lastname = htmlspecialchars(ucwords(strtolower(trim($_POST['lastname']))));
            $address = htmlspecialchars($_POST['address']);
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
            $date = date('Y-m-d H:i');

            //recupere les informations de lutilisateur choisis pour verifier si il ya pas deja le meme login
            $checkemail = $this->model->findAllInfoUser($email);

            if(empty($_POST['email'])){
                $check = false;
                $error_email = "Renseignez une adresse email.";
                $email = "";
                echo "error mail vide";
            }

            elseif(filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
                $valid=false;
                $error_email = "Votre email n'est pas au bon format : example@gmail.";
                $email="";
                echo "error mail format";
            }

            if(count($checkemail) != 0){
                $check = false;
                $error_email = "Cet email est déjà utilisé.";
                $email = "";
                echo "erreur mail utilisé";
            }

            if(empty($password)){
                $check = false;
                $error_password = "Renseignez votre mot de passe.";
                $password = '';
                echo "error password vide";
            }

            elseif( strlen($password) < 10 ) {
                $check = false;
                $error_password = "Le mot de passe doit être au moins de 10 caractères.";
                $password = '';
                echo "err password longueur";
            }

            elseif(!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]/',$password)) {
                $error_password = "Le mot de passe ne respecte pas les conditions.";
                $check = false;
                $password='';
                echo "err password conditions";

            }

            if(empty($_POST['number'])){
                $check = false;
                $error_number = "Renseignez votre numéro de téléphone mobile.";
                $number ='';
                echo "number vide";
            }

            elseif(!is_numeric($number)){
                $check = false;
                $error_number = "Votre numéro de téléphone n'est pas au bon format.";
                $number = '';
                echo "error number non numérique";
            }

            elseif(strlen($number) != 10 ) {
                $check = false;
                $error_number = "Votre numéro de téléphone doit contenir 10 chiffres.";
                $number = '';
                echo "error number moins 10";

            }

            if(empty($_POST['firstname'])){
                $check = false;
                $error_firstname = "Renseignez votre prénom.";
                echo "error firstname vide";
            }

            elseif (!preg_match("#^[a-zA-Z]+$#", $firstname)) {
                $check = false;
                $error_firstname ="Votre prénom n'est pas au bon format.";
                $firstname = '';
                echo "error firstname chiffres";
            }

            if(empty($_POST['lastname'])){
                $check = false;
                $error_lastname = "Veuillez renseigner votre nom.";
                echo "error lastname vide";
            }

            elseif (!preg_match("#^[a-zA-Z]+$#", $lastname)) {
                $check = false;
                $err_lastname ="Votre nom n'est pas au bon format;";
                $lastname = '';
                echo "error lastname chiffres";
            }

            
            if(empty($_POST['address'])){
                $check = false;
                $error_adress = "Renseignez votre adresse.";
                echo "error adresse vide";
                
            }


            if($password != $password_confirm){
                $check = false;
                $error_password_confirm = "Les mots de passe ne correspondent pas.";
                $password = '';
                $password_confirm ='';
                echo "error confirm password";
            }


            if($check){
                $password = password_hash($password, PASSWORD_BCRYPT);
                // insert les donner dans la bdd
                $add_user= $this->model->InsertUser($firstname,$lastname,$email,$password,$number,$address,$date,$droits);
                $message = "<h5>Inscription réussie ! Connectez vous <a href='connexion'><strong>ici</strong></a></h5>";
                // ferme le formulaire
                $display_form = 0;
            }
        }

        $pageTitle = "inscription";
        Renderer::render('users/inscription',compact('pageTitle', 'display_form', 'error_firstname', 'error_lastname', 'error_email', 'error_address', 'error_password', 'error_password_confirm', 'firstname', 'lastname', 'email', 'address', 'message'));
    }

}

?>