<?php
  session_start();  
  if(!isset($_SESSION['student'])){
  header("location: ../student/login.php");
  }
  if(!isset($_GET['year'])){
    header("location: ../student");
  }
   $year = $_GET['year'];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>registered courses</title>

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
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom" >
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
            <h2 class="m-0 text-dark text-center">REGISTERED COURSES</h2>
            <div class="col-lg-2 pull-right">
            <form action="" method="GET">
                 <div class="form-group">
                    <select class="form-controls" name = "year">
                       
                           <?php echo "<option value='".$year."'>".$year." Session</option>"; ?>
                       
                      <?php  
                       if($year != '2018')  
                       echo " <option value='2018'>2018 Session</option>";
                      
                       if($year != '2017')  
                       echo " <option value='2017'>2017 Session</option>";
                      
                      if($year != '2016')  
                       echo " <option value='2016'>2016 Session</option>";

                      if($year != '2015')  
                       echo " <option value='2015'>2015 Session</option>";

                     if($year != '2014')  
                       echo " <option value='2014'>2014 Session</option>";
                      ?>
                    </select>
                 </div>
                 <input class="btn btn-success" type="submit" name="" value="go">
             </form>
             </div>
            <?php
               if(!empty($_SESSION['success'])){
                  echo '<h4 class="alert alert-success text-center">'.$_SESSION['success'].' </h4>';
                  unset($_SESSION['success']);
               }
              if(!empty($_SESSION['errors'])){
                   $errors = $_SESSION['errors'];
                  foreach($errors as $error){
                    echo '<h5>error'.$error.'</h5>';
                  }
               }
             ?>
            
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    
      <div class="col-lg-12" id="printarea">
        
        <div class="row">
          <div class="col-lg-10 col-lg-offset-1" >
            <form action="//localhost/SIMS/student/handlers/addcourseHandler.php" method="POST">
            <table width="900px" class="table" id="">
               <thead>
                   <tr>
                     <th>S/N</th>
                     <th>Course Code</th>
                     <th>Course Title</th>
                     <th>Credit Units</th>
                     
                   </tr>
               </thead>
              
               <tbody>
                  <p class="text-left"><strong> FIRST SEMESTER </strong> </p>
                 <?php
                  require_once '../../connection.php';
                 
                  $sql = "SELECT * FROM courses WHERE id IN (SELECT course_id FROM student_course WHERE student_id = ".$_SESSION['student_id']." AND semester = 1 AND session = ".$year.") ";
                  $result = $conn->query($sql); 
                  $count = 1;
                  $total = 0;
                  if($result->rowCount() == 0){
                  ?>
                  <div class="col-lg-6">
                  <h4 class="red">No course registered for this semester</h4>
                  </div>
                 <?php
                 }
                 else{
                  while ($row = $result->fetch()) {
                 echo "<tr>
                    <td>".$count."</td>
                    <td>".$row['course_code']."</td>
                    <td>".$row['course_title']."</td>
                    <td>".$row['credit_units']."</td>";
                   
                  echo "</tr>";
                 $count++;
                 $total = $total + $row['credit_units'];
                 }
                 if($total){
                 echo "<tr>
                           <td colspan = '3' class = 'text-right'>Total Credit Units = ".$total."<td>

                       </tr>";
                     }
                  }
                 ?>
                 </tbody>
              
            </table>
                <table width="900px" class="table">

                  <thead>
                   <tr>
                     <th>S/N</th>
                     <th>Course Code</th>
                     <th>Course Title</th>
                     <th>Credit Units</th>
                    

                   </tr>
               </thead>
                <tbody>
                  <p class="text-left"><strong> SECOND SEMESTER </strong> </p>
                 <?php
                  require_once '../../connection.php';
                  $sql = "SELECT * FROM courses WHERE id IN (SELECT course_id FROM student_course WHERE student_id = ".$_SESSION['student_id']." AND semester = 2) ";
                  $result = $conn->query($sql); 
                  $count = 1;
                  $total = 0;
                 if($result->rowCount() == 0){
                  ?>
                  <div class="col-lg-6">
                  <h4 class = 'red'>No course registered for this semester</h4>
                  </div>
                 <?php
                 }
                 else{
                  while ($row = $result->fetch()) {
                 echo "<tr>
                    <td>".$count."</td>
                    <td>".$row['course_code']."</td>
                    <td>".$row['course_title']."</td>
                    <td>".$row['credit_units']."</td>";
                   
                  echo "</tr>";
                 $count++;
                 $total = $total + $row['credit_units'];
                 }

                 if($total){
                 echo "<tr>
                           <td colspan = '3' class = 'text-right'>Total Credit Units = ".$total."<td>

                       </tr>";
                      }
                }
                 ?>

               </tbody>
              
            </table>

               <div class="row">
                    <a href="#" class="btn btn-success" id="printcourse_form">print</a>
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
<script src="//localhost/SIMS/assets/js/print.js"></script>

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
