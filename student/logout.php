<?php
  session_start();
  unset($_SESSION['student']);
  header("LOCATION: ../student/login.php");

?>