<aside class="main-sidebar bg-success sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="//localhost/SIMS/student" class="brand-link">
      <img src="//localhost/SIMS/assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">ABU Zaria</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar bg-success" >
      <!-- Sidebar user panel (optional) -->
      <div  class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img " class="img-circle elevation-2" alt="User Image" <?php
               echo "src='//localhost/SIMS/assets/images/".$_SESSION['student_image']."'";
           ?>>
        </div>
        <div class="info">
          <a href="//localhost/SIMS/student" class="d-block">
            <?php echo $_SESSION['student_name']; ?>
          </a>
        </div>
      </div>
<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
           <li class="nav-item has-treeview">
            <a href="//localhost/SIMS/student/pages/addcourses.php" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Add Courses
              </p>
            </a>
          </li>
           <li class="nav-item has-treeview">
            <a href="//localhost/SIMS/student/pages/dropcourses.php" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Drop Courses
              </p>
            </a>
          </li>
           <li class="nav-item has-treeview">
            <a href="//localhost/SIMS/student/pages/courses.php?year=2018" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                View Courses Form
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="//localhost/SIMS/student/pages/editprofile.php" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                view profile
              </p>
            </a>
          </li>
           <li class="nav-item has-treeview">
            <a href="//localhost/SIMS/student/pages/changepassword.php" class="nav-link">
              <i class="nav-icon fa fa-key"></i>
              <p>
                change password
              </p>
            </a>
          </li>
           <li class="nav-item has-treeview">
            <a href="//localhost/SIMS/student/pages/results.php" class="nav-link">
              <i class="nav-icon fa fa-calendar-o  "></i>
              <p>
                results
              </p>
            </a>
          </li>
         
        </ul>
      </nav>
       </div>
    <!-- /.sidebar -->
  </aside>