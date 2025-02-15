<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($pageTitle); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome (CDN) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- Ionicons (Optional Icons) -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- AdminLTE CSS (CDN) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
</head>
<!-- IMPORTANT: Use "hold-transition sidebar-mini" so AdminLTE’s sidebar works -->
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- NAVBAR -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar items -->
    <ul class="navbar-nav">
      <!-- Sidebar toggle button -->
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button">
          <i class="fas fa-bars"></i>
        </a>
      </li>
      <!-- Example link in navbar -->
      <li class="nav-item d-none d-sm-inline-block">
        <a href="sample.php" class="nav-link">Sample Link</a>
      </li>
    </ul>

    <!-- Right navbar items -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="logout.php">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- MAIN SIDEBAR CONTAINER -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="profile.php" class="brand-link">
      <!-- Replace this with your logo if you want -->
      <img src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/img/AdminLTELogo.png" 
           alt="MyApp Logo" 
           class="brand-image img-circle elevation-3" 
           style="opacity: .8">
      <span class="brand-text font-weight-light">MyApp</span>
    </a>

    <!-- SIDEBAR -->
    <div class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!-- Example user image -->
          <img src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/img/user2-160x160.jpg" 
               class="img-circle elevation-2" 
               alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= htmlspecialchars($user['username']); ?></a>
        </div>
      </div>

      <!-- SIDEBAR MENU -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" 
            data-widget="treeview" 
            role="menu">
          <!-- Active profile link -->
          <li class="nav-item">
            <a href="profile.php" class="nav-link active">
              <i class="nav-icon fas fa-user"></i>
              <p>Profile</p>
            </a>
          </li>
          <!-- Another example link in the sidebar -->
          <li class="nav-item">
            <a href="sample.php" class="nav-link">
              <i class="nav-icon fas fa-link"></i>
              <p>Sample Link</p>
            </a>
          </li>
          <!-- Add more links if needed -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- /.main-sidebar -->