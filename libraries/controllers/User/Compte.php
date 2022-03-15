<?php
namespace Controllers\User;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class Compte extends Controllers{

    protected $modelName = \Models\User::class;

    public function Compte(){

        session_start();

        $email = $_SESSION['email'];
        $id_user = $_SESSION['userId'];
        // var_dump($email);
        // var_dump($_SESSION['role']);

        $user_infos = $this->model->findAllInfoUser($email);
        
        $model_order = new \Models\Order();
        
        $user_orders = $model_order->UserOrders($id_user);
        var_dump($user_orders);
       
        $pageTitle = "compte";
        Renderer::render('users/compte',compact('pageTitle',  'email', 'user_infos','user_orders'));
    }

}

?>