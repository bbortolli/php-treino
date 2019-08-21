<?php

include_once('../config.php');
include_once(DBAPI);

function getAllAccounts($params = '') {
    
    $accounts = findAll('account', $params);
    return $accounts;
}

function getAccount() {

    if( !empty($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
        $acc = find('account', $_GET['id']);
        return $acc;
    }
    else {
        header('location: /accounts/index.php');
        return 0;
    }
}

function addAccount() {

    if (!empty($_POST['account'])) {
        $account = $_POST['account'];
        if($account["'name'"] === '') {
            return;
        }
        if (empty($account["'balance'"])) {
            $account["'balance'"] = 0.0;
        }
        save('account', $account);
        header('location: /accounts');
    }
}

function deleteAccount($id = null) {

    $account = remove('account', $id);
}

function getInByCat() {

    $database = open_database();
    $found = null;

    if (empty($_GET['id']) || !filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
        return 0;
    }

    try{
        $sql = "SELECT category as label, SUM(value) as y FROM transaction WHERE acc_id = " . $_GET['id'] . " AND type = 'in' GROUP BY category";
        $result = $database->query($sql);
        $arq = fopen('ttt.txt', 'w');
        fwrite($arq, $result);
        fclose($arq);
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

function getOutByCat() {

    $database = open_database();
    $found = null;

    if (empty($_GET['id']) || !filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
        return 0;
    }

    try{
        $sql = "SELECT category as label, SUM(value) as y FROM transaction WHERE acc_id = " . $_GET['id'] . " AND type = 'out' GROUP BY category";
        $result = $database->query($sql);
        $arq = fopen('ttt.txt', 'w');
        fwrite($arq, $result);
        fclose($arq);
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