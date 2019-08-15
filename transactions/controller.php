<?php

include_once('../config.php');
include_once(DBAPI);

function addTransaction() {

    if (!empty($_POST['transaction'])) {
        $transaction = $_POST['transaction'];
        print_r($transaction);
        save('transaction', $transaction);
        /*
        if ($transaction["'type'"] === 0) {
            //update('account'); soma na conta
        }
        else {
            //upadte('account'); subtrai da conta
        }
        */
        //header('location: /transactions/add.php');
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