<?php

    namespace Models;
    use PDO;
    class Shipping extends Model {

        public function Shipping ($firstname, $lastname, $address, $zipcode, $city, $country, $id_order) {

            //Permet de vérifier si on update la livraison d'une commande existante ou si on créé une livraison d'une commande venant d'être crée

            $query = "SELECT * FROM shippings WHERE id_order=:id_order";
            $check= $this->pdo->prepare($query);
            $check->setFetchMode(\PDO::FETCH_OBJ);
            $check->execute(['id_order'=>$id_order]);

            $checking = $check->fetch();


            //si tableau vide alors requete d'insertion
            if ($checking == false) {
                $query2 = "INSERT INTO shippings (firstname, lastname, address, zipcode, city, country, id_order) VALUES (:firstname, :lastname, :address, :zipcode, :city, :country, :id_order)";
            }

            //si tableau rempli alors requete update
            else { 
                $query2 = "UPDATE shippings SET firstname = :firstname, lastname = :lastname, address=:address, zipcode =:zipcode, city=:city, country=:country WHERE id_order =:id_order";
            }

            $data = [
                'firstname' =>$firstname,
                'lastname' =>$lastname,
                'address' =>$address,
                'zipcode' =>$zipcode,
                'city' =>$city,
                'country' =>$country,
                'id_order'=>$id_order,
            ];

         
            $ship = $this->pdo->prepare($query2);
            $ship->execute($data);
        }

        public function DisplayShipping($id_order) {
            $query = "SELECT * FROM shippings WHERE id_order = :id_order";
            $display = $this->pdo->prepare($query);
            $display->setFetchMode(\PDO::FETCH_OBJ);
            $display->execute(['id_order'=>$id_order]);

            $shipping = $display->fetch();

            return $shipping;
        }

        public function DeleteShipping($id_order) {
            $query = "DELETE FROM shippings WHERE id_order=:id_order";
            $delete = $this->pdo->prepare($query);
            $delete->execute(['id_order'=>$id_order]);
        }

        public function ShippingDates ($id_order, $min_date, $max_date) {

            $data = [
                'id_order'=>$id_order,
                'min_date'=>$min_date,
                'max_date'=>$max_date,
            ] ;

            $query = "UPDATE shippings SET min_date = :min_date, max_date = :max_date WHERE id_order = :id_order";
            $shipping_dates = $this->pdo->prepare($query);
            $shipping_dates->execute($data);

        }
    }



?>

