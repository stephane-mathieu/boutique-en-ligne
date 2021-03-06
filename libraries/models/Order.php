<?php

namespace Models;
    class Order extends Model {
        
        // retourne un tableau avec tous les éléments du panier à intégrer dans la commande
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



        // Transforme le panier en commande
        public function CreateOrder($sessioncart, $id_user, $date, $productcart, $excl_taxe_price, $vat, $incl_taxe_price, $payment_state, $state) {
      
            // Création de la commande
            $data = [
                'id_user'=>$id_user,
                'date'=>$date,
                'excl_taxe_price'=>$excl_taxe_price,
                'vat'=>$vat,
                'incl_taxe_price'=>$incl_taxe_price,
                'payment_state'=>$payment_state,
                'state'=>$state,
            ];
          
            $query = "INSERT INTO orders (id_user, date, excl_taxe_price, vat, incl_taxe_price, payment_state, state) VALUES (:id_user, :date, :excl_taxe_price, :vat, :incl_taxe_price, :payment_state, :state)";
            $products_cart = $this->pdo->prepare($query);
            $products_cart->execute($data);

            //Récupération de l'id de la commande venant d'être créée
            $query2 = "SELECT id FROM orders ORDER BY id DESC LIMIT 1";
            $id = $this->pdo->prepare($query2);
            $id->setFetchMode(\PDO::FETCH_ASSOC);
            $id->execute();

            $id_order = $id->fetch();
            $id_order = $id_order['id'];


            //insertion dans la table intermédiaire du produit et de l'id de commande liée
            foreach ($productcart as $product){
                $data2 = [
                    'product_id'=>$product->id,
                    'id_order' =>$id_order,
                ];

                $query3 = "INSERT INTO products_orders (id_product, id_order) VALUES (:product_id, :id_order)";
                $insert = $this->pdo->prepare($query3);
                $insert->execute($data2);
            }

            //récupération des id des produits en variable de session en parcourant le tableau de session avec l'id produit en index et la quantité associée
            $ids_product = array_keys($sessioncart);
            
            //parcours le tableau des id en transformant l'id du produit en variable            
            foreach ($ids_product as $id_product) {

                $id_product = (int) $id_product;

                //parcours le tableau des sessions avec l'id produit et la quantité associée et insertion dans la table intermédiaire de la quantité associée au produit et à la commande

                for ($i = $id_product; isset($sessioncart[$i])  ; $i++) {

                    if ( $i ==  $id_product ) {

                        $quantity = (int) $sessioncart[$i];

                        $data = [
                            'quantity'=>$quantity,
                            'id_order'=>$id_order,
                            'id_product'=>$id_product,
                        ];

                        $query4 = "UPDATE products_orders SET quantity = :quantity WHERE id_order = :id_order AND id_product = :id_product ";
                        $insert2 = $this->pdo->prepare($query4);
                        $insert2->execute($data);
                    }                   
                }            
            }

            return $id_order; // retourne l'id order pour le controller qui va rediriger vers la page de livraison concernant la commande enregistrée;
            
        }


        //Retourne un tableau avec toutes les infos d'une commande à afficher
        public function DisplayOrder($id_order) {
            $query = "SELECT orders.id, excl_taxe_price, vat, incl_taxe_price, date, state, payment_state, id_user,  products_orders.id_product, products_orders.quantity, shippings.firstname, shippings.lastname, shippings.address, shippings.zipcode, shippings.city, shippings.country, products.title, products.price
            FROM orders
            INNER JOIN shippings ON shippings.id_order = orders.id
            INNER JOIN products_orders ON products_orders.id_order = orders.id
            INNER JOIN products ON products.id = products_orders.id_product
            WHERE orders.id = :id_order
            AND products_orders.id_order = :id_order";

            $display = $this->pdo->prepare($query);
            $display->setFetchMode(\PDO::FETCH_ASSOC);
            $display->execute(['id_order'=>$id_order]);

            $order = $display->fetchAll();

            return $order;
        }

        //Supprime une commande
        public function DeleteOrder($id_order) {

            $query = "DELETE FROM products_orders WHERE id_order = :id_order";
            $delete = $this->pdo->prepare($query);
            $delete->execute(['id_order'=>$id_order]);

            $query2 = "DELETE FROM orders WHERE id = :id_order";
            $delete2 = $this->pdo->prepare($query2);
            $delete2->execute(['id_order'=>$id_order]);

        }

        //Marque une commande comme étant confirmée dans la bdd
        public function OrderValidation($id_order, $state) {

            $data = [
                'state'=>$state,
                'id_order'=>$id_order,
            ];

            $query = "UPDATE orders SET state = :state WHERE id = :id_order ";
            $validation = $this->pdo->prepare($query);
            $validation->execute($data);

            

        }


        //Retourne un tableau avec toutes les infos d'une commande
        public function SelectOrder($id){
            $query = "SELECT * FROM `orders` WHERE ID = '$id'";
            $order_cart = $this->pdo->prepare($query);
            $order_cart->setFetchMode(\PDO::FETCH_ASSOC);
            $order_cart->execute();

            $order = $order_cart->fetchAll();

            return $order;
        }

        //Retourne un tableau avec toutes les commandes
        public function DisplayAllOrder(){
            $query = "SELECT * FROM `orders`";
            $order_cart = $this->pdo->prepare($query);
            $order_cart->setFetchMode(\PDO::FETCH_ASSOC);
            $order_cart->execute();

            $order = $order_cart->fetchAll();

            return $order;
        }

        //Met à jour le statut de paiement de la commande de 'en attente' à "payée"
        public function ConfirmPayment ($id_order, $payment_state){

            $data = [
                'id_order'=>$id_order,
                'payment_state'=>$payment_state,
            ] ;
            $query = "UPDATE orders SET payment_state = :payment_state WHERE id = :id_order ";
            $confirm_payment = $this->pdo->prepare($query);
            $confirm_payment->execute($data);
        }


        //retourne un tableau des commandes d'un utilisateur par ordre décroissant
        //utilisée pour afficher les commandes de l'utilisateur
        public function UserOrders($id_user) {

            $query = "SELECT orders.id, orders.incl_taxe_price, orders.date FROM orders
            INNER JOIN users ON orders.id_user = users.id
            WHERE orders.id_user = :id_user
            ORDER BY orders.id DESC";
            $orders = $this->pdo->prepare($query);
            $orders->setFetchMode(\PDO::FETCH_ASSOC);
            $orders->execute(['id_user'=>$id_user]);

            $user_orders = $orders->fetchAll();

            return $user_orders;
        }



        //Retourne un tableau avec toutes les commandes d'un utilisateur avec les infos complètes en inner join
        public function DisplayAllOrderByMe($id){
            $query = "SELECT orders.id, orders.incl_taxe_price, orders.date, orders.state, products_orders.quantity, products.image1 FROM orders INNER JOIN products_orders ON orders.id = products_orders.id_order INNER JOIN products ON products_orders.id_product = products.id WHERE id_user = '$id'";

            $recup = $this->pdo->prepare($query);
            $recup->setFetchMode(\PDO::FETCH_ASSOC);
            $recup->execute();

            $commandes = $recup->fetchall();
            return $commandes;
        }

        //Retourne toutes les infos d'une commande d'un user
        public function SelectOrderByUser($id){
            $query = "SELECT * FROM `orders` WHERE id_user = '$id'";
            $order_cart = $this->pdo->prepare($query);
            $order_cart->setFetchMode(\PDO::FETCH_ASSOC);
            $order_cart->execute();

            $order = $order_cart->fetchAll();

            return $order;
        }



    }

?>
