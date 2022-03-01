<?php

?>


<html lang="fr">
    <head>

        <meta charset="utf-8">
        <title>Produits</title>
        <link rel="stylesheet" href="style/produits.css">

    </head>

    <body>

        <main>

            <div class="categories">

                <h5>Catégories</h5>

                <h6>Briquets</h6>

                <ul>
                    <li>Briquets cigares</li>
                    <li>Briquets électriques</li>
                    <li>Briquets essence</li>
                </ul>

                <h6>Briquets jetables</h6>

                <ul>
                    <li>Briquets BIC</li>
                    <li>Briquets Clipper</li>
                </ul>

                <h6>Zippo</h6>

                <ul>
                    <li>Briquets Zippo</li>
                    <li>Étui Zippo</li>
                    <li>Accessoires Zippo</li>
                </ul>


            </div>

            <div class="products_list">

                <?php foreach ($all_products as $product) { 
                    echo "
                    <div class='product'>

                        <div class='box_img'><img class='p_image' src='".$product['image1']."'></div>
                        <div class='p_title'>".$product['title']." / ".$product['brand']."</div>
                        <div class='p_category'>".$product['category']." / ".$product['sub_category']."</div>
                        <div class='p_intro'>".$product['introduction']."</div>

                        <div class='price_cart'>
                            <div class='price'>".$product['price']."€</div>
                            
                            <form action='produits.html.php' method='post'>
                                <div><input type='number' value='1' min='1' max='".$product['stock']."'></div>
                                <div><img class='icone' src='https://i.ibb.co/BsppLF6/image.png' alt='add_to_cart_icon'></div>
                            </form>

                        </div>

                    </div> ";
                }
                ?>

            </div>

        </main>
    
    </body>

</html>