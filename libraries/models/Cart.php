<?php

namespace Models;

use PDO;


class Cart extends Model {


    //Creation du panier si non existant, le verrou permettra la validation du panier.
    public function CreateCart(){

        if (!isset($_SESSION['cart'])){
            $_SESSION['cart']=array();
            $_SESSION['cart']['titleArticle'] = array();
            $_SESSION['cart']['qteArticle'] = array();
            $_SESSION['cart']['priceArticle'] = array();
            $_SESSION['cart']['locker'] = false;
        }

        return true;
    }


    public function AddArticle($titleArticle,$qteArticle,$priceArticle){

        //Si le panier existe
        if ( CreateCart() && !IsLocked() ) {

            //Si le produit existe déjà on ajoute seulement la quantité
            $positionArticle = array_search($titleArticle,  $_SESSION['cart']['titleArticle']);

            if ($positionArticle !== false) {
                $_SESSION['cart']['qteArticle'][$positionArticle] += $qteArticle ;
            }

            else {
                
                //Sinon on ajoute le produit
                array_push( $_SESSION['cart']['titleArticle'],$titleArticle);
                array_push( $_SESSION['cart']['qteArticle'],$qteArticle);
                array_push( $_SESSION['cart']['priceArticle'],$priceArticle);
            }
        }
        else echo "Un problème est survenu veuillez contacter l'administrateur du site.";

    }


    public function DeleteArticle($titleArticle){
        
        //Si le panier existe
        if (CreateCart() && !IsLocked()) {

            //Nous allons passer par un panier temporaire
            $tmp=array();
            $tmp['titleArticle'] = array();
            $tmp['qteArticle'] = array();
            $tmp['priceArticle'] = array();
            $tmp['locker'] = $_SESSION['cart']['locker'];

            for($i = 0; $i < count($_SESSION['cart']['libelleArticle']); $i++) {

                if ($_SESSION['cart']['titleArticle'][$i] !== $titleArticle) {
                    array_push( $tmp['titleArticle'],$_SESSION['cart']['titleArticle'][$i]);
                    array_push( $tmp['qteArticle'],$_SESSION['cart']['qteArticle'][$i]);
                    array_push( $tmp['priceArticle'],$_SESSION['cart']['priceArticle'][$i]);
                }

            }
            
            //On remplace le panier en session par notre panier temporaire à jour
            $_SESSION['cart'] =  $tmp;
            //On efface notre panier temporaire
            unset($tmp);
        }

        else echo "Un problème est survenu veuillez contacter l'administrateur du site.";
    }


    public function UpdateQteArticle($titleArticle,$qteArticle){

        //Si le panier existe
        if (CreateCart() && !IsLocked()) {

            //Si la quantité est positive on modifie sinon on supprime l'article
            if ($qteArticle > 0) {

                //Recherche du produit dans le panier
                $positionArticle = array_search($libelleArticle,  $_SESSION['cart']['titleArticle']);

                if ($positionArticle !== false) {

                    $_SESSION['cart']['qteArticle'][$positionArticle] = $qteArticle ;
                }
            }

            else DeleteArticle($titleArticle);
        }

        else echo "Un problème est survenu veuillez contacter l'administrateur du site.";
    }


    public function TotalPrice(){

        $total = 0;
        
        for($i = 0; $i < count($_SESSION['cart']['titleArticle']); $i++) {

           $total += $_SESSION['cart']['qteArticle'][$i] * $_SESSION['cart']['priceArticle'][$i];
           
        }

        return $total;
    }
    
    public function IsLocked(){

        if (isset($_SESSION['cart']) && $_SESSION['cart']['locker']) {
            return true;
        }

        else return false;
    }
    
    public function CountArticle(){
        if (isset($_SESSION['cart']))
        return count($_SESSION['cart']['titleArticle']);
        else return 0;
    }

    public function DeleteCart(){
        unset($_SESSION['cart']);
    }



}

?>