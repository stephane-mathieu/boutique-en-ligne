<?php
namespace Controllers\User;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class UpdatePassword extends Controllers{

    protected $modelName = \Models\User::class;
    public function updatepassword(){
        session_start();

        $id = $_SESSION['userId'];
        $infos = $this->model->findInfoUser($id);
        $valid = true;
        $form = 1 ;

        if(isset($_POST['submit'])) {

            $actual_password=htmlspecialchars(trim($_POST['actual_password']));
            $new_password=htmlspecialchars(trim($_POST['new_password']));
            $confirm_new_password=htmlspecialchars(trim($_POST['confirm_new_password']));

            if(empty($actual_password)) {
                $valid = false;
                $error_actual = "Renseignez votre mot de passe actuel.";
                echo "Renseigner votre mot de passe actuel.";
            }

            else if(!password_verify($actual_password,$infos[0]['password'] )){
                $valid = false;
                $error_actual ="Le mot de passe actuel est incorrect.";
                echo " Le mot de passe actuel est incorrect.";
            }

            if(empty($new_password)) {
                $valid = false;
                $error_new = "Renseignez votre nouveau mot de passe.";
                echo "Renseigner votre nouveau mot de passe.";
            }

            elseif(strlen($new_password) < 10 ) {
                $valid = false;
                $error_new = "Le nouveau mot de passe doit être au moins de 10 caractères.";
                echo "err password longueur";
            }

            elseif(!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]/',$new_password)) {
                $error_new = "Le nouveau mot de passe ne respecte pas les conditions.";
                $valid = false;
                echo "err password conditions";

            }

            elseif(empty($confirm_new_password)) {
                $valid = false;
                $error_confirm = "Confirmez votre nouveau mot de passe.";
                echo "Confirmez votre nouveau de passe.";
            }

            elseif($new_password != $confirm_new_password) {
                $valid = false;
                $error_confirm = "Les mots de passe ne correspondent pas.";
                echo"Les mots de passe ne correspondent pas.";
            }

            if($valid) {
                $new_password = password_hash($new_password, PASSWORD_BCRYPT); 
                $update_pass = $this->model->updatePassword($new_password, $id);
                $form = 0 ;
                $message = "<h5> Modification du mot de passe enregistrée ! Retourner sur votre <a href='compte'><strong>espace personnel</strong>.</a></h5>";
                // ferme le formulaire
               

            }
        }
      
      
            
        $pageTitle = "updatepassword";
        Renderer::render('users/updatepassword', compact('pageTitle', 'error_new', 'error_actual', 'error_confirm', 'form', 'message'));
    }
}



?>