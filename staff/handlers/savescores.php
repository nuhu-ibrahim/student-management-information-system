<?php
  session_start(); 
   $course_id = $_POST['course_id']; 
   $course_code = $_POST['course_code'];
  $location = "LOCATION: ../pages/scores.php?id=".$course_id."&course=".$course_code;
  if(!isset($_SESSION['staff'])){
  header("location: ../staff/login.php");
  }
  $year = date('Y');
   function computeGrade($score){
   	  $grade = '';
   	  if($score >= 70){
   	  	$grade = 'A';
   	  }
   	  else if($score >= 60){
   	  	$grade = 'B';
   	  }
   	  else if($score >= 50){
   	  	$grade = 'C';
   	  }
   	  else if($score >= 45){
   	  	$grade = 'D';
   	  }
   	  else{
   	  	$grade = 'F';
   	  }
   	 return $grade;
   }
   require_once '../../connection.php';
  
   $sql = "SELECT *  FROM student_course WHERE instructor_id = '".$_SESSION['staff_id']."' AND session = '".$year."' AND course_id = ".$course_id."";
   $result = $conn->query($sql);
try{
   while ($row = $result->fetch()) {
    //print_r($row);

   	 $student_id = $row['student_id'];
   	 $score = $_POST['student'.$student_id];
     $sql = "UPDATE student_course SET total_score = '".$score."', grade = '".computeGrade($score)."' WHERE student_id = '".$student_id."' AND course_id = '".$course_id."'";
     $result2 = $conn->query($sql);
   }
   
     $_SESSION['success'] = 'Scores Updated Successfully';
     header($location);
   }catch(PDOException $e){
    $_SESSION['errors'] = 'Unable to Update Scores'.$e->getMessage();
    header($location);
   }

 ?>