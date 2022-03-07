<?php

    namespace Models;

    class Order extends Model {
        
        public function CartToOrder () {
            var_dump($_SESSION['cart'][$product_id]);
        }
    }

?>