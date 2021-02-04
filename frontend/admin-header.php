

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
        <li id="settings" >Settings</li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>


  <!----- ***************** settings  ***************** ------>
  <div class="modal-container-settings" id="modal-container-settings" style="display:none;">
    <div class="modal-settings">

      <div class="small-container-settings">

        <div class="modal-header-settings">
          <span id="close-settings">&times;</span>
          <h2 id="title-ope-settings">Change Password</h2>
        </div>


        <div class="modal-body-settings">
          <form id="settings-form">
            <label for="old-pass">Old Password :</label>
            <input type="password" id="pass-old-pass" required="" pattern=".{8,}" maxlength="10"><br>

            <label for="new-pass">New Password :</label>
            <input type="password" id="pass-new-pass" required="" pattern=".{8,}" maxlength="10"><br>

            <label for="conf-pass">Confirm Password :</label>
            <input type="password" id="pass-conf-pass" required="" pattern=".{8,}" maxlength="10"><br>

            <button type="submit" id="pass-btn">Change</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="assets/js/jquery-3.5.1.min.js"></script>
  <script src="assets/js/settings.js"></script>

