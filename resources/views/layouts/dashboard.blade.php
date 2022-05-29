<?php
$title = "Dashboard";

?>


<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>{{ $title }}</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('js/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="/css/trix.css">
  <script type="text/javascript" src="/js/trix.js"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav ">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
    </ul>
    <!-- <div class="notif-block">
      <a href="#" class="font-weight-bold">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
        </svg>
      </a> 
    </div> -->
    <div class="dropdown">
      <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
      <a href="#" class="font-weight-bold">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
        </svg>
      </a> 
      </button>
      <div class="dropdown-menu" aria-labelledby="dLabel">
        @php $admin_notifikasi = \App\Models\AdminNotification::where('notifiable_id', 1)->where('read_at', NULL)->orderBy('created_at','desc')->get(); @endphp
          @forelse ($admin_notifikasi as $notifikasi)
            @php $notif = json_decode($notifikasi->data); @endphp
            <div class="btn-block">
              <td>[{{ $notif->nama }}] {{ $notif->message }}</td>
            </div>
          @empty
            <div class="btn-block">
              <td>Tidak ada notifikasi</td>
            </div>
          @endforelse
      </div>
    </div>
    <div class="cart-block">
      <div class="cart-total">
        @php $admin_unRead = \App\Models\AdminNotification::where('notifiable_id', 1)->where('read_at', NULL)->orderBy('created_at','desc')->count(); @endphp
        <span class="text-number">
          {{ $admin_unRead }}
        </span>
      </div>
      <!-- <div class=" single-cart-block ">
        @php $user_notifikasi = \App\Models\UserNotification::where('notifiable_id', Auth::user()->id)->where('read_at', NULL)->orderBy('created_at','desc')->get(); @endphp
        @forelse ($user_notifikasi as $notifikasi)
          @php $notif = json_decode($notifikasi->data); @endphp
          <div class="btn-block">
            <td>[{{ $notif->nama }}] {{ $notif->message }}</td>
          </div>
        @empty
          <div class="btn-block">
            <td>Tidak ada notifikasi</td>
          </div>
        @endforelse
      </div>  -->
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <li class="brand-link">
      <span class="brand-text font-weight-warningdark text-danger"><h4><strong>Toko Buku</strong></h4></span>
    </li>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('img/avatar5.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <li class="d-block text-dark">{{Auth::User()->admin_name}}</li>
        </div>
      </div>

      <!-- Sidebar Menu -->
      @include('layouts.menudashboard')
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
            <h1 class="m-0 text-dark">{{ $title }}</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      @yield('content')
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Toko Buku
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2022 <a class="text-warning" href="#">Praktikum Pemrograman Internet</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('js/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}"></script>
<!--Sweet Alert-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

@yield('scriptjs')

</body>
</html>