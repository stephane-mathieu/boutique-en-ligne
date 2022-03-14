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
                $recuper = $this->model->findInfoUser($id);

                if(isset($_POST['submit'])){
                    $password = htmlspecialchars($_POST['password']);
                    $email = htmlspecialchars($_POST['email']);
                    $NumberPhone = htmlspecialchars($_POST['number']);
                    $firstname = htmlspecialchars($_POST['firstname']);
                    $lastname = htmlspecialchars($_POST['lastname']);
                    $adress = htmlspecialchars($_POST['adress']);
                    $password = password_hash($password, PASSWORD_BCRYPT);
                    $point = strpos($email, ".");
                    $aroba = strpos($email, "@");
        
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
                        $errors['password'] = "You must enter a new password or you  actualy password";
                        echo $errors['password'];
                    }
                    if(!empty($_POST['password'])){
                        $check = false;
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
        
                    if($check){
                    // insert les donner dans la bdd
                    $addUser= $this->model->UpdateProfil($email,$firstname,$lastname,$password,$adress,$NumberPhone,$id);
                    Http::redirect("profil");
                    }
               
                }
            }
            
                $pageTitle = "updateinfos";
                Renderer::render('users/updateinfos', compact('pageTitle','recuper'));
        }
}


}

?>