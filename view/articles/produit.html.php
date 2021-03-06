<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Site meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600" rel="stylesheet" type="text/css">
    <link href="style/produit.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home">Home</a></li>
                        <li class="breadcrumb-item"><a href="produits">Produits</a></li>
                        <?php echo "<li class='breadcrumb-item active' aria-current='page'>"; ?>
                        <?php echo $article[0]['title'] ?>
                        <?php echo "</li>"; ?>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <!-- Image -->
            <div class="col-12 col-lg-6">
                <div class="card bg-light mb-3">
                    <div class="card-body">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <!-- <img class="d-block w-100" src="" alt="First slide"> -->
                                    <?php echo "<img class='img-fluid' src='" . $article[0]['image1'] . "'>"; ?>

                                </div>
                                <div class="carousel-item">
                                    <?php echo "<img class='img-fluid' src='" . $article[0]['image2'] . "'>"; ?>
                                </div>
                                <div class="carousel-item">
                                    <?php echo "<img class='img-fluid' src='" . $article[0]['image3'] . "'>"; ?>
                                </div>
                                <div class="carousel-item">
                                    <?php echo "<img class='img-fluid' src='" . $article[0]['image4'] . "'>"; ?>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Pr??c??dent</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Suivant</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add to cart -->
            <div class="col-12 col-lg-6 add_to_cart_block">
                <div class="card bg-light mb-3">
                    <div class="card-body">
                        <p class="title"><?php echo $article[0]['title'] ?></p>
                        <p class="intro"><?php echo $article[0]['introduction'] ?>... <a href="#description"> > </a></p>
                        <p class="price"><?php echo $article[0]['price'] ?> ???</p>
                        <!-- <p class="price_discounted">149.90 $</p> -->
                        <form method="post">
                             <?php if ($article[0]['stock'] > 0){
                                 echo "<a href='addtocart?id=".$article[0]['id']."' name='addtocart' class='btn btn-black btn-lg btn-block text-uppercase white-text'>";
                                  echo "<i class='fa fa-shopping-cart white-text orange-hover'></i> AJOUTER AU PANIER";
                                 echo "<a href='produits' class='btn btn-black btn-lg btn-block text-uppercase white-text'>
                                  CONTINUER VOS ACHATS
                                  </a>";
                            } else {
                                echo "Produit Indisponible";
                             }
                             ?>
                            </a>

                            

                        </form>

                        <div class="reviews_product p-3 mb-2 ">
                            <?php echo $count[0]["COUNT(*)"] ." note(s)  " ?>
                            <?php $nombre = round($moyenne[0]["AVG(note)"]); echo "($nombre/5)"; ?>
                            <?php 
                            $i= 0;
                                while($i != $nombre){
                                        echo "<span class='fa fa-star'></span>";
                                        $i++;
                                        // var_dump($i);
                                    }
                            ?>
                            <a class="pull-right" href="#reviews">Voir tous les commentaires</a>
                            
                        </div>
                        <?php echo "<a class='pull-right' href='addcommentaire?id_article=".$article[0]['id']."'>Ajouter un commentaire</a>"; ?>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Description -->
            <?php if(empty($article[0]['description'])){} else { ?>
            <div id="description" class="col-12">
                <div class="card border-light mb-3">
                    <div class="card-header bg-orange text-black text-uppercase"><i class="fa fa-align-justify "></i> Description</div>
                    <div class="card-body">
                        <p class="card-text">
                            <?php echo $article[0]['description']; ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php } ?>

            <!-- Material -->
            <div class="col-12">
                <div class="card border-light mb-3">
                    <div class="card-header bg-orange text-black text-uppercase"><i class="fa fa-align-justify "></i> Mati??res & Couleurs & Dimensions</div>
                    <div class="card-body">

                        <?php if(empty($article[0]['material'])){} else {  ?>

                            <p class="card-text">
                                Mati??res : <?php echo $article[0]['material']; ?>
                            </p>

                        <?php } ?>

                        <?php if(empty($article[0]['colors'])){} else { ?>

                        <p class="card-text">
                            Couleurs : <?php echo $article[0]['colors']; ?>
                        </p>

                        <?php } ?>



                        <p class="card-text">
                            Dimensions : <?php echo $article[0]['dimensions']; ?>
                        </p>

                    </div>
                </div>
            </div>

            <!-- SPECIFICITES -->

            <?php if(empty($article[0]['specificities'])) {} else {?>
            <div id="description" class="col-12">
                <div class="card border-light mb-3">
                    <div class="card-header bg-orange text-black text-uppercase"><i class="fa fa-align-justify "></i> Sp??cificit??s</div>
                    <div class="card-body">
                        <p class="card-text">
                            <?php echo $article[0]['specificities']; ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php } ?>

            <!-- Reviews -->
            <div class="col-12" id="reviews">
                <div class="card border-light mb-3">
                    <div class="card-header bg-black text-white text-uppercase"><i class="fa fa-comment"></i> Commentaires</div>
                    <div class="card-body">
                        <?php
                            foreach ($comment as $commentaire){
                                $i = 0;
                                // var_dump($commentaire['note']);
                                while($i != $commentaire['note']){
                                    echo "<span class='fa fa-star'></span>";
                                    $i++;
                                    // var_dump($i);
                                }
                                echo "
                                <div class='review'>
                                <span class='glyphicon glyphicon-calendar' aria-hidden='true'></span>
                                <meta itemprop='datePublished' content='01-01-2016'>".$commentaire['date']."
                                    by ".$commentaire['firstname']."
                                    <p class='blockquote'>
                                    <p class='mb-0'>".$commentaire['text']."</p>
                                    </p>
                                    <hr>
                                    </div>
                                 
                                    ";
                                    
                                }
                                ?>
           
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal image -->
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Product title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo "<img class='img-fluid' src='" . $article[0]['image1'] . "'>"; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="//code.jquery.com/jquery-3.2.1.slim.min.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" type="text/javascript"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        //Plus & Minus for Quantity product
        $(document).ready(function() {
            var quantity = 1;

            $('.quantity-right-plus').click(function(e) {
                e.preventDefault();
                var quantity = parseInt($('#quantity').val());
                $('#quantity').val(quantity + 1);
            });

            $('.quantity-left-minus').click(function(e) {
                e.preventDefault();
                var quantity = parseInt($('#quantity').val());
                if (quantity > 1) {
                    $('#quantity').val(quantity - 1);
                }
            });

        });
    </script>
</body>

</html>