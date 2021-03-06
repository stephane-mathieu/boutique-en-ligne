

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Ma commande</title>
        <link rel="stylesheet" href="style/ordervalidation.css">
        <script src="script.js"></script>
    </head>

    <body>

        <main>

            <h1><b>Votre commande</b></h1>
            
            <div class="flex-row">

                <!-- RECAP COMMANDE -->

                <section class="votrecommande">

                    <table>

                        <h4>Numéro <?php echo $id_order ?> du <?php echo $order[0]['date'] ?></h4>

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
                                $quantity_price = $product['price'] * $product['quantity'];

                                $tva = $quantity_price * 0.2 ;
                
                                $ttc = $quantity_price + $tva ; 
                                
                                echo "
                                <tr>
                                    <td> ".$product['title']." </td>
                                    <td> ".$product['price']." </td>
                                    <td> ".$product['quantity']." </td>
                                    <td> $quantity_price </td>
                                    <td> $tva </td>
                                    <td> $ttc </td>
                                </tr>";
                            } ?> 

                            <tr>
                                <td>TOTAL</td>
                                <td></td>
                                <td></td>
                                <td><?php echo $order[0]['excl_taxe_price'] ." €";?></td>
                                <td><?php echo $order[0]['vat'] ." €";?></td>
                                <td><?php echo $order[0]['incl_taxe_price'] ." €";?></td>
                            </tr>
                        </tbody>


                    </table>

                </section>

                <!-- RECAP INFOS LIVRAISONS -->

                <section class="infoslivraison">
                    
                    <h6>Vos informations de livraison</h6>

                    <div><u>Destinataire</u></div>
                    <div>Nom : <?php echo $shipping->lastname?></div>
                    <div>Prénom : <?php echo $shipping->firstname?></div>
                    <div></div><br>
                    <div><u>Livré au</u></div>
                    <div><?php echo $shipping->address?></div>
                    <div><?php echo $shipping->zipcode ; echo '&nbsp;'; echo $shipping->city?></div>
                    <div><?php echo $shipping->country?></div>

                </section>

       
            </div>
            
            <form method='post'>
                <button type='submit' name='confirm_order'>COMMANDER A NOUVEAU </button>
            </form>
        </main>             
    </body>
</html>