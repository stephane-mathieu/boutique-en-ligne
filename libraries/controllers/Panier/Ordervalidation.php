<?php

    namespace Controllers\Panier;

    use AltoRouter;
    use Models\Http;
    use Models\Renderer;
    use Controllers\Controllers;

    class Ordervalidation extends Controllers{

        protected $modelName = \Models\Order::class ;

        public function OrderValidation() { 

            $model = new \Models\Order();

            $id_order = (int) $_GET['order'];

            $order = $this->model->DisplayOrder($id_order);

            $pageTitle = "Validation de la commande";
            Renderer::render('articles/ordervalidation', compact('pageTitle','model','order', 'quantity_price', 'tva', 'ttc'));


            

        }
    }
?>
