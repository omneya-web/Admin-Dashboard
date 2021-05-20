<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\admin;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Scan-Ray</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/pluginsy/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/pluginsy/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="/pluginsy/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/disty/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/pluginsy/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/pluginsy/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="/pluginsy/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>

    </ul>



    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">

     </li>                                   

      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="/dist/img/logo-puris.png" alt="Scan_Ray" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/adminprofile" class="d-block">{{Auth::User()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-header">PAGES</li>
          <li class="nav-item">
            <a href="/home" class="nav-link">
              <i class="fas fa-home"></i>
              <p>Home</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="/adminprofile" class="nav-link">
              <i class="far fa-user-circle"></i>
              <p>
                Admin Profile
              </p>
            </a>

          </li>
          <li class="nav-item">
            <a href="/primary" class="nav-link">
              <i class="fa fa-medkit"></i>
              <p>Primary Examinations</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/places" class="nav-link">
              <i class="fa fa-map-marker-alt"></i>
              <p>Places</p>
            </a>
          </li>
          

          <li class="nav-header">Users</li>
          <li class="nav-item">
            <a href="/users" class="nav-link">
              <i class="fas fa-users"></i>
              <p>Manage Users</p>
            </a>
          </li>

         
          <li class="nav-item">
            <a href="/addUser" class="nav-link">
              <i class="fas fa-user-plus"></i>
              <p>Add user</p>
            </a>
          </li>


          <li class="nav-header">Admins</li>
          <li class="nav-item">
            <a href="/admins" class="nav-link">
             <i class="fas fa-users"></i>
              <p>
                Manage Admins
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/addAdmin" class="nav-link">
              <i class="fas fa-user-plus"></i>
              <p>
                Add Admin
              </p>
            </a>
          </li>
         
          <li class="nav-header">Others</li>
         
          <li class="nav-item">
          <a href="/feedback " class="nav-link" >
          <i class="fa fa-twitch"></i>
              <p>
                FeedBack
              </p>
          
          </a>
          </li>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
           @csrf
          </form>
          <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
           {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
           @csrf
          </form>
           
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->


                         @yield('content')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/pluginsy/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/pluginsy/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/pluginsy/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/pluginsy/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/pluginsy/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/pluginsy/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/pluginsy/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/pluginsy/moment/moment.min.js"></script>
<script src="/pluginsy/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/pluginsy/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/pluginsy/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/pluginsy/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/disty/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/disty/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/disty/js/demo.js"></script>



<script src="/pluginsy/datatables/jquery.dataTables.js"></script>
<script src="/pluginsy/datatables-bs4/js/dataTables.bootstrap4.js"></script>



<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>












</body>
</html>
