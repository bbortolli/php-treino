<?php

include_once('../config.php');
include_once(DBAPI);

function getAllCategories() {
    $categories = findAll('categoria');
    return $categories;
}

function addCategory() {

    if (!empty($_POST['category'])) {
        $category = $_POST['category'];
        save('categoria', $category);
        header('location: /categories');
    }
}

function deleteCategory($id = null) {

    $product = remove('categoria', $id);
    header('location: /categories');
}