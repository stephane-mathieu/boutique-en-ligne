<?php

namespace Models;

use PDO;


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


    // Retourne un tableau avec tous les produits et leurs infos pour la page produits
    public function DisplayAllProducts() {

        $query = "SELECT products.id, image1, products.title, brand, products.id_category, products.id_sub_category, introduction, price, discount, discount_available, stock, category, sub_category FROM products
        INNER JOIN categories ON categories.id = products.id_category 
        INNER JOIN sub_categories ON sub_categories.id = products.id_sub_category";
        $array_products = $this->pdo->prepare($query);
        $array_products->setFetchMode(\PDO::FETCH_ASSOC);
        $array_products->execute();

        $all_products = $array_products->fetchAll();

        return $all_products ;
        
    }

    // Retourne un tableau avec toutes les catégories pour la page produits permettant de trier les produits par catégories
    public function ListingCategories(){

        $query = "SELECT * FROM categories ";
        $listing = $this->pdo->prepare($query);
        $listing->setFetchMode(\PDO::FETCH_ASSOC);
        $listing->execute();

        $categories = $listing->fetchAll();

        return $categories;
    }

    // Retourne un tableau avec toutes les sous catégories pour la page produits permettant de trier les produits par sous catégories
    public function ListingSubCategories(){

        $query = "SELECT * FROM sub_categories ";
        $listing = $this->pdo->prepare($query);
        $listing->setFetchMode(\PDO::FETCH_ASSOC);
        $listing->execute();

        $sub_categories = $listing->fetchAll();

        return $sub_categories;
    }


    public function DisplayAllProductsByCat($nom_categorie) {

        $query = ("SELECT products.id, image1, products.title, brand, products.id_category, products.id_sub_category, introduction, price, discount, discount_available, stock, category, id_sub_category FROM products
        INNER JOIN categories ON categories.id = products.id_category
        WHERE categories.category = '$nom_categorie'");
        $array_products = $this->pdo->prepare($query);
        $array_products->setFetchMode(\PDO::FETCH_ASSOC);
        $array_products->execute();

        $all_products = $array_products->fetchAll();

        return $all_products ;
        
    }
    public function DisplayAllProductsBySubCat($nom_sub_categorie) {

        $query = ("SELECT products.id, products.image1, products.title, products.brand, products.id_category, products.id_sub_category, products.introduction, products.price, products.discount, products.discount_available, products.stock, products.id_category, products.id_sub_category FROM products 
        INNER JOIN sub_categories ON sub_categories.id = products.id_sub_category
        WHERE sub_categories.sub_category = '$nom_sub_categorie'");
        $array_products = $this->pdo->prepare($query);
        $array_products->setFetchMode(\PDO::FETCH_ASSOC);
        $array_products->execute();

        $all_products = $array_products->fetchAll();

        return $all_products ;
        
    }

    
    //select les infos de l'article choisis
    public function DisplayArticlePage(): array{

        $query = "SELECT * FROM `products` WHERE `id` = '".@$_GET['val']."'";
        $array_product = $this->pdo->prepare($query);
        $array_product->setFetchMode(\PDO::FETCH_ASSOC);
        $array_product->execute();
        $product = $array_product->fetchall();

        return $product;
    }
}

?>