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

function getAllTransactions() {

    $transactions = findAll('transaction');
    return $transactions;
}

function getAccTransactions() {

    $database = open_database();
    $found = null;

    if (empty($_GET['id']) || !filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
        header('location: /accounts/index.php');
        return 0;
    }

    try{
        $sql = "SELECT * FROM transaction WHERE acc_id = " . $_GET['id'];
        $result = $database->query($sql);
        if ($result->num_rows > 0) {
            $found = $result->fetch_all(MYSQLI_ASSOC);
        }
    } catch (Exception $e) {
        $_SESSION['message'] = $e->GetMessage();
	    $_SESSION['type'] = 'danger';
    }

    close_database($database);
	return $found;

}

function deleteTransaction($id = null) {

    if (filter_var($id, FILTER_VALIDATE_INT)) {
        $product = remove('transaction', $id);
    }
}

function getLastTransaction($id = null) {

    $database = open_database();
    $found = null;
    
    try{
        if($id) {
            $sql = "SELECT value, date, type FROM account, transaction WHERE account._id = " . $id . " AND account._id = transaction.acc_id ORDER BY transaction.date DESC LIMIT 1";
            $result = $database->query($sql);
            if ($result->num_rows > 0) {
                $found = $result->fetch_assoc();
            }
        }   
    } catch (Exception $e) {
        $_SESSION['message'] = $e->GetMessage();
	    $_SESSION['type'] = 'danger';
    }

    close_database($database);
	return $found;
}