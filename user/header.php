<?php
    session_start();
    include("connector.php");
    if(!isset($_SESSION['userid'])){
       
        ?>
        <script>window.location.href="login.php"</script>
        <?php
    }else{
        $userres= $conn->getUser($_SESSION['userid']);
        $user= mysqli_fetch_assoc($userres);
        $pic= $user['pic'];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>DigiZeal Infosolutions Pvt Ltd</title>
  <!-- General CSS Files -->
<link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="assets/bundles/weather-icon/css/weather-icons.min.css">
  <link rel="stylesheet" href="assets/bundles/weather-icon/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="assets/bundles/summernote/summernote-bs4.css">
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
              <img alt="image" src="<?php echo $user['pic'] ;?>" class="user-img-radious-style">
              <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Welcome <?php echo $user['firstname'];?></div>
              <a href="edit-profile.php" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              
              <!--<a href="#" class="dropdown-item has-icon">-->
              <!--  <i class="fas fa-cog"></i> Settings-->
              <!--</a>-->
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
              <img alt="image" src="https://digizeal.biz/images/dznewlogo.png" class="header-logo" />
              <!--<span class="logo-name">DIGI ZEAL</span>-->
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="dropdown active">
              <a href="index.php" class="nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a>
              <!--<ul class="dropdown-menu">-->
              <!--  <li class="active"><a class="nav-link" href="index.php">Dashboard V1</a></li>-->
              <!--  <li><a class="nav-link" href="index2.php">Dashboard V2</a></li>-->
              <!--</ul>-->
            </li>
            
             <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-home"></i><span>Packages</span></a>
              <ul class="dropdown-menu">
                <li class="active"><a class="nav-link" href="all-packages.php">All Packages</a></li>
                
              </ul>
            </li>
            
             <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-home"></i><span>Subscriptions</span></a>
              <ul class="dropdown-menu">
                <li class="active"><a class="nav-link" href="my-subscriptions.php">My Subscriptions</a></li>
                 <li><a class="nav-link" href="buy-subscription.php">Purchase New</a></li>
              </ul>
            </li>
            
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-home"></i><span>Campaigns</span></a>
              <ul class="dropdown-menu">
                <li class="active"><a class="nav-link" href="my-campaign.php">My Campaigns</a></li>
                <li class="active"><a class="nav-link" href="add-campaign.php">Add Campaign</a></li>
              </ul>
            </li>
            
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-home"></i><span>My Refferals</span></a>
              <ul class="dropdown-menu">
                <li class="active"><a class="nav-link" href="my-refferals.php">View Refferals</a></li>
              </ul>
            </li>
        
            
           <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-home"></i><span>Settings</span></a>
              <ul class="dropdown-menu">
                <li class="active"><a class="nav-link" href="change-password.php">Update Password</a></li>
              </ul>
            </li>
            
            <li class="dropdown">
              <a href="#" class="nav-link"><i class="fas fa-home"></i><span>Help</span></a>
            </li>
           
          </ul>
        </aside>
      </div>
      
      