<?php
namespace Controllers\Admin;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class AdminProfil extends Controllers{

    protected $modelName = \Models\User::class;

    public function AdminProfil(){

        session_start();
        if($_SESSION['role'] == "admin"){

            $id_user = $_GET['id'];

            $user = $this->model->findInfoUser($id_user);

            if(isset($_POST['submit'])){
                $password = htmlspecialchars($_POST['password']);
                $email = htmlspecialchars($_POST['email']);
                $NumberPhone = htmlspecialchars($_POST['number']);
                $firstname = htmlspecialchars($_POST['firstname']);
                $lastname = htmlspecialchars($_POST['lastname']);
                $adress = htmlspecialchars($_POST['adress']);
                $id = htmlspecialchars($_POST['id_user']);
                if ($_POST["droits"] == 'utilisateur') {
                    $droits = "utilisateur";
                }
                else if ($_POST["droits"] == 'moderateur') {
                    $droits = "moderateur";
                }
                else if ($_POST["droits"] == 'administrateur') {
                    $droits = "admin";
                }
                var_dump($id);
                    $password = password_hash($password, PASSWORD_BCRYPT);
                    // insert les donner dans la bdd
                    $addUser= $this->model->UpdateAll($email,$firstname,$lastname,$password,$adress,$NumberPhone,$droits,$user[0]['id']);
                    Http::redirect("adminuser");
                }
            $pageTitle = "adminInsert";
            Renderer::render2('admin/AdminProfil', compact('pageTitle','user'));
        }else{
            Http::redirect("home");
        }

        

    }
}

?>