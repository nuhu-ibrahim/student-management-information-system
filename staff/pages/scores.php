<?php
  session_start();  
  if(!isset($_SESSION['staff'])){
  header("location: ../staff/login.php");
  }
  $year = date('Y');

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>staff scores</title>

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
        <a class="nav-link" data-slide="true" href="//localhost/SIMS/staff/logout.php">
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
            <h2 class="m-0 text-dark text-center">
              <?php
                if(isset($_GET['course'])){
                   echo $_GET['course']." Score Sheet";
                }
              ?>
           </h2>
            
            <?php
               if(!empty($_SESSION['success'])){
                  echo '<h4 class="alert alert-success text-center">'.$_SESSION['success'].' </h4>';
                  unset($_SESSION['success']);
               }
              if(!empty($_SESSION['errors'])){
                   $error = $_SESSION['errors'];
                    echo '<h5>'.$error.'</h5>';
                 unset($_SESSION['errors']);
               }
             ?>
            
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    
      <div class="col-lg-12">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-lg-12 col-lg-offset-1" >
            <form action="//localhost/SIMS/staff/handlers/savescores.php" method="POST" enctype = "multipart/form-data">
            <table width="900px" class="table table-striped table-bordered table-hover" id="dataTables-example">
               <thead>
                  <tr>
                     <th>Reg No</th>
                     <th>Total Score</th>
                     <th>Grade</th>
                   </tr>
               </thead>
               <tbody>
                 <?php
                  require_once '../../connection.php';
                  $course_id = $_GET['id'];
                  $course_code = $_GET['course'];
                  echo "<input class = 'hidden' name = 'course_id' type = 'number' value = '". $course_id."'>";
                  echo "<input class = 'hidden' name = 'course_code' type = 'number' value = '". $course_code."'>";
                  $sql = "SELECT *  FROM student_course WHERE instructor_id = '".$_SESSION['staff_id']."' AND session = '".$year."' AND course_id = '".$course_id."'";
                  $result = $conn->query($sql);
                  while ($row = $result->fetch()) {
                 echo "<tr>
                     <td>".$row['student_reg']."</td>
                     <td> <input name = 'student".$row['student_id']."' type = 'number' value = '".$row['total_score']."'></td>
                     <td>".$row['grade']."</td>
                   
                 </tr>";
                 }
                 ?>
               </tbody>
             </table>
              <div class="row">
                   <input type="submit" class="btn btn-success" value = "save changes"/>
               </div>

              </form>
        </div>
        <!-- /.row -->
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
