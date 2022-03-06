<?php


// session_destroy();

$panier = $_SESSION['panier'];


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Site meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Panier</title>
    <!-- CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                <form method="post">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Product</th>
                            <th scope="col">Available</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Price</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="<?php echo $st['image1']; ?>" width="50px" height="50px"></td>
                            <td> <?= $st['title']; ?> </td>
                            <td>In stock</td>
                            <td><input class="form-control" name="stock" type="text" value="1" /></td>
                            <td class="text-right"> <?= $st['price'] ." €"; ?> </td>
                            <td>
                                <?php echo "<a href='deletepanier?id=".$st['id']."' name='addtocart' class='btn btn-black btn-lg btn-block text-uppercase white-text'> Delete"; ?>
                            </td>
                        </tr>
                        <?php }; ?>
                    <?php }; ?>
                     
                        <!-- <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Shipping</td>
                            <td class="text-right">6,90 €</td>
                        </tr> -->
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong>346,90 €</strong></td>
                        </tr>
                    </tbody>
                </form>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <!-- <button class="btn btn-block btn-light">Continue Shopping</button> -->
                    <?php echo "<a href='produits' name='produits' class='btn btn-black btn-lg btn-block text-uppercase white-text'>"; ?>
                                <i class="fa fa-shopping-cart white-text orange-hover"></i> CONTINUER VOS ACHATS
                    </a>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                <?php echo "<a href='payement' name='produits' class='btn btn-black btn-lg btn-block text-uppercase white-text'>"; ?>
                                <i class="fa fa-shopping-cart white-text orange-hover"></i> PAYER
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- JS -->
<script src="//code.jquery.com/jquery-3.2.1.slim.min.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" type="text/javascript"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>