<?php 

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');

$query1 = "SELECT orders.id, orders.date, orders.incl_taxe_price, orders.state, shippings.address, shippings.zipcode, shippings.city, shippings.country, users.firstname, users.lastname FROM orders INNER JOIN shippings ON orders.id = shippings.id_order INNER JOIN users ON orders.id_user = users.id";

$get1 = $bdd->prepare($query1);
$get1->setFetchMode(PDO::FETCH_ASSOC);
$get1->execute();

$commande1 = $get1->fetchall();

// var_dump($commande1);

$query2 = "SELECT products_orders.quantity, products.title, products.price FROM products_orders INNER JOIN products ON products_orders.id_product= products.id WHERE products_orders.id_order = '13'";

$get2 = $bdd->prepare($query2);
$get2->setFetchMode(PDO::FETCH_ASSOC);
$get2->execute();

$commande2 = $get2->fetchall();

// var_dump($commande2);

function pricebyqty($price, $quantite){

  return $price * $quantite;

}

$query3 = "SELECT orders.id, orders.date, orders.incl_taxe_price FROM orders WHERE orders.id_user = '6'";
$get3 = $bdd->prepare($query3);
$get3->setFetchMode(PDO::FETCH_ASSOC);
$get3->execute();

$commande3 = $get3->fetchall();

// var_dump($commande3);
?>

<!DOCTYPE html>
<html lang=fr>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/header.css">
    <link rel="stylesheet" href="../../style/footer.css">
    <link rel="stylesheet" href="../../style/macommande.css">
    <title>Ma commande</title>
  </head>

  <body>

    <?php require('../header.php'); ?>

    <main>  

        <h1><b>Votre commande</h1>
        
        <h4>N° <?php echo $commande1[0]['id']; ?> du <?php echo $commande1[0]['date']; ?></b></h4>

        <div class="bigcontainer">
            <div class="lilcontainer">
                <h6><u><b>Informations de livraison</u></h6><br>
                <p><?php echo $commande1[0]['lastname']; ?></p>
                <p><?php echo $commande1[0]['firstname']; ?></p><br>
                <p>Livré au</p><br>
                <p><?php echo $commande1[0]['address']; ?></p>
                <p><?php echo $commande1[0]['zipcode']; echo " ".$commande1[0]['city']; ?></p>
                <p><?php echo $commande1[0]['country']; ?></b></p>
            </div>
            <div class="maincontainer">
                <div class="mcpart1">
                <ul><h6><b><u>Article</u></b></h6><br>
                  <?php foreach ($commande2 as $product) { ?>
                  <li><?php echo $product['title']; }?> </li>
                </ul>  
                <ul><h6><b><u>Prix unitaire</u></b></h6><br>
                  <?php foreach ($commande2 as $product) { ?>
                  <li><?php echo $product['price'] ."€";}?> </li>
                </ul>
                <ul><h6><b><u>Quantité</u></b></h6><br>
                  <?php foreach ($commande2 as $product) { ?>
                  <li><?php echo $product['quantity']; }?></li>
                </ul>
                <ul><h6><b><u>Montant TTC</u></b></h6><br>
                  <?php foreach ($commande2 as $product) { ?>
                  <li><?php $price = $product['price']; $quantite = $product['quantity']; $pricebyqty = pricebyqty($price,$quantite); echo $pricebyqty ."€"; }?> </li>
                </ul><br>
                </div>
                <div class="mcpart2">
                  <h6><b>TOTAL</h6>
                  <p><?php echo $commande1[0]['incl_taxe_price']; ?>€</b></p>
                </div>
                <div class="mcpart3">
                  <p>Statut de la commande : <b><?php echo $commande1[0]['state']; ?></b></p>
                </div>     
            </div>
            <div class="lilcontainer">
              <h6><u><b>Vos autres commandes</b></u></h6><br>
              <?php foreach ($commande3 as $value){ ?>
                <p>N° <?php echo $value['id']; ?> du <?php echo $value['date']; ?></p>
                <p>Prix de <?php echo $value['incl_taxe_price']; ?> €</p>
              <?php } ?>  
            </div>
        </div>
        <button type="submit" value="same_order">COMMANDER A NOUVEAU</button>
    </main>

    <?php require('../footer.php'); ?>
  </body>              
</html>







