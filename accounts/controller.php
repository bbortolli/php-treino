<?php

include_once('../config.php');
include_once(DBAPI);

function getAllAccounts($params = '') {
    
    $accounts = findAll('account', $params);
    return $accounts;
}

function addAccount() {

    if (!empty($_POST['account'])) {
        $account = $_POST['account'];
        if (empty($account["'balance'"])) {
            $account["'balance'"] = 0.0;
        }
        save('account', $account);
        header('location: /accounts/all.php');
    }
}

function deleteAccount($id = null) {

    $account = remove('account', $id);
    header('location: /accounts/all.php');
}