<?php
    require_once '../../connection.php';
    if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM departments WHERE id = '".$id."' ";
    if($conn->exec($sql)){
    session_start();
    $_SESSION['success'] = "department deleted successfully";
    header("LOCATION: ../pages/departments.php ");
    }

    }
?>