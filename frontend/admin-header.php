<!-- <?php

      // session_start();
      // session_destroy();

      // if(isset($_SESSION['user_id'])){
      //   //pass the json data here
      //   //mag query gamit ang user_id
      // }
      // else{
      //   header("Location: account.php");
      //   exit;
      // }

      ?> -->
<!DOCTYPE html>
<html>

  <head>
    <title>Admin | Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----- ***************** css  ***************** ------>
    <link rel="stylesheet" type="text/css" href="assets/css/admin.css">
    </link>
    <link rel="stylesheet" type="text/css" href="assets/css/admin_user.css">
    </link>
    <link rel="stylesheet" type="text/css" href="assets/css/admin_feedback.css">
    </link>

    <!----- ***************** icon  ***************** ------>
    <link rel="shortcut icon" href="myIcon.ico">

    <!----- ***************** fonts  ***************** ------>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  </head>

  <body>



    <!----- ***************** sidebar  ***************** ------>
    <div class="sidebar">
      <header>HGHMNDS</header>
      <a href="admin-dashboard.php" id="ad">
        <i class="fa fa-dashboard"></i>
        <span>Dashboard</span>
      </a>
      <a href="admin-product.php" id="ap">
        <i class="fa fa-product-hunt"></i>
        <span>Products</span>
      </a>
      <a href="admin-user.php" id="au">
        <i class="fa fa-users"></i>
        <span>Users</span>
      </a>
      <a href="admin-transaction.php" id="at">
        <i class="fa fa-credit-card"></i>
        <span>Transactions</span>
      </a>
      <a href="admin-feedback.php" id="af">
        <i class="fa fa-comments-o"></i>
        <span>Feedbacks</span>
      </a>
    </div>



    <!----- ***************** rightbar  ***************** ------>
    <div class="right-bar">
      <img src="assets/images/logo.jpg" width="50px" height="50px" id="admin-toggle">
      <div class="admin-nav">
        <ul>
          <li><a href="">Settings</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>