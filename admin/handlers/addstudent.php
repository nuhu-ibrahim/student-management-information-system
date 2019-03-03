<?php
  require_once '../../connection.php';
  //$output = '';
   session_start();
 if(isset($_POST['submit'])){
   if(empty($_POST['name']) || empty($_POST['age']) || empty($_POST['gender']) || empty($_POST['state']) || empty($_POST['level']) ||  empty($_FILES['image']['name']) ){
        $_SESSION['success'] = "All Fields Are Required";
        header("Location: //localhost/SIMS/admin/pages/addstudent.php");
        return;
       
   }
    try{
        $target = "../../assets/images/".basename($_FILES['image']['name']);
        $sql = "INSERT INTO student (name,age,gender,image,level,department,state,reg_no,password) values (:name,:age,:gender,:image,:level,:department,:state,:reg_no,:password)";
        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $image = $_FILES['image']['name'];
        $department = $_POST['department'];
        $level = $_POST['level'];
        $state = $_POST['state'];
        $reg_no = $_POST['reg_no'];

         $prepaarestmt = $conn->prepare($sql);
         $bindarray['name'] = $name;
         $bindarray['age'] = $age;
         $bindarray['gender'] = $gender;
         $bindarray['image'] = $image;
         $bindarray['level'] = $level;
         $bindarray['department'] = $department;
         $bindarray['reg_no'] = $reg_no;
         $bindarray['state'] = $state;
         $bindarray['password'] = $state;
         $prepaarestmt->execute($bindarray);
         $output = "Student Added Successfully";
    }
     catch(PDOException $e){
              $_SESSION['success'] = $output.$e->getmessage();
              header("Location: //localhost/SIMS/admin/pages/addstudent.php");
              return;
              
      }
      
        if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
        	 session_start();
              $_SESSION['success'] = $output;
              header("Location: //localhost/SIMS/admin/pages/addstudent.php");
              return;
         }
        else{
            $_SESSION['success'] = "Failure";
              header("Location: //localhost/SIMS/admin/pages/addstudent.php");
              return;
        }
       
    }
    else{
      echo "Hello";
      return;
    }

?>