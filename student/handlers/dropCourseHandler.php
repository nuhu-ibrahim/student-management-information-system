<?php 
    require_once "../../connection.php";
   session_start();
   $location = "LOCATION: ../pages/dropcourses.php";
   if(isset($_POST['courses'])){
   	  $courses = $_POST['courses'];
   	  $student_id = $_SESSION['student_id'];
        
   	  try{
        $sql = "DELETE FROM student_course WHERE student_id = :student_id AND course_id = :course_id";
   	  	$prepared_stmt = $conn->prepare($sql);
   	  	$bindarray['student_id'] = $student_id;
   	  	foreach ($courses as $course_id) {
   	  	 $bindarray['course_id'] = $course_id;
          //$sql = "SELECT FROM courses WHERE"
   	  	 $prepared_stmt->execute($bindarray);
   	  	}
   	  	$_SESSION['success'] = "Courses Droped Successfully";
   	  	header($location);
   	  }catch(PDOException $e){
   	  	$_SESSION['errors'] = "Unable to drop courses please try again".$e->getMessage();
   	  	header($location);
   	  }
   }
   else{
   	  $_SESSION['errors'] = "You Have Not select any course";
        header($location);
   }
?>