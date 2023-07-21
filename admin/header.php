<?php
    session_start();
    
    if(!isset($_SESSION['adminid'])){
        ?>
        <script>window.location.href="login.php"</script>
        <?php
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>DigiZeal- Admin Dashboard</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap4.min.css">
   <style>
      .dark-sidebar .main-sidebar .sidebar-brand{
          background-color: #fff;
      }
  </style>
  <script src="assets/js/app.min.js"></script>
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <div class="form-inline me-auto">
          <ul class="navbar-nav me-3">
            <li><a href="#" data-bs-toggle="sidebar" class="nav-link nav-link-lg collapse-btn"><i
                  class="fas fa-bars"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i class="fas fa-expand"></i>
              </a>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
         
          <li class="dropdown"><a href="#" data-bs-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="assets/img/user.png" class="user-img-radious-style">
              <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Hello Admin</div>
              <a href="#" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
             
              <div class="dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.php">
              <img alt="image" src="https://digizeal.biz/images/dznewlogo.png" class="header-logo" width="150px"/>
              <!--<span class="logo-name">DIGI ZEAL</span>-->
            </a>
          </div>
          <ul class="sidebar-menu">
            
            <li class="dropdown active">
              <a href="index.php" class="nav-link"><i class="fas fa-bars"></i><span>Dashboard</span></a>
            </li>
            
             <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-dollar-sign"></i><span>Subscription Master</span></a>
              <ul class="dropdown-menu">
                 <li><a class="nav-link" href="add-package.php">Add New Subscription</a></li>
                 <li><a class="nav-link" href="all-subscriptions.php">View Subscriptions</a></li>
              </ul>
            </li>
            
               <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>DigiZeal</span></a>
              <ul class="dropdown-menu">
                 <li><a class="nav-link" href="view-users.php">View Users</a></li>
                 <li><a class="nav-link" href="upload-video-undertaking.php">Reupload Video</a></li>
                 <li><a class="nav-link" href="view-payments.php">View Payments</a></li>
                 <li><a class="nav-link" href="all-campaigns.php">View Campaigns</a></li>
                 <li><a class="nav-link" href="#">View Coupons</a></li>
              </ul>
            </li>
            
            
             <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>EInfluencer</span></a>
              <ul class="dropdown-menu">
                  
                 <li><a class="nav-link" href="all-influencers.php">View Users</a></li>
                 <li><a class="nav-link" href="social-media-account-list.php">View Social Media Profiles</a></li>
                 <li><a class="nav-link" href="all-kyc-details.php">View KYC</a></li>
                 <li><a class="nav-link" href="view-submitions.php">View Tasks</a></li>
                 <li><a class="nav-link" href="reported-tasks.php">Reported Tasks</a></li>
                 <li><a class="nav-link" href="view-task-payments.php">Task Payments</a></li>
                 <li><a class="nav-link" href="add-task-payment.php">Add Task Payment</a></li>
              </ul>
            </li>
            
          
            
              <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-home"></i><span>Franchise</span></a>
              <ul class="dropdown-menu">
                 <li><a class="nav-link" href="add-franchise.php">Add Franchise</a></li>
                 <li><a class="nav-link" href="view-franchise.php">View Franchise</a></li>
              </ul>
            </li>
            
    
            
              <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-tools"></i><span>Settings</span></a>
              <ul class="dropdown-menu">
                <li class="active"><a class="nav-link" href="change-password.php">Change Password</a></li>
                <li class="active"><a class="nav-link" href="logout.php">LogOut</a></li>
              </ul>
            </li>
            
          
            
            <li><a href="#" class="nav-link"><i class="fas fa-home"></i><span>Queries By Users</span></a></li>
            
        
          </ul>
        </aside>
      </div>