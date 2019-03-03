<?php
  session_start();
  unset($_SESSION['staff']);
  header("LOCATION: ../staff/login.php");

?>