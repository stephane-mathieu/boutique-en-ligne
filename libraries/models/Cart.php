<?php

    namespace Models;

    class Cart extends Model {


        public function GetProductId() {

            if (isset($_GET['id'])) {

                $query = "SELECT id, title, price FROM products WHERE id = :id";
                $product_info = $this->pdo->prepare($query);
                $product_info->setFetchMode(\PDO::FETCH_OBJ);
                $product_info->execute(['id'=>$_GET['id']]);

                $product = $product_info->fetchAll();

                return $product;

            }

            else {

                die("Vous n'avez pas sélectionner de produit à ajouter au panier");
            }
        }


        public function AddProduct($product_id) {

            if (isset($_SESSION['cart'][$product_id])) {
                $_SESSION['cart'][$product_id]++;
            }

            else {
                $_SESSION['cart'][$product_id] = 1;
            }
        }


        public function ProductsInCart() {

            if(isset($_SESSION['cart'])) {

                $ids = array_keys($_SESSION['cart']);
                $separator = ",";

                if (empty($ids)) {
                    $products = array();
                }

                else {
                    $query = "SELECT id, title, price, image1, stock FROM products WHERE id IN (".implode($separator, $ids).")";
                    $products_cart = $this->pdo->prepare($query);
                    $products_cart->setFetchMode(\PDO::FETCH_OBJ);
                    $products_cart->execute();

                    $products = $products_cart->fetchAll();

                    var_dump($query);
                    var_dump($products);
                }

                return $products;

               
                
            }

            
            
        }


        public function DeleteProduct ($product_id) {
            var_dump($_SESSION['cart'][$product_id]);
            unset($_SESSION['cart'][$product_id]);
        }

        public function DeleteCart () {

            unset($_SESSION['cart']);
        }


        public function TotalPrice () {

            $total = 0;

            if(isset($_SESSION['cart'])) {

                $ids = array_keys($_SESSION['cart']);
                $separator = ",";

                if (empty($ids)) {
                    $products = array();
                }

                else {
                    $query = "SELECT id, price FROM products WHERE id IN ('".implode($separator, $ids)."')";
                    $products_cart = $this->pdo->prepare($query);
                    $products_cart->setFetchMode(\PDO::FETCH_OBJ);
                    $products_cart->execute();

                    $products = $products_cart->fetchAll();
                }


                foreach($products as $product) { 
                    $total += $product->price * $_SESSION['cart'][$product->id];
                }

            }

            return $total;
        }

        public function Recalculate() {

            foreach($_SESSION['cart'] as $product_id => $quantity ) {

             $_SESSION['cart'][$product_id] = $_POST['cart']['quantity'][$product_id];
            }


        }

        public function CountProducts() {

            if(isset($_SESSION['cart'])) {

                return array_sum($_SESSION['cart']);

            }
            
        }
 
    }

?>