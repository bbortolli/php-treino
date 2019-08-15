<?php

include_once('../config.php');
include_once(DBAPI);

function getAllCategories($params = '') {
    
    $categories = findAll('category', $params);
    return $categories;
}

function addCategory() {

    if (!empty($_POST['category'])) {
        $category = $_POST['category'];
        save('category', $category);
        header('location: /categories');
    }
}

function deleteCategory($id = null) {

    $product = remove('category', $id);
    header('location: /categories');
}