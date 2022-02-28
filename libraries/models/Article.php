<?php

namespace Models;


class Article extends Model {

    //retourne les infos de lutilisateur choisis
    public function findAllArticle(): array{

        //select tous les article
        $query = $this->pdo->prepare("SELECT * FROM `products`");
        $query->setFetchMode(\PDO::FETCH_ASSOC);
        $query->execute();
        $user=$query->fetchall();

        return $user;
    }

    //select les infos de l'article choisis
    public function findinfoArticle($id): array{

        
        $query = $this->pdo->prepare("SELECT * FROM `products` WHERE `id` = '$id'");
        $query->setFetchMode(\PDO::FETCH_ASSOC);
        $query->execute();
        $article=$query->fetchall();

        return $article;
    }


    //select les infos de l'article choisis
    public function findCategory(): array{

        $query = $this->pdo->prepare("SELECT * FROM `categories`");
        $query->setFetchMode(\PDO::FETCH_ASSOC);
        $query->execute();
        $article=$query->fetchall();

        return $article;
    }

    //select les infos de l'article choisis
    public function findSubCategory(){

        
        $query = $this->pdo->prepare("SELECT * FROM `sub_categories`");
        $query->setFetchMode(\PDO::FETCH_ASSOC);
        $query->execute();
        $article=$query->fetchall();

        return $article;
    }

    //modifie les infos d'un article
    public function UpdateArticle($title,$brand,$reference,$description,$material,$color,$packaging,$tips,$specificities,$dimensions,$stock,$price,$discount,$discount_available,$category,$sub_category,$id){
        $data = [
            'title1' =>$title,
            'brand1' =>$brand,
            'reference1' =>$reference,
            'description1' =>$description,
            'material1' =>$material,
            'colors1' =>$color,
            'tips1' =>$tips,
            'packaging1' =>$packaging,
            'specificities1' =>$specificities,
            'dimensions1' =>$dimensions,
            'stock1' =>$stock,
            'price1' =>$price,
            'discount1' =>$discount,
            'discount_available1' =>$discount_available,
            'id_category1' =>$category,
            'id_sub_category1' =>$sub_category,
            'id1' =>$id,
        ];

        $query = "UPDATE  products SET title=:title1, brand=:brand1, reference=:reference1, description=:description1, material=:material1, colors=:colors1, tips=:tips1,packaging=:packaging1,specificities=:specificities1,dimensions=:dimensions1,stock=:stock1,price=:price1,discount=:discount1,discount_available=:discount_available1,id_category=:id_category1,id_sub_category=:id_sub_category1 WHERE `id` = :id1";
        $article = $this->pdo->prepare($query);
        $article->execute($data);

    }

    public function DisplayAllProducts() {

        $query = "SELECT products.id, image1, title, brand, id_category, id_sub_category, introduction, price, discount, discount_available, stock FROM products";
        $array_products = $this->pdo->prepare($query);
        $array_products->setFetchMode(PDO::FETCH_ASSOC);
        $array_products->execute();

        $all_products = $array_products->fetchAll();

        var_dump($all_products);
    }
}

?>