<?php



    namespace Models;

    use PDO;


    class Shipping extends Model {

        public function Shipping ($firstname, $lastname, $address, $zipcode, $city, $country, $id_order) {

            $data = [
                'firstname' =>$firstname,
                'lastname' =>$lastname,
                'address' =>$address,
                'zipcode' =>$zipcode,
                'city' =>$city,
                'country' =>$country,
                'id_order'=>$id_order,
                
            ];

            $query = "INSERT INTO shippings (firstname, lastname, address, zipcode, city, country, id_order) VALUES (:firstname, :lastname, :address, :zipcode, :city, :country, :id_order)";
            $register = $this->pdo->prepare($query);
            $register->execute($data);
        }
    }



?>

