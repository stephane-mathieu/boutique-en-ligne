<?php
?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Titre de la page</title>
        <link rel="stylesheet" href="style/ordervalidation.css">
        <script src="script.js"></script>
    </head>

    <body>

        <h1>Confirmez votre commande</h1>

        <h5>Vérifiez votre commande et vos informations de livraison avant de passer au paiement.</h5>

        <div class="flex-row">

        <!-- RECAP COMMANDE -->

        <section>

            <table>

                <h6>Votre commande</h6>

                <thead>
                    <tr>
                        <td> Articles </td>
                        <td> PU </td>
                        <td> Qté </td>
                        <td> Montant HT </td>
                        <td> TVA </td>
                        <td> Montant TTC </td>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($order as $product) {
                        $quantity_price = $product->price * $product->quantity;

                        $tva = $quantity_price * 0.2 ;
        
                        $ttc = $quantity_price + $tva ; 
                        
                        echo "
                        <tr>
                            <td> $product->title </td>
                            <td> $product->price </td>
                            <td> $product->quantity </td>
                            <td> $quantity_price </td>
                            <td> $tva </td>
                            <td> $ttc </td>
                        </tr>";
                    } ?> 

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>TOTAL</td>
                        <td></td>
                        <td></td>
                        <td><?php echo $order[0]->excl_taxe_price ;?></td>
                        <td><?php echo $order[0]->vat ;?></td>
                        <td><?php echo $order[0]->incl_taxe_price;?></td>
                    </tr>

                    
                </tbody>
            </table>

            <form method='post'>
                <button type='submit' name='update_order'>Modifier la commande</button>
            </form>

        </section>

        

        <!-- RECAP INFOS LIVRAISONS -->

        <section>
            <h6>Vos informations de livraison</h6>

            <div>Destinataire</div>
            <div>Nom : <?php echo $shipping->lastname?></div>
            <div>Prénom: <?php echo $shipping->firstname?></div>
            <div></div>
            <div>Livré au</div>
            <div><?php echo $shipping->address?></div>
            <div><?php echo $shipping->zipcode ; echo '&nbsp;'; echo $shipping->city?></div>
            <div><?php echo $shipping->country?></div>

            <div><a href="livraison?order=<?php echo $id_order?>"><button>Modifier la livraison </button></a></div>

        </section>

        <form method='post'>
            <button type='submit' name='confirm_order'>Valider et passer au paiement</button>
        </form>



    </body>
</html>