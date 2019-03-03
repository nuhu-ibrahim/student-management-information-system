<?php 
  session_start();
  require_once '../../connection.php';
  if(!isset($_SESSION['student'])){
   header("Location: ../login.php");
  }
  else{
  	if(isset($_GET['id'])){
  		$course_id = $_GET['id'];
  		$student_id = $_SESSION['student_id'];
  		$sql = "DELETE FROM student_course WHERE course_id = ".$course_id." AND student_id = ".$student_id;

  		if($conn->exec($sql)){
         header("LOCATION: ../pages/courses.php ");
        }
  	}
  	else{
  		$_SESSION['error'] = 'unable to delete course please try again';
  		header("LOCATION: ../pages/courses.php ");
  	}
  }
?>