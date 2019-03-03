<?php
  $location = "LOCATION: ../pages/staff.php";
  session_start();
  if(!isset($_SESSION['admin'])){
  header("location: ../admin/login.php");
  }

  if (isset($_POST['submit'])) {
  	if (isset($_POST['courses'])) {
  		$courses_to_assign = $_POST['courses'];
  		$instructor_id = $_POST['staff_id'];
  	try{ 
  		require_once '../../connection.php';
   	  	$sql = "UPDATE courses SET instructor_id = :instructor_id WHERE id = :course_id";
   	  	$prepared_stmt = $conn->prepare($sql);
   	  	$bindarray['instructor_id'] = $instructor_id;
   	  	
   	  	foreach ($courses_to_assign as $course_id) {
   	  	 $bindarray['course_id'] = $course_id;
   	  	 $prepared_stmt->execute($bindarray);
   	  	}
   	  	$_SESSION['success'] = "Course Assigned Successfully";
   	  	header($location);
   	  }catch(PDOException $e){
   	  	$_SESSION['errors'] = "Unable to assign courses please try again".$e->getMessage();
   	  	header($location);
   	  }
  	}
  	else{
  		$_SESSION['errors'] = "You have not selected any course to assign";
   	  	header($location);
  	}
  }
  else{
  	echo "hello";
  }
 ?>