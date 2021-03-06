<html lang="fr">
    <head>

        <meta charset="utf-8">
        <title>Produits</title>
        <link rel="stylesheet" href="style/produits.css">

    </head>

    <body>

        <main>

            <h1>Tous nos produits</h1>

            <section>

                <div class="categories">

                    <h4>Catégories</h4>

                    <?php

                        foreach ($all_categories as $category) {

                            echo "<h5><a href='produits?category=".$category['category']."'>".$category['category']."</a></h5>

                            <ul> ";

                                foreach ($all_sub_categories as $sub_category) {

                                    if ($sub_category['id_category'] == $category['id']) {

                                        echo "<li><a href='produits?sub_category=".$sub_category['sub_category']."'>".$sub_category['sub_category']."</a></li>";
                                    }
                                }
                            echo "</ul>";
                        }

                    ?>

                </div>

                <div class="products_list">
                    <?php foreach ($all_products as $product) {
                        echo "
                        <div class='product'>
                            <div class='box_img'>
                                <a href='produit?id=". $product['id'] ."'>
                                <img class='p_image' src='".$product['image1']."'></a>
                            </div>
                            <div class='box_texte'>
                                <div><h6>".$product['title']." / ".$product['brand']."</h6></div>
                                <div class='p_category'>".$product['category']." / ".$product['sub_category']."</div>
                                <div class='p_intro'>".$product['introduction']."</div>
                                <div class='price_cart'>
                                    <div class='price'>".$product['price']."€</div>" ;
                                    if($product['stock'] > 0) { echo "
                                    <div><a href='addtocart?id=".$product['id']."'><img class='icone' src='/boutique-en-ligne/view/assets/add-to-basket.PNG' alt='add_to_cart_icon'></a></div> " ;
                                    } else  { echo "
                                        <div>Produit indisponible</div> " ;
                                    }
                                 echo "
                                </div>
                            </div>
                        </div> ";
                    }
                    ?>
                </div>

            </section>

        </main>
    
    </body>

</html>
