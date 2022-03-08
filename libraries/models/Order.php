<?php

    namespace Models;

    class Order extends Model {
        

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

                }

                return $products;

            }

        }




        public function CreateOrder($total,$date,$id_user) {

            $data = [
                'incl_taxe_price' => $total,
                'date' => $date,
                'id_user' =>$id_user,
            ];
            $query = "INSERT INTO `orders`( `incl_taxe_price`, `date`, `id_user`) VALUES (:incl_taxe_price, :date, :id_user)";
            $products_cart = $this->pdo->prepare($query);
            $products_cart->execute();
        }
    }

?>