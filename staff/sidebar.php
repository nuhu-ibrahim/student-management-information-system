<aside class="main-sidebar bg-success sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="//localhost/SIMS/staff" class="brand-link">
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
               echo "src='//localhost/SIMS/assets/images/".$_SESSION['staff_image']."'";
           ?>>
        </div>
        <div class="info">
          <a href="//localhost/SIMS/staff" class="d-block">
            <?php echo $_SESSION['staff_name']; ?>
          </a>
        </div>
      </div>
<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
         
          <li class="nav-item has-treeview">
            <a href="//localhost/SIMS/staff/pages/editprofile.php" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                view profile
              </p>
            </a>
          </li>
           <li class="nav-item has-treeview">
            <a href="//localhost/SIMS/staff/pages/changepassword.php" class="nav-link">
              <i class="nav-icon fa fa-key"></i>
              <p>
                change password
              </p>
            </a>
          </li>
           <li class="nav-item has-treeview">
            <a href="//localhost/SIMS/staff/pages/students.php" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                my students
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="//localhost/SIMS/staff/pages/courses.php" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                courses
              </p>
            </a>
          </li>
         
        </ul>
      </nav>
       </div>
    <!-- /.sidebar -->
  </aside>