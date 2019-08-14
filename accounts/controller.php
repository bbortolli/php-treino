<?php

include_once('../config.php');
include_once(DBAPI);

function getAllAccounts() {
    $accounts = findAll('account');
    return $accounts;
}

function addAccount() {

    if (!empty($_POST['account'])) {
        $account = $_POST['account']; 
        save('account', $account);
        header('location: /accounts/all.php');
    }
}

function deleteAccount($id = null) {

    $account = remove('account', $id);
    header('location: /accounts');
}