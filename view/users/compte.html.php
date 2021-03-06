<html lang=fr>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../style/compte.css" rel="stylesheet">
    <link rel="stylesheet" href="style/compte.css">
    <title>Mon Compte</title>
  </head>

  <body>
    <main>
      <h2>Mon Compte</h2>

      <p>Bonjour <?php  echo $user_infos[0]['firstname']; ?>, bienvenue sur votre espace personnel</p>
      <div class="bigcontainer">
      <img src="/boutique-en-ligne/view/assets/products/zippo/briquet_zippo/zippo-brush-chrome-grand-modele-2.jpg" width="260px" height="320px">

      <div class="formcolumn1">
        <h5><u>Mon profil</u></h5>
        <ul>    
            <li><?php echo $user_infos[0]['firstname']; ?></li>
            <li><?php echo $user_infos[0]['lastname']; ?></li>
            <li><?php echo $user_infos[0]['email']; ?></li>
            <li><?php echo $user_infos[0]['number']; ?></li>
            <li><?php echo $user_infos[0]['address']; ?></li>
        </ul>
        <a href="updateinfos">Modifier mes informations</a>
        <br>
        <a href="updatepassword">Modifier mon mot de passe</a>
      </div>  

      <div class="formcolumn2">
        <h5><u>Mes commandes</u></h5>
        <p>Dernière commande <br>
           <?php  if(!empty($user_orders)) { echo "<a href='macommande?id=".$user_orders[0]['id']."'>Commande numéro ".$user_orders[0]['id']."<br> du ".$user_orders['0']['date']."<br>".$user_orders[0]['incl_taxe_price']." euros</a>"; } ?> 
        </p>
        <br>
        <?php echo  '<a class="lien_pad" href="mescommande?id='.$user_infos['0']['id'] . '">Afficher toutes mes commandes</a>';?>

      </div>
      
      <img src="/boutique-en-ligne/view/assets/products/zippo/briquet_zippo/zippo-brush-chrome-grand-modele-2-reverse.jpg" width="260px" height="320px">
      </div>
    </main>
  </body>
</html>
