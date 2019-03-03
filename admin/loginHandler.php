<?php
   include "../connection.php"; 
   session_start();
 if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $_SESSION['error']= "Username or Password is Empty";
        header("location: ../admin/login.php");
        
     }
    else{
      $username=$_POST['username'];
      $password=$_POST['password'];
      try{ 
	  $sql = "select * from admin where password = :password AND username = :username"; 
	  $pstmt = $conn->prepare($sql);
	  $pstmt->execute(array('password'=>$password,'username'=>$username));
	  $row=$pstmt->rowCount();

	   if($row > 0){
	   	   session_start();
		  $_SESSION['admin']= $username;
		  header("location: ../admin/index.php");
	    } 
	   
	   else{
	   	 $_SESSION['error'] = "Username or Password is invalid";
	   	 header("location: ../admin/login.php");
	   	 
	   	}

       }
       catch(PDOException $e){
		  echo "An error occured ".$e->getMessage();
	   }
	}//end of else block
  }//end of if block
 ?>