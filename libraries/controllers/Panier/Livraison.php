<?php

    namespace Controllers\Panier;

    use AltoRouter;
    use Models\Http;
    use Models\Renderer;
    use Controllers\Controllers;

    class Livraison extends Controllers{

        protected $modelName = \Models\Shipping::class ;

        public function Livraison() {

            session_start();

            $model = new \Models\Shipping();

            $valid = true;
            $shipping = '';
            $err_firstname ='';
            $err_lastname='';
            $err_address='';
            $err_city='';
            $err_country='';
            $id_order = $_GET['order'];
            var_dump($id_order);

            $id_order = intval($id_order);

            var_dump($id_order);
            
            

            if (isset($_POST['submit'])) {



                $firstname = htmlspecialchars(trim(ucwords(strtolower($_POST['firstname']))));
                $lastname = htmlspecialchars(trim(ucwords(strtolower($_POST['lastname']))));
                $address = htmlspecialchars(ucwords(strtolower($_POST['address'])));
                $zipcode = htmlspecialchars(trim($_POST['zipcode']));
                $city = htmlspecialchars(trim($_POST['city']));
                $country = htmlspecialchars(trim($_POST['country']));

                if (empty($firstname)) {
                    $valid = false;
                    $err_firstname = "Renseignez le prénom du destinataire.";
                    $firstname = '';
                }

                elseif (!preg_match("#^[a-zA-Z]+$#", $firstname)) {
                    $valid = false;
                    $err_firstname ="Le prénom du destinataire ne doit pas contenir de chiffres ou de caractères spéciaux";
                    $firstname ="";
                }
        
                if (empty($lastname)) {
                    $valid = false;
                    $err_lastname = "Renseignez le nom du destinataire";
                }
        
                elseif (!preg_match("#^[a-zA-Z]+$#", $lastname)) {
                    $valid = false;
                    $err_lastname = "Le nom du destinataire ne doit pas contenir de chiffres ou de caractères spéciaux";
                    $lastname ="";
                }

                if(empty($address)) {
                    $valid = false;
                    $err_address = "Renseignez votre adresse";
                    $address ='';
                }

                if(empty($city)) {
                    $valid = false;
                    $err_city = "Renseignez votre ville";
                    $city ='';
                }

                if(empty($country)) {
                    $valid = false;
                    $err_country = "Renseignez le pays";
                    $country ='';
                }

                if (empty($zipcode)) {
                    $valid = false;
                    $err_zipcode = "Renseignez le code postal.";
                }

                elseif (!preg_match ("~^[0-9]{5}$~",$zipcode)) {
                    $valid = false;
                    $zipcode ='';
                    $err_zipcode = "Le code postal n'est pas au bon format";
                }

                if($valid) {
                
                    $shipping = $this->model->Shipping($firstname, $lastname, $address, $zipcode, $city, $country, $id_order);
                    Header('Location: ordervalidation?order='.$id_order.'');

                }

            }
            

            $pageTitle = "Livraison";
            Renderer::render('articles/livraison', compact('pageTitle','model', 'shipping', 'err_firstname', 'err_zipcode', 'err_lastname', 'err_address', 'err_city', 'err_country','firstname', 'lastname','zipcode','address','city','country'));
        
        }
    }



?>