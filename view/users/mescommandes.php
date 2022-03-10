<?php 

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');

$query = "SELECT orders.id, orders.incl_taxe_price, orders.date, orders.state, products_orders.quantity, products.image1 FROM orders INNER JOIN products_orders ON orders.id = products_orders.id_order INNER JOIN products ON products_orders.id_product = products.id";

$recup = $bdd->prepare($query);
$recup->setFetchMode(PDO::FETCH_ASSOC);
$recup->execute();

$commandes = $recup->fetchall();

var_dump($commandes);
?>

<!DOCTYPE html>
<html lang=fr>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../style/commande.css" rel="stylesheet">
    <link rel="stylesheet" href="../../style/header.css">
    <link rel="stylesheet" href="../../style/footer.css">
    <link rel="stylesheet" href="../../style/commandes.css">
    <title>Mes commandes</title>
  </head>

  <body>

    <?php require('../header.php'); ?>

    <main>

        <h2><b>Mes commandes</b></h2>

        <h6><b>Consultez vos commandes ici.</b></h6>
        
        <div class="commandes_container">
            <?php foreach ($commandes as $commande) { ?>
                <div class="commande_ligne">   
                    <img src="<?php echo $commande['image1']?>" width="250px" height="150px">
                    <div class="commande_recap">
                        <a href="#"><h6>Votre commande n° <?php echo $commande['id']?> du <?php echo $commande['date']?></h6></a>
                        <p><?php echo $commande['quantity']?> articles</p>
                        <p>pour un montant de <?php echo $commande['incl_taxe_price']?> euros</p>
                        <p>Commande <?php if($commande['state']=="envoyee"){echo 'envoyée';} else{echo "annulée";}?></p>
                    </div>
                </div>
            <?php } ?>        
        </div>

        <button type="submit" value="new_order">PASSER UNE NOUVELLE COMMANDE</button>
    </main>

    <?php require('../footer.php'); ?>
   </body>
</html>
  

