<?php
   session_start();
   $year = $_GET['year'];
   $semester = $_GET['semester'];
   $student_id = $_SESSION['student_id'];
   require_once '../../connection.php';
   
 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>results</title>

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
 
       <?php  include "../sidebar.php"; ?>
     
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h2 class="m-0 text-dark text-center">
            	<?php
                    echo $year." semester ".$semester." result";
            	 ?>
            </h2>
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
    
       <div class="col-lg-6 col-lg-offset-3" style="background-color: white" id="printarea">
            <form action="editProfile.php" method="POST" enctype = "multipart/form-data">
              <table class="table table-striped">
              	<tr>
                  <td>Full Name: </td><td><?php echo $_SESSION['student_name'] ?></td>
                </tr>
                <tr>
                  <td>Reg Number: </td><td><?php echo $_SESSION['student_reg'] ?></td>
                </tr>
               </table>
               <table class="table ">
               	<tr>
               		<th>S/N</th>
               		<th>course code</th>
               		<th>course title</th>
               		<th>unit</th>
               		<th>grade</th>
               		<th>total point</th>
               	</tr>
                <?php 
                   $count = 1;
                   $total_credit_units = 0;
                   $total_credit_points = 0;
                   $GPA= 0;
                   $remarks = array();
                    $sql = "SELECT * FROM student_course WHERE student_id = :student_id AND session = :session AND semester = :semester";
                   $result = $conn->prepare($sql);
                  $result->execute(array('student_id'=>$student_id,'session' => $year, 'semester' => $semester));

                  while ($row = $result->fetch()){
                    $point_scored = 0;
                    $grade = $row['grade'];
                    if(!$grade){
                      $grade = 'N/A';
                    }
                    if($grade == 'A'){
                      $point_scored = 5;
                    }
                    else if($grade == 'B'){
                      $point_scored = 4;
                    }
                    else if($grade == 'C'){
                      $point_scored = 3;
                    }
                    else if($grade == 'D'){
                      $point_scored = 2;
                    }
                    else{
                      $point_scored = 0;
                      $remarks[] = $row['course_id'];
                    }
                    
                  	$sql = "SELECT * FROM courses WHERE id = '".$row['course_id']."'";
                  	$courseresult = $conn->query($sql);
                 
                    
                  	while($course = $courseresult->fetch()){
                  		$course_title = $course['course_title'];
                  		$course_code = $course['course_code'];
                  		$credit_units = $course['credit_units'];
                  	
   	                echo "<tr>
                             <td>".$count."</td>
                             <td>".$course_code."</td>
                             <td>".$course_title."</td>
                             <td>".$credit_units."</td>
                             <td>".$grade."<td>
                             <td>".$point_scored * $credit_units."</td>
   	                     </tr>";
                         $total_credit_units += $credit_units;
                         $total_credit_points += $point_scored * $credit_units;
                  }
                }        if($total_credit_units>0)
                         $GPA = $total_credit_points / $total_credit_units;
                ?>
                
                <tr>
                 
                   <td colspan="3">Grade Point Average (GPA): </td>
                   <td><?php echo number_format($GPA,2); ?></td>
                  
                </tr>
                <tr>
                  <td>Remarks:</td>
                  <td colspan="3">
                    <?php
                    if($remarks){
                       foreach ($remarks as $remark) {
                          $sql = "SELECT * FROM courses WHERE id = '".$remark."'";
                          $result = $conn->query($sql);
                          while ($row3 = $result->fetch()) {
                            echo " ".$row3['course_code']." |";
                          }
                        }
                      }
                    else{
                      if($GPA)
                      echo "Passed";
                      else
                        echo "RESULT NOT AVAILABLE";
                    } 
                        
                    ?>
                  </td>
                </tr>
               
              </table>
            </form>
            <a href="#" class="btn btn-success" id="printresult">print</a>
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
