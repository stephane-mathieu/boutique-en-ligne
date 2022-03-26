<?php
namespace Controllers\User;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class UpdateInfos extends Controllers{

    protected $modelName = \Models\User::class;
    public function updateinfos(){
        // update le login
        session_start();
        $valid = true;
      
        if(isset($_SESSION['email'])){

            //recup de la session conn
            @$sessLogin = $_SESSION['email'];
            @$sessPasswrd = $_SESSION['Pass'];
            @$id = $_SESSION['userId'];
            @$newlog = $_POST['login'];

            if (isset($_SESSION['email'])) {
                // recup email et password
                $infos = $this->model->findInfoUser($id);

                if(isset($_POST['submit'])){

                    $firstname = htmlspecialchars(ucwords(strtolower(trim($_POST['firstname']))));
                    $lastname = htmlspecialchars(ucwords(strtolower(trim($_POST['lastname']))));
                    $number = htmlspecialchars(trim($_POST['number']));
                    $address = htmlspecialchars(trim($_POST['address']));
                    $email = htmlspecialchars(trim($_POST['email']));
                    $password = htmlspecialchars(trim($_POST['password']));

                    //recupere les informations de lutilisateur choisis pour verifier si il ya pas deja le meme login
                    $checkemail = $this->model->findAllInfoUser($email);

                    if(empty($_POST['email'])){
                        $valid = false;
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

                    if( $infos[0]['email'] != $email ) {
                        if(count($checkemail) != 0){
                            $valid = false;
                            $error_email = "Cet email est déjà utilisé.";
                            $email = "";
                            echo "erreur mail utilisé";
                        }
                    }

                    if(empty($number)){
                        $valid = false;
                        $error_number = "Renseignez votre numéro de téléphone mobile.";
                        $number ='';
                        echo "number vide";
                    }

                    elseif(!is_numeric($number)){
                        $valid = false;
                        $error_number = "Votre numéro de téléphone n'est pas au bon format.";
                        $number = '';
                        echo "error number non numérique";
                    }

                    elseif(strlen($number) != 10 ) {
                        $valid = false;
                        $error_number = "Votre numéro de téléphone doit contenir 10 chiffres.";
                        $number = '';
                        echo "error number moins 10";

                    }

                    if(empty($firstname)){
                        $valid = false;
                        $error_firstname = "Renseignez votre prénom.";
                        echo "error firstname vide";
                    }

                    elseif (!preg_match("#^[a-zA-Z]+$#", $firstname)) {
                        $valid = false;
                        $error_firstname ="Votre prénom n'est pas au bon format.";
                        $firstname = '';
                        echo "error firstname chiffres";
                    }

                    if(empty($lastname)){
                        $valid = false;
                        $error_lastname = "Veuillez renseigner votre nom.";
                        echo "error lastname vide";
                    }
                    
                    elseif (!preg_match("#^[a-zA-Z]+$#", $lastname)) {
                        $valid = false;
                        $err_lastname ="Votre nom n'est pas au bon format;";
                        $lastname = '';
                        echo "error lastname chiffres";
                    }

                    
                    if(empty($address)){
                        $valid = false;
                        $error_address = "Renseignez votre adresse.";
                        echo "error adresse vide";
                        
                    }

                    
                    if(empty($password)){
                        $valid = false;
                        $error_password = "Renseignez votre mot de passe.";
                        $password = '';
                        echo "error password vide";
                    }

                    if($valid) {

                        if(password_verify($password,$infos[0]['password'] ) ) {
                            $update = $this->model->UpdateProfil($email, $firstname, $lastname,$address, $number, $id );
                            $_SESSION['email'] = $email ;
                            $_SESSION['userId'] = $id ;
                            header('Location: compte') ;
                        } else { 
                            $error_password ="Le mot de passe est incorrect.";
                        }

                    }

    
                }
            }
            
            $pageTitle = "updateinfos";
            Renderer::render('users/updateinfos', compact('pageTitle','infos', 'email', 'firstname', 'lastname', 'address', 'password', 'number', 'error_email', 'error_firstname', 'error_lastname', 'error_address', 'error_password' ));
        }
}


}

?>