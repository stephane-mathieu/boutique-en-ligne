<?php
namespace Controllers\Article;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class Commentaire extends Controllers{

    protected $modelName = \Models\Commentaire::class;

    public function Commentaire(){

        session_start();
            $id_user =  $_SESSION['userId'];
            $id_article = $_GET['id_article'];
            $pageTitle = "Commentaire";
            $date = date('Y-m-d H:i');
            if(isset($_POST['submit'])){
                $titre = htmlspecialchars($_POST['titre']);
                $texte = htmlspecialchars($_POST['texte']);
                if ($_POST["note"] == '1') {
                    $note = (int) 1;
                }
                else if ($_POST["note"] == '2') {
                    $note = (int) 2;
                }
                else if ($_POST["note"] == '3') {
                    $note = (int) 3;
                }
                else if ($_POST["note"] == '4') {
                    $note = (int) 4;
                }
                else if ($_POST["note"] == '5') {
                    $note = (int) 5;
                }
                $add = $this->model-> AddCommentaire($id_user,$id_article,$date,$titre,$texte,$note);
                Http::redirect("produit?id=$id_article");
            }
            Renderer::render('articles/AddCommentaire', compact('pageTitle'));

    }


}
