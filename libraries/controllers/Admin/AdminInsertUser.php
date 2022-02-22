<?php
namespace Controllers\Admin;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class AdminInsertUser extends Controllers{

    protected $modelName = \Models\User::class;


    public function AdminInsert(){
        session_start();
        if($_SESSION['role'] == "admin"){

            if(!empty($_POST)){


                if ($_POST["droits"] == 'utilisateur') {
                    $droits = "utilisateur";
                }
                else if ($_POST["droits"] == 'moderateur') {
                    $droits = "moderateur";
                }
                else if ($_POST["droits"] == 'administrateur') {
                    $droits = "admin";
                }
                // Erreurs possibles
                $errors = array();
                // $login = $_POST['login'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $NumberPhone = $_POST['number'];
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $adress = $_POST['adress'];
                $date = date('Y-m-d H:i');
    
                // if(empty($_POST['login'])){
                //     $errors['login'] = "Your login is not valid";
                // } else {
                //     //recupere les informations de lutilisateur choisis pour verifier si il ya pas deja le meme login
                //     $loginCheckResult= $this->model->findAllInfoUser($email);
                //     if(count($loginCheckResult) != 0){
                //     // $errors['login'] = "Login not available";
                //     echo '<div class=" alert12  text-white ">';
                //     echo "Your login is not valid";
                //     echo '</div>';
                //     }
                // }
    
                if(empty($_POST['password'])){
                    $errors['password'] = "You must enter a valid password";
                    echo $errors['password'];
                }
    
                if (empty($errors)){
                    $password = password_hash($password, PASSWORD_BCRYPT);
                    // insert les donner dans la bdd
                    $addUser= $this->model->insertUser($firstname,$lastname,$email,$password,$NumberPhone,$adress,$date,$droits);
    
                    session_start();
                    $_SESSION['flash']['sucess'] = "Your account has been create, you can now log in. ";
                    Http::redirect("adminuser");
                    echo "inscription good";
                }
                
            }
            $pageTitle = "adminInsert";
            Renderer::render2('admin/AdmincreeUser', compact('pageTitle'));
        }else{
            Http::redirect("home");
        }


    }
}

?>