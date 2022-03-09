<?php

    namespace Controllers\Panier;

    use AltoRouter;
    use Models\Http;
    use Models\Renderer;
    use Controllers\Controllers;

    class Ordervalidation extends Controllers{

        protected $modelName = \Models\Order::class ;

        public function OrderValidation() { 

            $id_order = (int) $_GET['order'];

            $order = $this->model->DisplayOrder($id_order);

            $model = new \Models\Shipping();

            $shipping = $model->DisplayShipping($id_order);

            if(isset($_POST['update_order'])) {

                $model = new \Models\Shipping();

                $delete_shipping = $model->DeleteShipping($id_order);

                $delete_order = $this->model->DeleteOrder($id_order);

                header('Location: panier');
                
            }

            if(isset($_POST['confirm_order'])) {
                $state = "Confirmée";
                $confirm = $this->model->OrderValidation($id_order, $state);
                
            }




            $pageTitle = "Validation de la commande";
            Renderer::render('articles/ordervalidation', compact('pageTitle','model','order', 'shipping', 'id_order'));

            

        }
    }
?>
