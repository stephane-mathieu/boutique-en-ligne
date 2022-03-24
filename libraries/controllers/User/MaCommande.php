<?php
namespace Controllers\User;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class MaCommande extends Controllers{

    protected $modelName = \Models\Order::class;

    public function MaCommande(){

        session_start();
        $id_order = $_GET['id'];
       
        session_start();


        $order = $this->model->DisplayOrder($id_order);

        $model = new \Models\Shipping();

        $shipping = $model->DisplayShipping($id_order);

        $idu = $_GET['idu'];
        $allcommandes = $this->model->SelectOrderByUser($idu);

        if(isset($_POST['update_order'])) {

            $model = new \Models\Shipping();

            $delete_shipping = $model->DeleteShipping($id_order);

            $delete_order = $this->model->DeleteOrder($id_order);

            header('Location: panier');
            
        }

       
        if(isset($_POST['confirm_order'])) {
            var_dump($_SESSION['cart']);
            $state = "Confirmée";
            $confirm = $this->model->OrderValidation($id_order, $state);
            
            $model = new \Models\Cart();
            $delete = $model->DeleteCart();
            Http::redirect("payement?id=$id_order");

            
        }
        $pageTitle = "MaCommande";
        Renderer::render('users/macommande',compact('pageTitle','commandes','model','order', 'shipping', 'id_order','allcommandes','idu'));
    }

}

?>