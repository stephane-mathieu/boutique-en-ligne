
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


    <main>

        <h2><b>Mes commandes</b></h2>

        <h6><b>Consultez vos commandes ici.</b></h6>
        
        <div class="commandes_container">
            <?php foreach ($commandes as $commande) { ?>
                <div class="commande_ligne">
                    <img src="<?php echo $commande['image1']?>" width="250px" height="150px">
                    <div class="commande_recap">
                    <?php echo  '<a href="macommande?id='.$commande['id'] . '&idu='.$idu .'">';?><h6>Votre commande n° <?php echo $commande['id']?> du <?php echo $commande['date']?></h6></a>
                        <p><?php echo $commande['quantity']?> articles</p>
                        <p>pour un montant de <?php echo $commande['incl_taxe_price']?> euros</p>
                        <p>Commande <?php if($commande['state']=="Confirmée"){echo 'envoyée';} else{echo "annulée";}?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
        <a href='produits' class='btn btn-black btn-lg btn-block text-uppercase white-text'>Passer une nouvelle commande</a>
    </main>

   </body>
</html>
  

