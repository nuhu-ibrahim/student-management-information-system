<?php
   include "../../connection.php";
    session_start(); 
 if (isset($_POST['submit'])) {
    if (empty($_POST['reg_no']) || empty($_POST['password'])) {
        $_SESSION['errors'] = "Username or Password is Empty";
        header("location: ../login.php");
     }
    else{
      $username=$_POST['reg_no'];
      $password=$_POST['password'];
      try{ 
	  $sql = "select * from student where password = :password AND reg_no = :username"; 
	  $result = $conn->prepare($sql);
	  $result->execute(array('password'=>$password,'username'=>$username));
	  $row =$result->rowCount();

	   if($row > 0){
		  $_SESSION['student']= $username;
		  while ($row = $result->fetch()) {
		  $_SESSION['student_name']	= $row['name'];
		  $_SESSION['student_image'] = $row['image'];
		  $_SESSION['student_id'] = $row['id'];
		  $_SESSION['state'] = $row['state'];
		  $_SESSION['age'] = $row['age'];
		  $_SESSION['gender'] = $row['gender'];
		  $_SESSION['password'] = $row['password'];
		  $_SESSION['department'] = $row['department'];
		   $_SESSION['student_reg'] = $row['reg_no'];
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