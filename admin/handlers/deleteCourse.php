<?php
    require_once '../../connection.php';
    if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM courses WHERE id = '".$id."' ";
    if($conn->exec($sql)){
    session_start();
    $_SESSION['success'] = "course deleted successfully";
    header("LOCATION: ../pages/courses.php ");
    }

    }
?>