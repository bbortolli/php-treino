<?php

require_once('../config.php');
require_once(DBAPI);

function getAllClients() {
    $clients = findAll('cliente');
    return $clients;
}

function addClient() {

    if (!empty($_POST['client'])) {
        $client = $_POST['client'];
        save('cliente', $client);
        header('location: /');
    }
}