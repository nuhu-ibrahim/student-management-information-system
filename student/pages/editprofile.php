<?php
  session_start();  
  if(!isset($_SESSION['student'])){
  header("location: ../login.php");
  }
  if(isset($_POST['submit'])){
    try{
    if(isset($_FILES['image'])){
      $image = $_FILES['image']['name'];
      require_once '../../connection.php';
      $sql = "UPDATE student SET image = '".$image."' WHERE id = '".$_SESSION['student_id']."'";
        $conn->query($sql);
        $target = "../../assets/images/".basename($_FILES['image']['name']);
        if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
          $_SESSION['success'] = "Picture Updated Successfully";
          $_SESSION['student_image'] = $image;
        }
      }
      else{
         $_SESSION['errors'] = "Browse a new Picture First";
      }
    }catch(PDOException $e){
      
         $_SESSION['errors'] = "Unable to update picture pls try again".$e->getMessage();
     
    }
  }

   
  
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>edit profile</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="//localhost/SIMS/assets/css/font-awesome.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="//localhost/SIMS/assets/css/adminlte.css">
  <link href="//localhost/SIMS/assets/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//localhost/SIMS/assets/css/dataTables.bootstrap.css">
  <link rel="stylesheet" type="text/css" href="//localhost/SIMS/assets/css/dataTables.responsive.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
   

    <!-- SEARCH FORM -->
   

    <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-slide="true" href="../logout.php">
          <i class="fa fa-key"></i> logout
        </a>
      </li>
    </ul>
   
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
     
      <!-- Sidebar Menu -->
       <?php  include "../sidebar.php"; ?>
      <!-- /.sidebar-menu -->
   

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h2 class="m-0 text-dark text-center">View/Edit Profile</h2>
             <div class="col-lg-2 pull-right">
           
             </div>
            <?php
               if(!empty($_SESSION['success'])){
                  echo '<h4 class="alert alert-success text-center">'.$_SESSION['success'].' </h4>';
                  unset($_SESSION['success']);
               }
              if(!empty($_SESSION['errors'])){
                   $error = $_SESSION['errors'];
                    echo '<h5 class = "text-center red">'.$error.'</h5>';
                    unset($_SESSION['errors']);
               }
             ?>
            
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    
       <div class="col-lg-6 col-lg-offset-3">
            
              <table class="table table-striped">
                
                  <td>
                    <img height = "150" width = "150" class="img-circle elevation-2" alt="User Image" <?php
               echo "src='//localhost/SIMS/assets/images/".$_SESSION['student_image']."'";
                 ?>></td>
				</tr>
				<tr>
                 <td>
					<form action="editProfile.php" method="POST" enctype = "multipart/form-data" class = "form-inline">
					<input type="file" placeholder="change" name="image"> 
					<input type="submit" class="btn btn-success pull-right" name="submit" value="update">
					</form>
				</td>
                </tr>
                <tr>
                  <td>Full Name: </td><td><?php echo $_SESSION['student_name'] ?></td>
                </tr>
                 <tr>
                  <td>Department: </td><td><?php echo $_SESSION['department'] ?></td>
                </tr>
                <tr>
                  <td>State: </td><td><?php echo $_SESSION['state'] ?></td>
                </tr>
                <tr>
                  <td>Gender: </td><td><?php echo $_SESSION['gender'] ?></td>
                </tr>
                <tr>
                  <td>Age: </td><td><?php echo $_SESSION['age'] ?></td>
                </tr>
               
              </table>
            
       </div>
      </div><!--/. container-fluid -->
    
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer" style="margin-top: 410px">
    
    <strong>Copyright &copy; 2018 <a href="#">Ahmadu Bello University. Zaria</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery <script src="../assets/js/jquery.min.js"></script> -->
<!-- Bootstrap -->


<script type="text/javascript" src="//localhost/SIMS/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="//localhost/SIMS/assets/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="//localhost/SIMS/assets/js/bootstrap.js"></script>
<!-- AdminLTE App -->
<script src="//localhost/SIMS/assets/js/adminlte.js"></script>
<script type="text/javascript" src="//localhost/SIMS/assets/js/jquery.dataTables.min.js"></script>
<script src="//localhost/SIMS/assets/js/dataTables.bootstrap.min.js"></script>
<script src="//localhost/SIMS/assets/js/dataTables.responsive.js"></script>

<!-- OPTIONAL SCRIPTS -->

<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            //responsive: true
        });
    });
</script>

</body>
</html>
