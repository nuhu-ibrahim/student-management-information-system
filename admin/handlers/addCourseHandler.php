<?php
  require_once '../../connection.php';
  $output = '';
  session_start();
 if(isset($_POST['submit'])){
    if(!isset($_POST['course_title']) || empty($_POST['course_code']) || empty($_POST['credit_units']) | empty($_POST['department'])){
       $_SESSION['error'] = "All fields are required... check and try again";
       header("Location: //localhost/SIMS/admin/pages/addcourse.php");
       return;
    }
    try{
        $sql = "INSERT INTO courses (course_title,course_code,credit_units,department_name,department_id,semester) values (:course_title,:course_code,:credit_units,:department_name,:department_id,:semester)";

        $course_title = $_POST['course_title'];
        $semester = $_POST['semester'];
        $course_code = $_POST['course_code'];
        $credit_units = $_POST['credit_units'];
        $department_id = $_POST['department'];
        $department_name = '';
             $sql2 = "SELECT * FROM departments WHERE id = '".$department_id."' LIMIT 1";
             try {
                  $result = $conn->query($sql2);
                  while ($row = $result->fetch()) {
                 $department_name = $row['department_name'];
                }
             } catch (PDOException $e) {
                echo $e->getMessage();
             }
             
        
         $prepaarestmt = $conn->prepare($sql);
         $bindarray['course_title'] = $course_title;
         $bindarray['course_code'] = $course_code;
         $bindarray['credit_units'] = $credit_units;
         $bindarray['department_id'] = $department_id;
         $bindarray['department_name'] = $department_name;
         $bindarray['semester'] = $semester;


         if($prepaarestmt->execute($bindarray)){
         $_SESSION['success'] = 'Course Added Successfully';
         header("Location: //localhost/SIMS/admin/pages/addcourse.php");
         }
    }
     catch(PDOException $e){
           echo  "above line 28".$e->getMessage();
           $_SESSION['error'] = 'Unable to add Course, pls try again'.$e->getMessage();
           header("Location: //localhost/SIMS/admin/pages/addcourse.php");
      }
      
    }

?>