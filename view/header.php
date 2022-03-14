<?php

$user = $_SESSION['role'];
$Model_Cart = new \Models\Cart();


$count = $Model_Cart->CountProducts();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/styles.css" rel="stylesheet" />
    <link href="style/header.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Document</title>
</head>
<header>
    <div class="header-blue">
        <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
            <div class="container"><a class="navbar-brand" href="home"><img src="/boutique-en-ligne/view/assets/logo.PNG" alt="logo"></a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class=" searchbar collapse navbar-collapse ms-5" id="navcol-1">
                    <form action="recherche" method="GET" class="form-inline mr-auto" target="_self">
                        <div class="form-group"><label for="search-field"><i class="fa fa-search"></i></label><input class="form-control search-field" type="search" name="type" id="search-field"></div>
                    </form>
                    <?php if (!isset($user)) { ?>
                        <a class="btn btn-light action-button" role="button" href="connexion">Connexion</a></span>
                        <a class="btn btn-light action-button" role="button" href="inscription">Inscription</a>
                    <?php } ?>
                    <?php if (isset($user)) { ?>
                        <a class="btn btn-light action-button" role="button" href="compte">Compte</a></span>
                        <a class="btn btn-light action-button" role="button" href="deconnexion">Deconnexion</a>
                    <?php } ?>
                    <?php if ($user == 'admin') { ?>
                        <a class="btn btn-light action-button" role="button" href="admin">Admin</a></span>
                    <?php } ?>
                    <div><a href="panier"><img src="/boutique-en-ligne/view/assets/panier.PNG" alt="panier"></a>
                    <?php   if ($count >0) {
                        echo $count;
                    }
                    ?>
                </div><br>
            </div>
        </nav>
        <div class="secondnav">
            <nav class="secondnavitems">
                <a id="secondnavli" href="produits">Nos produits</a>
                <a id="secondnavli" href="newarticle">Nouveautés</a>
            </nav>
        </div>
    </div>
</header>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>













<!-- <?php

        @session_start();

        class Header
        {

            public $connexion;

            public function __construct()
            {

                $bdd = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');

                try {
                    $bdd = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
                    $this->connexion = $bdd;
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    die();
                }
            }

            public function ListCat()
            {

                $listcatquery = $this->connexion->prepare("SELECT category FROM categories");
                $listcatquery->setFetchMode(PDO::FETCH_ASSOC);
                $listcatquery->execute();

                $listcat = $listcatquery->fetchAll();


                return $listcat;
            }
        }

        // $test = new Header;
        // $listcat = $test->ListCat();
        // 
        ?>
<!--  -->
<!-- <!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./Style/header.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="../style/header.css">
</head>

<header>
    <div class="header-blue">
        <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
            <div class="container"><a class="navbar-brand" href="index.php"><img src="/boutique-en-ligne/view/assets/logo.PNG" alt="logo"></a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse"
                    id="navcol-1">
                    
                    <form class="form-inline mr-auto" target="_self">
                        <div class="form-group"><label for="search-field"><i class="fa fa-search"></i></label><input class="form-control search-field" type="search" name="search" id="search-field"></div>
                    </form><span class="navbar-text"> <a href="#" class="login">Connexion</a></span><a class="btn btn-light action-button" role="button" href="#">Inscription</a>
                    <img class="panier" src="/boutique-en-ligne/view/assets/panier.PNG" alt="panier"></div><br>         
            </div>
        </nav>
        <div class="secondnav">
            <nav class="secondnavitems">
                <a id="secondnavli" href="produits.php">Nouveautés</a>
                <a id="secondnavli" href="produits.php">Les mieux notés</a>
                <select name="categorie">
                    <div class="options">
                    <option value="none" selected disabled hidden>Nos produits</option>
                    <?php foreach ($listcat as $categorie) { ?>
                        <option value="<?php echo $categorie['category']; ?> "><?php echo $categorie['category']; ?> </option>
                    <?php } ?>
                    </div>
                </select>
                <a id="secondnavli" href="admin.php">Espace administrateur</a>      
            </nav>      
        </div>
    </div>
        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</header>

</html> -->