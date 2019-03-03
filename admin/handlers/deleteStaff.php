<?php
    require_once '../../connection.php';
    if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM staff WHERE staffid = '".$id."' ";
    if($conn->exec($sql)){
    session_start();
    $_SESSION['success'] = "staff deleted successfully";
    header("LOCATION: ../pages/staff.php ");
    }

    }
?>