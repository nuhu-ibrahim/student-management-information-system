<?php 
  $username = "root";
  $password = "";
  $hostname = "localhost";
  $dbname = "smis";
 try{
	 $conn = new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
	 $conn->setAttribute
		(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }
 catch(PDOException $e){
	 echo "unable to connect". $e->getMessage();
 } 
 ?>