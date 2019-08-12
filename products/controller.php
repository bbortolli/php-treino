<?php

include_once('../config.php');
include_once(DBAPI);

function addProduct() {

    if (!empty($_POST['product'])) {
        $product = $_POST['product'];
        save('produto', $product);
        header('location: /products');
    }
}

function updateProduct($id = 0, $product = null) {

    if ( ($id !== 0) && ($product !== null)) {
            update('produto', $id, $product);
            header('location: /products');
    }
}

function getAllProducts() {
    
    $products = findAll('produto');
    return $products;
}

function deleteProduct($id = null) {

    if (filter_var($id, FILTER_VALIDATE_INT)) {
        $product = remove('produto', $id);
        header('location: /products');
    }
}