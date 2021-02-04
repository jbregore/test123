<?php
  session_start();
  if (isset($_SESSION['user_id'])) {
  } else {
    header("Location: account.php");
    exit;
  }


include 'admin-header.php';
?>



<main>
  <h2>Dashboard</h2>
  <div class="row">
    <div class="col-3">
      <div class="card-total">
        <i class="fa fa-product-hunt"></i>
      </div>
      <div class="card-body">
        <h1 id="total-products">10</h1>
        <span>Products</span>
      </div>
      <div class="card-footer">
        <a href="">View</a>
      </div>
    </div>

    <div class="col-3">
      <div class="card-total">
        <i class="fa fa-users"></i>
      </div>
      <div class="card-body">
        <h1 id="total-users">20</h1>
        <span>Users</span>
      </div>
      <div class="card-footer">
        <a href="">View</a>
      </div>
    </div>

    <div class="col-3">
      <div class="card-total">
        <i class="fa fa-credit-card"></i>
      </div>
      <div class="card-body">
        <h1 id="total-sales">100</h1>
        <span>Total Sales</span>
      </div>
      <div class="card-footer">
        <a href="admin-transaction.php">View</a>
      </div>
    </div>

  </div>
</main>

<div class="container-canvas">
  <canvas id="myChart" height="100" width="200"></canvas>
</div>







</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<script src="assets/js/admin_dashboard.js"></script>

</html>