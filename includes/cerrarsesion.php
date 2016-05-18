<?php
  session_start();
  unset($_SESSION["k_username"]); 
  session_destroy();
  header("Location: ../index.php");
 // exit;
?>