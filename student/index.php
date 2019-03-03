<?php
  session_start(); 
  require_once '../connection.php'; 
  if(!isset($_SESSION['student'])){
  header("location: login.php");
  }
  $year = date("Y");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>student dashboard</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../assets/css/font-awesome.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/css/adminlte.css">
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
        <a class="nav-link" data-slide="true" href="//localhost/SIMS/student/logout.php">
          <i class="fa fa-key"></i> logout
        </a>
      </li>
    </ul>
   
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 
      <!-- Sidebar Menu -->
       <?php  include "sidebar.php"; ?>
      <!-- /.sidebar-menu -->
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Student Dashboard</h1>
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->

         <?php 
         
           if(!empty($_SESSION['error'])){
              echo "<h4 class = 'alert alert-success text-center'>".$_SESSION['error']."</h4>";
              unset($_SESSION['error']);
           }
        ?>
        <div class="row">
          <div class=" col-sm-6 col-md-4">
             <a href="//localhost/SIMS/student/pages/courses.php?year=2018">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Courses</span>
                <span class="info-box-number">
                  <?php
                      require_once '../connection.php';
                 
                  $sql = "SELECT * FROM courses WHERE id IN (SELECT course_id FROM student_course WHERE student_id = ".$_SESSION['student_id']." AND session = ".$year.") ";
                   $result = $conn->query($sql); 
                   echo $result->rowCount();
                   ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class=" col-sm-6 col-md-4">
             <a href="//localhost/SIMS/student/pages/results.php">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-calendar-o  "></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Results</span>
                <span class="info-box-number">
                  <?php
                      $sql = "SELECT * FROM results";
                      try {
                         $staff_result = $conn->query($sql);
                         $staffCount = $staff_result->rowCount();
                         echo $staffCount;
                        
                      }catch (PDOException $e) {
                        echo "N/A ".$e->getMessage();
                      }
                   ?>

                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class=" col-sm-6 col-md-4">
             <a href="//localhost/SIMS/student/pages/editprofile.php">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa  fa-user  "></i></span>

              <div class="info-box-content">
                <span class="info-box-text">My Profile</span>
                <span class="info-box-number">
                   View/Edit
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- /.col -->
        </div>
       
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
       
      </div><!--/. container-fluid -->
    </section>
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


<script type="text/javascript" src="../assets/js/jquery.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->


<!-- PAGE PLUGINS -->
<!-- SparkLine -->



<!-- PAGE SCRIPTS -->

</body>
</html>
