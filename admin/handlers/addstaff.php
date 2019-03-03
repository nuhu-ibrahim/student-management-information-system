<?php
  require_once '../../connection.php';
  $output = '';
  session_start();
 if(isset($_POST['submit'])){
    try{
        if(empty($_POST['name']) || empty($_POST['age']) || empty($_POST['gender']) || empty($_POST['state']) || empty($_POST['staff_id']) ||  empty($_FILES['image']['name']) ||  empty($_POST['department']) ){
            $_SESSION['success'] = "All Fields Are Required";
            header("Location: //localhost/SIMS/admin/pages/addstaff.php");
            return;
           
        }else{
            $target = "../../assets/images/".basename($_FILES['image']['name']);
            $sql = "INSERT INTO staff(name,age,gender,image,department,state,staff_id,password) values (:name,:age,:gender,:image,:department,:state,:staff_id,:password)";

                $name = $_POST['name'];
                $age = $_POST['age'];
                $gender = $_POST['gender'];
                $image = $_FILES['image']['name'];
                $department = $_POST['department'];
                $state = $_POST['state'];
                $staff_id = $_POST['staff_id'];

                 $prepaarestmt = $conn->prepare($sql);
                 $bindarray['name'] = $name;
                 $bindarray['age'] = $age;
                 $bindarray['gender'] = $gender;
                 $bindarray['image'] = $image;
                 $bindarray['department'] = $department;
                 $bindarray['staff_id'] = $staff_id;
                 $bindarray['state'] = $state;
                 $bindarray['password'] = $state;
                 $prepaarestmt->execute($bindarray);
                 $output = "Student Added Successfully";
                 if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
                     $_SESSION['success'] = 'Staff Registered Successfully';
                     header("Location: //localhost/SIMS/admin/pages/addstaff.php");
                 }
                 else{
                    $_SESSION['success'] = 'Unable to add staff, pls try again';
                    header("Location: //localhost/SIMS/admin/pages/addstaff.php");
                 }
        }
        
    }
     catch(PDOException $e){
           $_SESSION['error'] = 'Unable to add staff, pls try again';
           header("Location: //localhost/SIMS/admin/pages/addstaff.php");
      }
      
        
       
    }

?>