<?php

    namespace Controllers\Panier;

    use AltoRouter;
    use Models\Http;
    use Models\Renderer;
    use Controllers\Controllers;

    class Ordervalidation extends Controllers{

        protected $modelName = \Models\Order::class ;

        public function OrderValidation() { 

            echo"salut";

        }
    }
?>
