<?php

    namespace Models;
    class Commentaire extends Model {

    
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

        public function deleteCommentaire($id){
            $query = $this->pdo->prepare("DELETE FROM `comments` WHERE id = $id");
            $query->execute();
        }

    }

?>

