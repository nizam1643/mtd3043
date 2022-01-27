<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LMS-SPM | {{ asset('adminlte/') }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
  @yield('style')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/home" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link text-danger" href="{{ route('logout') }}" role="button">
          <i class="fas fa-sign-out-alt fa-lg"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="d-flex justify-content-center">
        <a href="index3.html" class="brand-link">
        {{-- <img src="" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
        <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="d-flex justify-content-center">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            {{-- <img src="" class="img-circle elevation-2" alt="User Image"> --}}
            </div>
            <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @if (Auth::user()->system_level == 1)
            <li class="nav-header">ACADEMIC SETTING</li>
            <li class="nav-item">
                <a href="{{ route('m1') }}" class="nav-link {{ (Request::segment(2)=="Year")? "active" : "" }}">
                    <i class="nav-icon fas fa-chalkboard-teacher"></i>
                    <p>
                        Year List
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('m2') }}" class="nav-link {{ (Request::segment(2)=="Group")? "active" : "" }}">
                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                <p>
                    Group List
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('m3') }}" class="nav-link {{ (Request::segment(2)=="Subject")? "active" : "" }}">
                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                <p>
                    Subject List
                </p>
                </a>
            </li>
            <li class="nav-header">USER SETTING</li>
            <li class="nav-item">
                <a href="{{ route('m4') }}" class="nav-link {{ (Request::segment(2)=="User")? "active" : "" }}">
                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                <p>
                    User List
                </p>
                </a>
            </li>
          @endif
          @if (Auth::user()->system_level <= 3)
            <li class="nav-header">MY DASHBOARD</li>
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link {{ (Request::segment(1)=="home")? "active" : "" }}">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Main Dashboard
                  </p>
                </a>
            </li>
          @endif
          <li class="nav-header">DIGITAL FORM</li>
          @if (Auth::user()->system_level == 3)
            <li class="nav-item">
                <a href="{{ route('student') }}" class="nav-link {{ (Request::segment(1)=="student")? "active" : "" }}">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Evaluation Form
                  </p>
                </a>
            </li>
          @endif
          @if (Auth::user()->system_level == 1)
            <li class="nav-item">
                <a href="{{ route('parent') }}" class="nav-link {{ (Request::segment(1)=="parent")? "active" : "" }}">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Feedback List
                  </p>
                </a>
                <a href="{{ route('studentlist') }}" class="nav-link {{ (Request::segment(1)=="student")? "active" : "" }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                      Evaluation List
                    </p>
                  </a>
            </li>
          @endif
          @if (Auth::user()->system_level == 4)
          <li class="nav-item">
              <a href="{{ route('dashboard') }}" class="nav-link {{ (Request::segment(1)=="home")? "active" : "" }}">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Feedback Form
                </p>
              </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ (Request::segment(1)=="Report")? "active" : "" }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Student Report
              </p>
            </a>
          </li>
        @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ ucwords(Request::segment(1)) }}-{{  ucwords(Request::segment(2))  }} Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">{{ ucwords(Request::segment(1)) }}-{{  ucwords(Request::segment(2))  }} Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    @yield('content')
    @include('sweetalert::alert')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
@yield('script')
</body>
</html>
