<?php

// use AltoRouter;
use Models\Http;
use Controllers\User;
use Controllers\Admin;
use Controllers\AdminDashboard;
require('vendor/autoload.php');

$router = new AltoRouter();
$router->setBasePath('/projectpool/boutique-en-ligne');
//root user//
$router->map('GET', '/home',function(){ $controller = new \Controllers\Index(); $controller->index();},'home');
$router->map('GET/POST', '/connexion', function(){ $controller = new \Controllers\User\Connexion(); $controller->connexion();},'connexion');
$router->map('GET/POST', '/inscription',function(){ $controller = new \Controllers\User\Inscription(); $controller->inscription();},'inscription');
$router->map('GET/POST', '/profil',function(){ $controller = new \Controllers\User\Profil(); $controller->profil();},'profil');
$router->map('GET/POST', '/deconnexion',function(){ $controller = new \Controllers\User\Deconnexion(); $controller->deconnexion();},'deconnexion');

//rootAdmin//
$router->map('GET/POST', '/adminuser',function(){$controller = new \Controllers\Admin\AdminUser();$controller->AdminUser();},'AdminUSer');

$router->map('GET/POST', '/adminprofil',function(){ $controller = new \Controllers\Admin\AdminProfil(); $controller->AdminProfil();},'AdminProfil');

$router->map('GET/POST', '/admin',function(){ $controller = new \Controllers\Admin\AdminDashboard(); $controller->Admin();},'Admin');

$router->map('GET/POST', '/adminArticle',function(){ $controller = new \Controllers\Admin\AdminArticle(); $controller->AdminArticle();},'AdminArticle');

$router->map('GET/POST', '/adminUpdateArticle',function(){ $controller = new \Controllers\Admin\AdminUpdateArticle(); $controller->AdminUpdateArticle();},'AdminArticleUpdate');


// $router->map('GET/POST', '/adminCommande',function(){ $controller = new \Controllers\AdminCommande(); $controller->AdminCommande();},'AdminCommande');

$router->map('GET/POST', '/adminInsert',function(){ $controller = new \Controllers\Admin\AdminInsertUser(); $controller->AdminInsert();},'AdminInsert');

$router->map('GET/POST', '/adminDelete',function(){ $controller = new \Controllers\Admin\AdminDeleteUser(); $controller->AdminDeleteUser();},'AdminDelete');


$match = $router->match();
if (is_array($match)){
    if(is_callable($match['target'])){
        call_user_func_array($match['target'],$match['params']);
    }
}
else{
    Http::redirect("home");

}
