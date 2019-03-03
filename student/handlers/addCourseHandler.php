<?php 
    require_once "../../connection.php";
   session_start();
   $location = "LOCATION: ../pages/addcourses.php";
   if(isset($_POST['courses'])){
   	  $courses = $_POST['courses'];
   	  $student_id = $_SESSION['student_id'];
      $student_reg = $_SESSION['student_reg'];
      $instructor_id = '';
   	  try{
   	  	$sql = "INSERT INTO student_course (student_id,student_reg, course_id,session,instructor_id,semester) VALUES (:student_id,:student_reg,:course_id,:session,:instructor_id,:semester)";
   	  	$prepared_stmt = $conn->prepare($sql);
   	  	$bindarray['student_id'] = $student_id;
        $bindarray['student_reg'] = $student_reg;
   	  	$bindarray['session'] = date('Y');

   	  	foreach ($courses as $course_id) {
   	  	 $bindarray['course_id'] = $course_id;
          $sql2 = "SELECT * FROM courses WHERE id ='".$course_id."'";
          $result2 = $conn->query($sql2);
          while($row2 = $result2->fetch()){
           
            $instructor_id = $row2['instructor_id'];
            $semester = $row2['semester'];
          }
          if(!$instructor_id){
             $instructor_id = 0;
          }
          $bindarray['instructor_id'] = $instructor_id;
          $bindarray['semester'] = $semester;
   	  	 $prepared_stmt->execute($bindarray);
   	  	}
   	  	$_SESSION['success'] = "Course Added Successfully";
   	  	header($location);
   	  }catch(PDOException $e){
   	  	$_SESSION['errors'] = "Unable to add courses please try again".$e->getMessage();
   	  	header($location);
   	  }
   }
   else{
   	  $_SESSION['errors'] = "You Have Not select any course";
        header($location);
   }
?>