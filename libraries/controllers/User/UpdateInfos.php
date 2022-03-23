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
        $check = true;
      
        if(isset($_SESSION['email'])){

            //recup de la session conn
            @$sessLogin = $_SESSION['email'];
            @$sessPasswrd = $_SESSION['Pass'];
            @$id = $_SESSION['userId'];
            @$newlog = $_POST['login'];

            if (isset($_SESSION['email'])) {
                // recup email et password
                $infos = $this->model->findInfoUser($id);
                var_dump($infos);

                if(isset($_POST['submit'])){

                    $firstname = htmlspecialchars(ucwords(strtolower(trim($_POST['firstname']))));
                    $lastname = htmlspecialchars(ucwords(strtolower(trim($_POST['lastname']))));
                    $number = htmlspecialchars(trim($_POST['number']));
                    $adress = htmlspecialchars(trim($_POST['adress']));
                    $email = htmlspecialchars(trim($_POST['email']));
                    $password = htmlspecialchars(trim($_POST['password']));
                    $password = password_hash($password, PASSWORD_BCRYPT);

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

                    if($infos[0][$password] == $password ) {
                        $update = UpdateProfil($email, $firstname, $lastname,$address, $number, $id );

                    }


    
                }
            }
            
                $pageTitle = "updateinfos";
                Renderer::render('users/updateinfos', compact('pageTitle','recuper'));
        }
}


}

?>