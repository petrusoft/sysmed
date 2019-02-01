<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <title>{{ config('app.name', 'Laravel') }}</title>

  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/skins/skin-blue.min.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

      <!-- Logo -->
      <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><i class="fa fa-user-md"></i></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>SYSMED</b></span>
      </a>

      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">

        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
            @guest
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
            @if (Route::has('register'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
            @endif 

            @else
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">{{ ucfirst(Auth::user()->name) }}</span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                  <p> {{ ucfirst(Auth::user()->name) }} </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Perfil</a>
                  </div>
                  <div class="pull-right">
                    <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                  </div>
                </li>
              </ul>
            </li>      
            @endguest
          </ul>

        </div>

      </nav>

    </header>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
      
        <!-- Sidebar user panel (optional) -->
        @guest
        @else
        <div class="user-panel">
            <div class="pull-left image">
              <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{ ucfirst(Auth::user()->name) }}</p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>    
        @endguest
        

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Buscar...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header"><strong>MENU</strong></li>
          <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="{{ route('paciente.index') }}"><i class="fa fa-link"></i><span>Pacientes</span></a></li>
          <li><a href="#"><i class="fa fa-link"></i><span>Productos</span></a></li>
          <li class="treeview">
            <a href="#"><i class="fa fa-link"></i><span>Reportes</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#">Ventas</a></li>
              <li><a href="#">Compras</a></li>
            </ul>
          </li>
        </ul>

      </section>

    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Dashboard
          <small>Home</small>
        </h1>
      </section>

      <!-- Main content -->
      <section class="content container-fluid">

        <!--------------------------
        | Your Page Content Here |
        -------------------------->
        @yield('content')

      </section>

    </div>

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="pull-right hidden-xs">
        Optica Anthony
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2019 <a href="#">PetruSoft</a>.</strong> All rights reserved.
    </footer>

    <!-- REQUIRED JS SCRIPTS -->

    <!-- Laravel Scafoll -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- jQuery 3 -->
    <script src="{{ asset('adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>

</html>