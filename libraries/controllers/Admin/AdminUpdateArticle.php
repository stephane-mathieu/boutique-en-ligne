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
            var_dump($id_article);

            if(isset($_POST['submit'])){
                $title = $_POST['title'];
                $brand = $_POST['brand'];
                $reference = $_POST['reference'];
                $description = $_POST['description'];
                $material = $_POST['material'];
                $color = $_POST['colors'];
                $packaging = $_POST['packaging'];
                $tips = $_POST['tips'];
                $specificities = $_POST['specificities'];
                $dimensions = $_POST['dimensions'];
                $stock = $_POST['stock'];
                $price = $_POST['price'];
                $discount = $_POST['discount'];
                $discount_available = $_POST['discount_available'];
                $sub_category = $_POST['sub_category'];
                    // insert les donner dans la bdd
                    $addArticle= $this->model->UpdateArticle($title,$brand,$reference,$description,$material,$color,$packaging,$tips,$specificities,$dimensions,$stock,$price,$discount,$discount_available,$category,$sub_category,$id_article);
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