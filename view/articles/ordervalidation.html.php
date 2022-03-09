<?php
?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Titre de la page</title>
        <link rel="stylesheet" href="style.css">
        <script src="script.js"></script>
    </head>

    <body>

        <h1>Confirmez votre commande</h1>

        <h2>Vérifiez votre commande avant de passer au paiement.</h2>

        <table border='1'>
            <thead>
                <tr>
                    <td>Article</td>
                    <td>PU</td>
                    <td>Qté</td>
                    <td>Montant HT</td>
                    <td>TVA</td>
                    <td>Montant TTC</td>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($order as $product) {
                    $quantity_price = $product->price * $product->quantity;

                    $tva = '20%';
    
                    $ttc = $quantity_price * 1.20 ; 
                    
                    echo "
                    <tr>
                        <td>$product->title</td>
                        <td>$product->price</td>
                        <td>$product->quantity</td>
                        <td>$quantity_price</td>
                        <td>20%</td>
                        <td>$ttc</td>
                    </tr>";
                } ?> 

                
            </tbody>
        </table>





    </body>
</html>