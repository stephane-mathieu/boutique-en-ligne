<?php 

session_start();
// REQUIRE CONTROLLER USER //

$bdd = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');

$query = "SELECT * FROM users WHERE users.id = '6'";
$get = $bdd->prepare($query);
$get->setFetchMode(PDO::FETCH_ASSOC);
$get->execute();

$userinfos = $get->fetchall();

// var_dump($userinfos);

$formpassword = 0;

?>

<!DOCTYPE html>
<html lang=fr>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../style/connexion.css" rel="stylesheet">
    <link rel="stylesheet" href="../../style/header.css">
    <title>Modifier mes infos</title>
  </head>

  <body>
    
    <?php require('../header.php'); ?>

    <main>
      
      <div class="bigcontainer">
      <img src="../assets/products/zippo/briquet_zippo/zippo-eight-ball-2.jpg" width="360px" height="400px">
      
      <?php if($formpassword == 0){ ?>
        <div class="formcontainer">
            <form action="update-infos.php" method="post">

                <h2>Modifier vos informations</h2>
                <label for="name">PRÉNOM</label><br>
                <input type="text" placeholder="Entrez votre prénom" value="<?php echo $userinfos[0]['firstname']; ?>">
                <br>
                <label for="surname" class="label">NOM</label><br>
                <input type="text" placeholder="Entrez votre prénom" value="<?php echo $userinfos[0]['lastname']; ?>">
                <br>
                <label for="email" class="label">EMAIL</label><br>
                <input type="email" placeholder="Entrez votre email" value="<?php echo $userinfos[0]['email']; ?>">
                <br>
                <label for="address" class="label">ADRESSE</label><br>
                <input type="text" placeholder="Entrez votre adresse" value="<?php echo $userinfos[0]['address']; ?>">
                <br>
                <label for="password" class="label">CONFIRMEZ AVEC VOTRE MOT DE PASSE</label><br>
                <input type="password" placeholder="Entrez votre mot de passe">
                <br>
                <button type="submit" value="modifinfos">CONFIRMER LES MODIFICATIONS</button>

            </form>

        <?php } if($formpassword == 1) { ?>
            <form action="update-password.php" method="post">

                <h2>Modifier votre mot de passe</h2>
                <label for="actpassword">MOT DE PASSE ACTUEL</label><br>
                <input type="password" placeholder="Entrez votre mot de passe actuel">
                <br>
                <label for="newpassword" class="label">NOUVEAU MOT DE PASSE</label><br>
                <input type="password" placeholder="Entrez votre nouveau mot de passe">
                <br>
                <label for="passwordconfirm" class="label">CONFIRMEZ VOTRE MOT DE PASSE</label><br>
                <input type="password" placeholder="Entrez votre nouveau mot de passe">
                <br>
                <button type="submit" value="modifpassword">CONFIRMER LES MODIFICATIONS</button>

            </form>
        <?php } ?>
      </div>  
      
      <img src="../assets/products/zippo/briquet_zippo/zippo-eight-ball-2-reverse.jpg" width="360px" height="400px">
      </div>
    </main>
  </body>
</html>
