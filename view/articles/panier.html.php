<!DOCTYPE html>
<html lang="fr">
    <head>
        <!-- Site meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Free Bootstrap 4 Ecommerce Template</title>
        <!-- CSS -->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600" rel="stylesheet" type="text/css">
        <link href="style/panier.css" rel="stylesheet" type="text/css">
    </head>

    <body>


 
        <h1 class="jumbotron-heading">VOTRE PANIER</h1>

        <?php if ($products == array()) { echo "<div>Votre panier est vide.</div>
            <div> <a href='produits'><button class='btn btn-block btn-light'>Continuer vos achats</button></a></div>";}  else { ?>

        
       


        <div class="container mb-4">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col"> </th>
                                    <th scope="col">Article</th>
                                    <th scope="col">Disponibilité</th>
                                    <th scope="col" class="text-center">Quantité</th>
                                    <th scope="col" class="text-right">Prix Hors Taxes</th>
                                    <th> </th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php foreach ($products as $product) { echo "
                                    <form method='post' action='panier'>
                                        <tr>
                                            <td><img class='product_img' src=".$product->image1."> </td>
                                            <td><a href='produit?id=".$product->id."'>".$product->title."</a></td>
                                            <td>"; 
                                                if ($product->stock > 0 ) { 
                                                    echo "En stock" ; 
                                                } 
                                                else { echo "Non disponible"; } echo "
                                            </td>
                                            <td><input class='form-control' type='number' min='1' max='$product->stock' name='cart[quantity][".$product->id."]' value=".$_SESSION['cart'][$product->id]." /></td>
                                            <td class='text-right'>".number_format($product->price * $_SESSION['cart'][$product->id], $decimals=2) ."€</td>
                                    
                                        
                                        <td class='text-right'><a href='panier?del=".$product->id."' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i></button></a> </td>
                                        </tr> 
                                    " ; }
                                ?> 

                             
                                    <tr>
                                        <td></td>
                                        <td colspan='4' class='text-right'><strong>Actualisez votre panier pour enregistrer les modifications de quantités !</strong></td>
                                        <td class='text-right'><input type='submit' class='bi-bi-calculator' value='Actualiser le panier'></td>
                                    </tr>
                                </form>

                        

                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class='text-right'><a href="panier?DelCart"><button class="bi-bi-calculator">Vider le panier</button></a></td>





                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Sous total HT</td>
                                    <td class="text-right"><?php echo number_format($total_price, $decimals=2) ?>€</td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Livraison HT</td>
                                    <td class="text-right"><?php echo number_format($port, $decimals=2 )?>€</td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><strong>Total HT</strong></td>
                                    <td class="text-right"><strong><?php echo number_format($total_HT, $decimals=2) ?>€</strong></td>
                                </tr>

                                
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><strong>TVA 20%</strong></td>
                                    <td class="text-right"><strong><?php echo number_format($tva, $decimals=2) ?>€</strong></td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><strong>Total TTC</strong></td>
                                    <td class="text-right"><strong><?php echo number_format($total, $decimals=2) ?>€</strong></td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col mb-2">

            <div class="col-sm-12 col-md-6 text-right">
                
            </div>
            

            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <a href='produits'><button class="btn btn-block btn-light">CONTINUER VOS ACHATS</button></a>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <a href='cartvalidation'><button class="btn btn-lg btn-block btn-success text-uppercase">VALIDER LE PANIER</button></a>
                </div>
            </div>
        </div>

        <?php } ?>

        <!-- JS -->
        <script src="//code.jquery.com/jquery-3.2.1.slim.min.js" type="text/javascript"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" type="text/javascript"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" type="text/javascript"></script>


    </body>
</html>




