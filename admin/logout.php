<?php
  session_start();
  unset($_SESSION['admin']);
  header("LOCATION: ../admin/login.php");

?>