<?php
namespace Controllers\Admin;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class AdminUpdateArticle extends Controllers{

    protected $modelName = \Models\Article::class;

    public function AdminUpdateArticle(){

        session_start();
        if($_SESSION['role'] == "admin"){

            $id_article = $_GET['id'];

            $article = $this->model->findinfoArticle($id_article);
            $category = $this->model->findCategory();
            $sub_categories = $this->model->findSubCategory();

            if(isset($_POST['submit'])){
                $title = htmlspecialchars($_POST['title']);
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
                    $addArticle= $this->model->UpdateArticle($title,$brand,$reference,$description,$material,$color,$packaging,$tips,$specificities,$dimensions,$stock,$price,$discount,$discount_available,$category1,$sub_category,$id_article);
                    Http::redirect("adminArticle");
            }
            $pageTitle = "adminUpdateArticle";
            Renderer::render2('admin/AdminUpdateArticle', compact('pageTitle','article','category','sub_categories'));
        }else{
            Http::redirect("home");
        }

    }
}

?>