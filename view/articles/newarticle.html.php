
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
    <link rel="stylesheet" href="/boutique-en-ligne/style/newarticle.css">

</head>
<body>

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
