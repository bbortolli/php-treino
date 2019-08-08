<?php

require_once('../config.php');
require_once(DBAPI);

function getAllProducts() {
    $products = findAll('produto');
    return $products;
}

function addProduct() {

    if (!empty($_POST['product'])) {
        $product = $_POST['product'];
        save('produto', $product);
        header('location: /');
    }
}