<?php

namespace Models;

use PDO;


class Article extends Model {


    //permet de selectionner tous les product et les renvoyer dans un tableau
    public function FindAllArticle(): array{
        $query = $this->pdo->prepare("SELECT * FROM `products`");
        $query->setFetchMode(\PDO::FETCH_ASSOC);
        $query->execute();
        $user=$query->fetchall();
        return $user;
    }

    //permet de selectionner le product par id  et le renvoyer dans un tableau
    public function FindinfoArticle($id): array{

        $query = "SELECT * FROM products WHERE id = :id";
        $find = $this->pdo->prepare($query);
        $find->setFetchMode(\PDO::FETCH_ASSOC);
        $find->execute(['id'=>$id]);

        $article = $find->fetchall();

        return $article;
    }

    //permet de selectionner tous les categories et les renvoyer dans un tableau
    public function FindCategory(): array{

        $query = "SELECT * FROM categories";
        $find = $this->pdo->prepare($query);
        $find->setFetchMode(\PDO::FETCH_ASSOC);
        $find->execute();
        $article=$find->fetchall();

        return $article;
    }

    //permet de selectionner tous les sous categories et les renvoyer dans un tableau
    public function FindSubCategory(){

        
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

        //modifie les infos d'un article
        public function CreateArticle($title,$brand,$reference,$description,$material,$color,$packaging,$tips,$specificities,$dimensions,$stock,$price,$discount,$discount_available,$category,$sub_category,$introduction){
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
                'introduction1' =>$introduction,
                'id_sub_category1' =>$sub_category,
            ];
            $query = "INSERT INTO products  ( `title`, `brand`, `reference`, `introduction`, `description`, `material`, `colors`, `tips`, `packaging`, `specificities`, `dimensions`, `price`, `score`, `discount`, `discount_available`, `id_category`, `id_sub_category`) VALUES (':title1',':brand1',':reference1',':introduction1',':description1',':material1',':colors1',':tips1',':packaging1',':specificities1',':dimensions1',':stock1',':price1',':score1',':discount1',':discount_available1',':id_category1',':id_sub_category1')";
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


    //permet d'afficher tous les produits trie par categories
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
        //permet d'afficher tous les produits trie par sous categories
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

        //permet d'afficher tous les produits trie par sous categories ou categorie

    public function DisplayAllProductsBySeach($nom){
        $query = ("SELECT products.id, image1, products.title, brand, products.id_category, products.id_sub_category, introduction, price, discount, discount_available, stock, category, id_sub_category FROM products
        INNER JOIN categories ON categories.id = products.id_category
        WHERE categories.category = '$nom'
        UNION
        SELECT products.id, products.image1, products.title, products.brand, products.id_category, products.id_sub_category, products.introduction, products.price, products.discount, products.discount_available, products.stock, products.id_category, products.id_sub_category FROM products 
        INNER JOIN sub_categories ON sub_categories.id = products.id_sub_category
        WHERE sub_categories.sub_category = '$nom'");
        $array_products = $this->pdo->prepare($query);
        $array_products->setFetchMode(\PDO::FETCH_ASSOC);
        $array_products->execute();
        $product = $array_products->fetchAll();
        return ($product);

    }
        //select 3 article
    public function FindAllArticleBy3(): array{
        $query = $this->pdo->prepare("SELECT * FROM `products` LIMIT 3");
        $query->setFetchMode(\PDO::FETCH_ASSOC);
        $query->execute();
        $article=$query->fetchall();
        return $article;
    }

    //select 3 article en partant de la fin de la bdd
    public function FindAllArticleBy3rev(): array{
        $query = $this->pdo->prepare("SELECT * FROM products ORDER BY id DESC LIMIT 3");
        $query->setFetchMode(\PDO::FETCH_ASSOC);
        $query->execute();
        $article=$query->fetchall();
        return $article;
    }

    // permet d'afficher les commentaires
    public function DisplayComment ($id_product){
        $query = "SELECT users.firstname, comments.title, comments.text, comments.date,comments.note,comments.id  FROM `users` INNER JOIN comments ON id_user = users.id 
        INNER JOIN products ON id_product = products.id  WHERE products.id  = '$id_product';";
        $listing = $this->pdo->prepare($query);
        $listing->setFetchMode(\PDO::FETCH_ASSOC);
        $listing->execute();

        $array = $listing->fetchAll();
        return $array;
    }

    // compte le nombre de commentaire dans un product
    public function Count($id) {
        $query = "SELECT COUNT(*) FROM comments where id_product = '$id'";
        $listing = $this->pdo->prepare($query);
        $listing->execute();
        $number = $listing->fetchAll();
       
        return $number;
    }
    // calcule la moyenne des note dans un product
    public function MoyenneReview($id) {
        $query = "SELECT AVG(note) FROM comments where id_product = '$id'";
        $listing = $this->pdo->prepare($query);
        $listing->execute();
        $number = $listing->fetchAll();
       
        return $number;
    }

    // permet de montrer le commentaire poster par le user avec son login  dans un product
    public function FindComment (){
        $query = "SELECT users.firstname, comments.text, comments.date,comments.note,comments.id,products.title FROM `users` INNER JOIN comments ON id_user = users.id INNER JOIN products ON id_product = products.id";
        $listing = $this->pdo->prepare($query);
        $listing->setFetchMode(\PDO::FETCH_ASSOC);
        $listing->execute();

        $array = $listing->fetchAll();
        return $array;
    }
    // permet de verif le stock d'un produit dans la bdd
    public function ProductStock($id_product) {
        $query = "SELECT stock FROM products WHERE id = :id_product";
        $stock = $this->pdo->prepare($query);
        $stock->setFetchMode(\PDO::FETCH_ASSOC);
        $stock-> execute(['id_product'=>$id_product]);

        $product_stock = $stock->fetchAll();

        $product_stock = (int) $product_stock[0]['stock'];

        return $product_stock;

    }

    // permet de update la quantite du product dans la bdd
    public function UpdateStock($id_product,$new_stock) {

        $data = [
            'new_stock' =>$new_stock,
            'id_product' =>$id_product,
        ];

        $query = "UPDATE products SET stock = :new_stock WHERE id = :id_product";
        $update_stock = $this->pdo->prepare($query);
        $update_stock->execute($data);

    }

}



?>