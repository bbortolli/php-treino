<?php

include_once('../config.php');
include_once(DBAPI);

function addTransaction() {

    if ( !empty($_POST) ) {
        save('transaction', $_POST);
    }
}

function updateTransaction($id = 0, $transaction = null) {

    if ( ($id !== 0) && ($transaction !== null)) {
            update('transaction', $id, $transaction);
            header('location: /transactions');
    }
}

function getAllTransactions($params = '') {

    $transactions = findAll('transaction', $params);
    return $transactions;
}

function deleteTransaction($id = null) {

    if (filter_var($id, FILTER_VALIDATE_INT)) {
        $product = remove('transaction', $id);
        header('location: /transactions');
    }
}