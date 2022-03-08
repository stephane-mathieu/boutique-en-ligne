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




        public function CreateOrder($total,$date,$id_user,$productcart,$sessioncart) {

            $data = [
                'incl_taxe_price' => $total,
                'date' => $date,
                'id_user' =>$id_user,
            ];
            $query = "INSERT INTO `orders`( `incl_taxe_price`, `date`, `id_user`) VALUES (:incl_taxe_price, :date, :id_user)";
            $products_cart = $this->pdo->prepare($query);
            $products_cart->execute($data);

            $query2 = "SELECT id FROM orders ORDER BY id DESC LIMIT 1";
            $id_order = $this->pdo->prepare($query2);
            $id_order->setFetchMode(\PDO::FETCH_ASSOC);
            $id_order->execute();

            $id_order1 = $id_order->fetchAll();
            var_dump($productcart);

            foreach ($products_cart as $product){
                $data2 = [
                    'product_id'=>$product['id'],
                    'id_order' =>$id_order1,
                ];

                $query3 = "INSERT INTO products_order (id_product, id_order) VALUES (:product_id, :id_order)";
                $insert = $this->pdo->prepare($query3);
                $insert->execute();
            }
            foreach ($sessioncart as $quantity)
            {
                // $query4 = "INSERT INTO product_order (quantite) VALUE (:quantite) WHERE id_order = :id_order";
                // $insert2 = $this->pdo->prepare($query4);
                // $insert2->execute(['quantite'=>$quantity]);
                var_dump($quantity);
            }

            return $id_order1;

        }
    }

?>