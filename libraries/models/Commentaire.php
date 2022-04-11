<?php

    namespace Models;
    class Commentaire extends Model {

    

        // permet de montrer le commentaire poster par le user avec son login  dans un product
        public function FindComment (){
            $query = "SELECT users.firstname, comments.text, comments.date,comments.note,comments.id,products.title,products.image1 FROM `users` INNER JOIN comments ON id_user = users.id INNER JOIN products ON id_product = products.id";
            $listing = $this->pdo->prepare($query);
            $listing->setFetchMode(\PDO::FETCH_ASSOC);
            $listing->execute();

            $array = $listing->fetchAll();
            return $array;
        }

        //Ajoute un avis produit
        public function AddCommentaire($id_user,$id_article,$date,$titre,$texte,$note){
            $data = [
                'title' => $titre,
                'text' => $texte,
                'id_user' =>$id_user,
                'id_product'=>$id_article,
                'date'=>$date,
                'note'=>$note,
            ];

            $query = "INSERT INTO comments (title,text,note,date,id_user,id_product) VALUES (:title,:text,:note,:date,:id_user,:id_product)";
            $products_cart = $this->pdo->prepare($query);
            $products_cart->execute($data);

        }


        //Supprime un avis produit
        public function DeleteCommentaire($id){
            $query = $this->pdo->prepare("DELETE FROM `comments` WHERE id = $id");
            $query->execute();
        }

    }

?>

