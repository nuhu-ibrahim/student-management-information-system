<?php
  session_start();
  unset($_SESSION['admin']);
  header("LOCATION: ../login.php");

?>