<?php

include_once('../config.php');
include_once(DBAPI);

function getAllClients() {
    $clients = findAll('cliente');
    return $clients;
}

function addClient() {

    if (!empty($_POST['client'])) {
        $client = $_POST['client']; 
        if ( filter_var($client["'email'"], FILTER_VALIDATE_EMAIL) ) {
            save('cliente', $client);
            header('location: /clients');
        }
    }
}

function deleteClient($id = null) {

    $product = remove('cliente', $id);
    header('location: /clients');
}