
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
    <link href="style/style.css" rel="stylesheet" type="text/css">
    <link href="style/produit.css" rel="stylesheet" type="text/css">

</head>
<body>
  
<div class="container">
    <div class="row">
        <div class="col">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src=' <?php echo $all_products[0]['image1']; ?>' alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src=' <?php echo $all_products[0]['image2']; ?>' alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src=' <?php echo $all_products[0]['image3']; ?>' alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="card">
                <div class="card-header bg-dark text-white text-uppercase">
                    <i class="fa fa-heart"></i> Top product
                </div>
                    <?php echo "<a class='a' href='produit?id=".$all_products[0]['id'] ."'>"; ?>
                    <img class="img-fluid border-0" src=' <?php echo $all_products[0]['image1']; ?>' alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-text text-center"><?php echo $all_products[0]['title']; ?></h4>
                    <div class="row">
                        <div class="col">
                            <p class="btn btn-block bg-light text-black"><?php echo $all_products[0]['price']; ?> €</p>
                        </div>
                        <div class='col'>
                            <?php echo "<a href='addtocart?id=".$all_products[0]['id']."' class='btn btn-block bg-secondary text-white'>Add to cart</a>"; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container mt-3">
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-header text-white text-uppercase">
                    <i class="fa fa-star"></i> Last products
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php foreach ($all_products as $product) {
                            echo "
                            <div class='col-sm'>
                            <div class='card'>
                                <a href='produit?id=".$product['id']."'>
                                <img class='card-img-top' src='".$product['image1']."'></a><div class='card-body'>
                                    <h4 class='card-title'>".$product['title']."</h4>
                                    <p class='card-text'>".$product['introduction']."</p>
                                    <div class='row'>
                                        <div class='col'>
                                            <p class='btn btn-block bg-light text-black'>".$product['price']."€</p>
                                        </div>
                                        <div class='col'>
                                            <a href='addtocart?id=".$product['id']."' class='btn btn-block bg-secondary text-white'>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>";
                        }
                            ?>
                
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container mt-3 mb-4">
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-header bg-dark text-white text-uppercase">
                    <i class="fa fa-trophy"></i> Best products
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php foreach ($all_products2 as $product) {
                            echo "
                            <div class='col-sm'>
                            <div class='card'>
                                <a href='produit?id=".$product['id']."'>
                                <img class='card-img-top' src='".$product['image1']."'></a>
                                <div class='card-body'>
                                    <h4 class='card-title'>".$product['title']."</h4>
                                    <p class='card-text'>".$product['introduction']."</p>
                                    <div class='row'>
                                        <div class='col'>
                                            <p class='btn btn-block bg-light text-black'>".$product['price']."€</p>
                                        </div>
                                        <div class='col'>
                                            <a href='addtocart?id=".$product['id']."' class='btn btn-block bg-secondary text-white'>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>";
                        }
                            ?>
                    </div>
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
