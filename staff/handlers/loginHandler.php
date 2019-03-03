<?php
   include "../../connection.php";
    session_start(); 
 if (isset($_POST['submit'])) {
    if (empty($_POST['staff_id']) || empty($_POST['password'])) {
        $_SESSION['errors'] = "Username or Password is Empty";
        header("location: ../login.php");
     }
    else{
      $username=$_POST['staff_id'];
      $password=$_POST['password'];
      try{ 
	  $sql = "select * from staff, departments where password = :password AND staff_id = :staff_id AND department = departments.id"; 
	  $result = $conn->prepare($sql);
	  $result->execute(array('password'=>$password,'staff_id'=>$username));
	  $row =$result->rowCount();

	   if($row > 0){
		  $_SESSION['staff']= $username;
		  while ($row = $result->fetch()) {
		  $_SESSION['staff_name']	= $row['name'];
		  $_SESSION['staff_id']	= $row['staffid'];
		  $_SESSION['staff_image'] = $row['image'];
		  $_SESSION['staff_age'] = $row['age'];
		  $_SESSION['staff_gender'] = $row['gender'];
		  $_SESSION['staff_department'] = $row['department_name'];
		  $_SESSION['staff_state'] = $row['state'];
		  $_SESSION['password'] = $row['password'];
		 
		  }
		  header("location: ../index.php");
	    } 
	   
	   else{
	   	 $_SESSION['errors'] = "Username or Password is invalid";
         header("location: ../login.php");
	   	}

       }
       catch(PDOException $e){
		  echo "An error occured ".$e->getMessage();
	   }
	}//end of else block
  }//end of if block
 ?>