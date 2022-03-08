<?php

$model = new \Models\Cart();
$productcart = $model->ProductsInCart();
var_dump($productcart);

?>