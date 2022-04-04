<?php

    namespace Models;
    class Categories extends Model {

        //Retourne un tableau avec l'ensemble des catégories et sous catégories
        public function DisplayCategoriesSubCategories (){

            $query = "SELECT category, sub_category FROM categories INNER JOIN sub_categories ON sub_categories.id = categories.id_sub_category";
            $listing = $this->pdo->prepare($query);
            $listing->setFetchMode(\PDO::FETCH_ASSOC);
            $listing->execute();

            $array = $listing->fetchAll();
            var_dump($array);
        }



        //Retourne un tableau avec  les catéogires
        public function FindCategory(): array{

            $query = $this->pdo->prepare("SELECT * FROM `categories`");
            $query->setFetchMode(\PDO::FETCH_ASSOC);
            $query->execute();
            $article=$query->fetchall();
    
            return $article;
        }

        public function InsertCategory($category,$description){

            $query = $this->pdo->prepare("INSERT INTO `categories` ( `category`, `description`) VALUES ('$category','$description')");
            $query->execute();
        }


    }

?>

