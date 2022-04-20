<?php
namespace Controllers\Admin;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class AdminInsertArticle extends Controllers{

    protected $modelName = \Models\Article::class;

    public function AdminInsertArticle(){
        session_start();
        if($_SESSION['role'] == "admin"){
            // $user= $this->model->findAllUser();
            $models = new \Models\Article();
            $category = $models->ListingCategories();
            $sub_category = $models->ListingSubCategories();
            if(isset($_POST['submit'])){
                $title = htmlspecialchars($_POST['title']);
                $image1 = htmlspecialchars($_POST['image1']);
                $image2 = htmlspecialchars($_POST['image2']);
                $image3 = htmlspecialchars($_POST['image3']);
                $image4 = htmlspecialchars($_POST['image4']);
                $introduction = htmlspecialchars($_POST['introduction']);
                $brand = htmlspecialchars($_POST['brand']);
                $reference = htmlspecialchars($_POST['reference']);
                $description = htmlspecialchars($_POST['description']);
                $material = htmlspecialchars($_POST['material']);
                $color = htmlspecialchars($_POST['colors']);
                $packaging = htmlspecialchars($_POST['packaging']);
                $tips = htmlspecialchars($_POST['tips']);
                $specificities = htmlspecialchars($_POST['specificities']);
                $dimensions = htmlspecialchars($_POST['dimensions']);
                $stock = htmlspecialchars($_POST['stock']);
                $price = htmlspecialchars($_POST['price']);
                $discount = htmlspecialchars($_POST['discount']);
                $discount_available = htmlspecialchars($_POST['discount_available']);
                $sub_category = htmlspecialchars($_POST['sub_category']);
                $category1 = htmlspecialchars($_POST['category']);
                    // insert les donner dans la bdd
                    $addArticle= $this->model->CreateArticle($title,$brand,$reference,$description,$material,$color,$packaging,$tips,$specificities,$dimensions,$stock,$price,$discount,$discount_available,$category1,$sub_category,$introduction,$image1,$image2,$image3,$image4);
                    Http::redirect("adminArticle");
            }
            $pageTitle = "AdminArticle";
            Renderer::render2('admin/AdminCreeArticle', compact('pageTitle','category','sub_category'));
    
        }else{
            Http::redirect("home");
        }
    }

}

?>