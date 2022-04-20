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


        $order = $this->model->DisplayOrder($id_order);

        $model = new \Models\Shipping();

        $shipping = $model->DisplayShipping($id_order);
        if(isset($_POST['confirm_order'])){
            Http::redirect("produits");
        }


        $pageTitle = "MaCommande";
        Renderer::render('users/macommande',compact('pageTitle','model','order', 'shipping', 'id_order'));
    }

}

?>