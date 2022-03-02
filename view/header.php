<?php

$user = $_SESSION['role'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./Style/styles.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <title>Document</title>
</head>
<header>
        <nav class="navbar sticky-top navbar-expand-lg bg-dark">
            <div class="container">
                <a class="navbar-brand text-white">LOGO</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
            </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto w-100 justify-content-end">
                    <li class="nav-item active">
                        <a class="nav-link text-white" href="home">Home</a>
                    </li>
                    <!-- Si l'user n'est pas connecté -->
                    <?php if (!isset($user)) { ?>
                        <li class="nav-item active ">
                            <a class="nav-link text-white" href="inscription">Inscription</a>
                        </li>
                        <li class="nav-item active ">
                            <a class="nav-link text-white" href="connexion">Connexion</a>
                        </li>
                    <?php } ?>
                    <!-- Si l'user est connecté -->
                    <?php if (isset($user)) { ?>
                        <li class="nav-item active ">
                            <a class="nav-link text-white " href="profil">Profil</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link text-white" href="deconnexion">Deconnexion</a>
                        </li>
                        <?php } ?>
                    <?php if ($user == "admin") { ?>
                        <li class="nav-item active">
                            <a class="nav-link text-white" href="admin">Admin</a>
                        </li>
                        <?php } ?>
                </ul>
                </div>
            </div>
        </nav>
</header>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>