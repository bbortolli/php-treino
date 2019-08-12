<?php 
  require_once('controller.php'); 

  if (isset($_POST['id']) && isset($_POST['product'])) {
    if (filter_var($_POST['id'], FILTER_VALIDATE_INT)) {
        $product = $_POST['product'];
        updateProduct('produto', $product);
        header('location: /products');
    }
}
?>