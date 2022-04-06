<?php

    namespace Models;
    class Categories extends Model {

        //Retourne un tableau avec l'ensemble des catégories et sous catégories
        public function DisplayCategoriesSubCategories(){

            $query = "SELECT  category, sub_categories.id, sub_category FROM categories INNER JOIN sub_categories ON categories.id = sub_categories.id_category;";
            $listing = $this->pdo->prepare($query);
            $listing->setFetchMode(\PDO::FETCH_ASSOC);
            $listing->execute();

            $array = $listing->fetchAll();
            return $array;
           
        }

        //Retourne un tableau avec les catégories seules
        public function DisplayCategories (){

            $query = "SELECT * FROM categories ";
            $listing = $this->pdo->prepare($query);
            $listing->setFetchMode(\PDO::FETCH_ASSOC);
            $listing->execute();

            $categories = $listing->fetchAll();

            return $categories;
        }



        //Retourne un tableau avec  les catéogires
        public function FindCategory(): array{

            $query = $this->pdo->prepare("SELECT * FROM `categories`");
            $query->setFetchMode(\PDO::FETCH_ASSOC);
            $query->execute();
            $article=$query->fetchall();
    
            return $article;
        }


        //Retourne un tableau avec  les catéogires
        public function FindSubCategory(): array{

            $query = $this->pdo->prepare("SELECT * FROM `sub_categories`");
            $query->setFetchMode(\PDO::FETCH_ASSOC);
            $query->execute();
            $article=$query->fetchall();
    
            return $article;
        }



        public function InsertCategory($category,$description){

            $query = $this->pdo->prepare("INSERT INTO `categories` ( `category`, `description`) VALUES ('$category','$description')");
            $query->execute();
        }

        public function InsertSubCategory($title,$category){
            
            $data = [
                'title'=>$title,
                'category'=>$category,
            ] ;

            $query = "INSERT INTO sub_categories (sub_category, id_category) VALUES (:title, :category)";
            $insert = $this->pdo->prepare($query);
            $insert->execute($data);
            
        }


    }

?>

