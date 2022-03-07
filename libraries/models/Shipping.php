<?php



    namespace Models;

    use PDO;


    class Shipping extends Model {

        public function Shipping ($firstname, $lastname, $address, $zipcode, $city, $country) {

            $data = [
                'firstname' =>$firstname,
                'lastname' =>$lastname,
                'address' =>$address,
                'zipcode' =>$zipcode,
                'city' =>$city,
                'country' =>$country,
            ];

            $query = "INSERT INTO shipping (firstname, lastname, address, zipcode, city, country) VALUES (:firstname, :lastname, :address, :zipcode, :city, :country";
            $register = $this->pdo->prepare($query);
            $register->execute($data);
        }
    }



?>

