<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<title>Votre panier</title>
</head>
<body>

<form method="post" action="panier.php">
<table style="width: 400px">
    <tr>
        <td colspan="4">Votre panier</td>
    </tr>
    <tr>
        <td>Libellé</td>
        <td>Quantité</td>
        <td>Prix Unitaire</td>
        <td>Action</td>
    </tr>


    <?php
    if ($CreateCart())
    {
       $nbArticles=count($_SESSION['cart']['titleArticle']);
       if ($nbArticles <= 0)
       echo "<tr><td>Votre panier est vide </ td></tr>";
       else
       {
          for ($i=0 ;$i < $nbArticles ; $i++)
          {
             echo "<tr>";
             echo "<td>".htmlspecialchars($_SESSION['cart']['titleArticle'][$i])."</ td>";
             echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['cart']['qteArticle'][$i])."\"/></td>";
             echo "<td>".htmlspecialchars($_SESSION['cart']['prixProduit'][$i])."</td>";
             echo "<td><a href=\"".htmlspecialchars("panier.php?action=suppression&l=".rawurlencode($_SESSION['cart']['titleArticle'][$i]))."\">XX</a></td>";
             echo "</tr>";
          }

          echo "<tr><td colspan=\"2\"> </td>";
          echo "<td colspan=\"2\">";
          echo "Total : ". $TotalPrice;
          echo "</td></tr>";

          echo "<tr><td colspan=\"4\">";
          echo "<input type=\"submit\" value=\"Rafraichir\"/>";
          echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";

          echo "</td></tr>";
       }
    }
    ?>
</table>
</form>
</body>
</html>