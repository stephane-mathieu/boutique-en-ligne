<?php 

session_start();
// REQUIRE CONTROLLER USER //

$bdd = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');

$query = "SELECT users.firstname, users.lastname, users.email, users.number, users.address, orders.id, orders.incl_taxe_price FROM users INNER JOIN orders ON users.id = orders.id_user WHERE users.id = '6'";
$get = $bdd->prepare($query);
$get->setFetchMode(PDO::FETCH_ASSOC);
$get->execute();

$userinfos = $get->fetchall();

?>

<!DOCTYPE html>
<html lang=fr>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../style/compte.css" rel="stylesheet">
    <link rel="stylesheet" href="../../style/header.css">
    <title>Mon Compte</title>
  </head>

  <body>
    
    <?php require('../header.php'); ?>

    <main>
      
      <h2>Mon Compte</h2>  
      <p>Bonjour <?php  echo $userinfos[0]['firstname']; ?>, bienvenue sur votre espace personnel</p>
      
      <div class="bigcontainer">
      <img src="../assets/products/zippo/briquet_zippo/zippo-brush-chrome-grand-modele-2.jpg" width="260px" height="320px">

      <div class="formcolumn1">
        <h5><u>Mon profil</u></h5>  
        <ul>    
            <li><?php echo $userinfos[0]['firstname']; ?></li>
            <li><?php echo $userinfos[0]['lastname']; ?></li>
            <li><?php echo $userinfos[0]['email']; ?></li>
            <li><?php echo $userinfos[0]['number']; ?></li>
            <li><?php echo $userinfos[0]['address']; ?></li>
        </ul>
        <a href="modif-infos.php">Modifier mes informations</a>
        <br>
        <a href="modif-password.php">Modifier mon mot de passe</a>
      </div>  

      <div class="formcolumn2">
        <h5><u>Mes commandes</u></h5>
        <p>Dernière commande <br>
           <?php echo "Commande numéro ".$userinfos[0]['id']."<br>".$userinfos[0]['incl_taxe_price']." euros"; ?> 
        </p>
        <br>
        <a href="mescommandes.php">Afficher toutes mes commandes</a>
        <br>
        <a href="#">Déposer un avis produit</a>
      </div>
      
      <img src="../assets/products/zippo/briquet_zippo/zippo-brush-chrome-grand-modele-2-reverse.jpg" width="260px" height="320px">
      </div>
    </main>
  </body>
</html>
