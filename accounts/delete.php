<?php 
  require_once('controller.php'); 

  if (isset($_GET['id'])){
    deleteAccount($_GET['id']);
  } else {
    die("ERRO: Parâmetros inválidos.");
  }
?>