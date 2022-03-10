<?php

// use AltoRouter;
use Models\Http;
use Controllers\User;
use Controllers\Admin;
use Controllers\AdminDashboard;
use Controllers\Panier\Addtocart;
require('vendor/autoload.php');



$router = new AltoRouter();
$router->setBasePath('/boutique-en-ligne');
//root user//
$router->map('GET', '/home',function(){ $controller = new \Controllers\Index(); $controller->index();},'home');
$router->map('GET/POST', '/connexion', function(){ $controller = new \Controllers\User\Connexion(); $controller->connexion();},'connexion');
$router->map('GET/POST', '/inscription',function(){ $controller = new \Controllers\User\Inscription(); $controller->inscription();},'inscription');
$router->map('GET/POST', '/profil',function(){ $controller = new \Controllers\User\Profil(); $controller->profil();},'profil');
$router->map('GET/POST', '/deconnexion',function(){ $controller = new \Controllers\User\Deconnexion(); $controller->deconnexion();},'deconnexion');




//root Article//
$router->map('GET/POST', '/produits',function(){ $controller = new \Controllers\Article\Produits(); $controller->Produits();},'Produits');
$router->map('GET/POST', '/produit',function(){ $controller = new \Controllers\Article\Produit(); $controller->Produit();},'Produit');

$router->map('GET/POST', '/newarticle',function(){ $controller = new \Controllers\Article\NewArticle(); $controller->NewArticle();},'NewArticle');

$router->map('GET/POST', '/addcommentaire',function(){ $controller = new \Controllers\Article\Commentaire(); $controller->Commentaire();},'Commentaire');


$router->map('GET/POST', '/addtocart',function(){ $controller = new \Controllers\Panier\Addtocart(); $controller->AddToCart();},'Addtocart');
$router->map('GET/POST', '/panier',function(){ $controller = new \Controllers\Panier\Panier(); $controller->Panier();},'Panier');
$router->map('GET/POST', '/livraison',function(){ $controller = new \Controllers\Panier\Livraison(); $controller->Livraison();},'Livraison');
$router->map('GET/POST', '/cartvalidation',function(){ $controller = new \Controllers\Panier\Cartvalidation(); $controller->CartValidation();},'Cartvalidation');


$router->map('GET/POST', '/recherche',function(){ $controller = new \Controllers\Article\Recherche(); $controller->Produits();},'Recherche');

$router->map('GET/POST', '/payement',function(){ $controller = new \Controllers\Article\Payement(); $controller->Payement();},'Payement');

$router->map('GET/POST', '/RecapPayement',function(){ $controller = new \Controllers\Article\RecapPayement(); $controller->RecapPayement();},'RecapPayement');


$router->map('GET/POST', '/indexpayement',function(){ $controller = new \Controllers\Article\Indexpayement(); $controller->IndexPayement();},'IndexPayement');

$router->map('GET/POST', '/ordervalidation',function(){ $controller = new \Controllers\Panier\Ordervalidation(); $controller->OrderValidation();},'Ordervalidation');


//rootAdmin//
$router->map('GET/POST', '/adminuser',function(){$controller = new \Controllers\Admin\AdminUser();$controller->AdminUser();},'AdminUSer');

$router->map('GET/POST', '/adminprofil',function(){ $controller = new \Controllers\Admin\AdminProfil(); $controller->AdminProfil();},'AdminProfil');

$router->map('GET/POST', '/admincommentaire',function(){ $controller = new \Controllers\Admin\AdminCommentaire(); $controller->Commentaire();},'AdminCommentaire');

$router->map('GET/POST', '/adminCommande',function(){ $controller = new \Controllers\Admin\AdminCommande(); $controller->AdminCommande();},'AdminCommande');

$router->map('GET/POST', '/adminViewCommande',function () {$controller = new \Controllers\Admin\AdminViewCommande(); $controller->AdminViewCommande();},'AdminViewCommande');

$router->map('GET/POST', '/admin',function(){ $controller = new \Controllers\Admin\AdminDashboard(); $controller->Admin();},'Admin');

$router->map('GET/POST', '/adminArticle',function(){ $controller = new \Controllers\Admin\AdminArticle(); $controller->AdminArticle();},'AdminArticle');

$router->map('GET/POST', '/adminUpdateArticle',function(){ $controller = new \Controllers\Admin\AdminUpdateArticle(); $controller->AdminUpdateArticle();},'AdminArticleUpdate');


$router->map('GET/POST', '/adminInsertArticle',function(){ $controller = new \Controllers\Admin\AdminInsertArticle(); $controller->AdminInsertArticle();},'AdminInsertArticle');
// $router->map('GET/POST', '/adminCommande',function(){ $controller = new \Controllers\AdminCommande(); $controller->AdminCommande();},'AdminCommande');

$router->map('GET/POST', '/adminInsert',function(){ $controller = new \Controllers\Admin\AdminInsertUser(); $controller->AdminInsert();},'AdminInsert');

$router->map('GET/POST', '/adminDelete',function(){ $controller = new \Controllers\Admin\AdminDeleteUser(); $controller->AdminDeleteUser();},'AdminDelete');

$router->map('GET/POST', '/adminDeleteCommande',function(){ $controller = new \Controllers\Admin\AdminDeleteCommande(); $controller->AdminDeleteCommande();},'AdminDeleteCommande');


$router->map('GET/POST', '/admincreatorsteph',function(){ $controller = new \Controllers\Admin\AdminCreator(); $controller->AdminCreator1();},'AdminCreatorsteph');

$router->map('GET/POST', '/admincreatorthomas',function(){ $controller = new \Controllers\Admin\AdminCreator(); $controller->AdminCreator2();},'AdminCreatortoto');

$router->map('GET/POST', '/admincreatorvalentin',function(){ $controller = new \Controllers\Admin\AdminCreator(); $controller->AdminCreator3();},'AdminCreatorval');



/* Match the current request */
$match = $router->match();
if (is_array($match)){
    if(is_callable($match['target'])){
        call_user_func_array($match['target'],$match['params']);
    }
}
else{
    Http::redirect("home");

}
