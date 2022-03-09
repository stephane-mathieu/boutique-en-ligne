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
        public function CreateOrder($total,$date,$id_user,$productcart,$sessioncart) {

            $payment_state ='En attente';
            $state = 'En attente de paiement';

            // Création de la commande
            $data = [
                'incl_taxe_price' => $total,
                'date' => $date,
                'id_user' =>$id_user,
                'payment_state'=>$payment_state,
                'state'=>$state,
            ];

            
            $query = "INSERT INTO orders ( incl_taxe_price, date, id_user, payment_state, state) VALUES (:incl_taxe_price, :date, :id_user, :payment_state, :state)";
            $products_cart = $this->pdo->prepare($query);
            $products_cart->execute($data);

            //Récupération de l'id de la commande venant d'être créée
            $query2 = "SELECT id FROM orders ORDER BY id DESC LIMIT 1";
            $id = $this->pdo->prepare($query2);
            $id->setFetchMode(\PDO::FETCH_ASSOC);
            $id->execute();

          

            $id_order = $id->fetch();

            $id_order = $id_order['id'];


            //inseration dans la table intermédiaire du produit et de l'id de commande liée
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

        public function DisplayOrder($id_order) {
            $query = "SELECT orders.id, excl_taxe_price, vat, incl_taxe_price, date, state, payment_state, id_user,  products_orders.id_product, products_orders.quantity, shippings.firstname, shippings.lastname, shippings.address, shippings.zipcode, shippings.city, shippings.country, products.title, products.price
            FROM orders
            INNER JOIN shippings ON shippings.id_order = orders.id
            INNER JOIN products_orders ON products_orders.id_order = orders.id
            INNER JOIN products ON products.id = products_orders.id_product
            WHERE orders.id = :id_order
            AND products_orders.id_order = :id_order";

            $display = $this->pdo->prepare($query);
            $display->setFetchMode(\PDO::FETCH_OBJ);
            $display->execute(['id_order'=>$id_order]);

            $order = $display->fetchAll();

            var_dump($order);

            return $order;
        }
    }

?>