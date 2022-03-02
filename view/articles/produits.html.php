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

                            <div class='box_img'><img class='p_image' src='".$product['image1']."'></div>

                            <div class='box_texte'>
                                <div><h6>".$product['title']." / ".$product['brand']."</h6></div>
                                <div class='p_category'>".$product['id_category']." / ".$product['id_sub_category']."</div>
                                <div class='p_intro'>".$product['introduction']."</div>

                                <div class='price_cart'>

                                    <div class='price'>".$product['price']."€</div>
                                    <div><input type='number' value='1' min='1' max='".$product['stock']."'></div>
                                    <div><img class='icone' src='https://i.ibb.co/BsppLF6/image.png' alt='add_to_cart_icon'></div>

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