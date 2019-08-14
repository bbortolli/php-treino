<?php 
  require_once('controller.php'); 

  if (isset($_POST['id']) && isset($_POST['transaction'])) {
    if (filter_var($_POST['id'], FILTER_VALIDATE_INT)) {
        $transaction = $_POST['transaction'];
        updateTransaction('transaction', $transaction);
        header('location: /transactions');
    }
}
?>