<?php
  require_once '../../connection.php';
  $output = '';
  session_start();
 if(isset($_POST['submit'])){
  if(!empty($_POST['faculty_name'])){
    try{
        $sql = "INSERT INTO faculties(faculty_name) values (:faculty_name)";

         $faculty_name = $_POST['faculty_name'];
         $prepaarestmt = $conn->prepare($sql);
         $bindarray['faculty_name'] = $faculty_name;

         $prepaarestmt->execute($bindarray);
        
         $_SESSION['success'] = 'Faculty Added Successfully';
         header("Location: //localhost/SIMS/admin/pages/addfaculty.php");
    }
     catch(PDOException $e){
          // echo  "above line 28".$e->getMessage();

           $_SESSION['error'] = 'Unable to add Faculty, pls try again';
           header("Location: //localhost/SIMS/admin/pages/addfaculty.php");
      }
    }
     else{
       $_SESSION['error'] = 'Enter Faculty Name and try again';
       header("Location: //localhost/SIMS/admin/pages/addfaculty.php");
    }
      
    }


?>