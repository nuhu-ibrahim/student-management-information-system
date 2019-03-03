<?php
    require_once '../../connection.php';
    if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM student WHERE id = '".$id."' ";
    if($conn->exec($sql)){
    session_start();
    $_SESSION['success'] = "student deleted successfully";
    header("LOCATION: ../pages/students.php ");
    }

    }
?>