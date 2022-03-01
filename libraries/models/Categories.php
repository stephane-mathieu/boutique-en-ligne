<?php

    namespace Models;


    class Categories extends Model {

        public function DisplayCategoriesSubCategories (){

            $query = "SELECT category, sub_category FROM categories INNER JOIN sub_categories ON sub_categories.id = categories.id_sub_category";
            $listing = $this->pdo->prepare($query);
            $listing->setFetchMode(PDO::FETCH_ASSOC);
            $listing->execute();

            $array = $listing->fetchAll();
            var_dump($array);
        }


    }

?>

