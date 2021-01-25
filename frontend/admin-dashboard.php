<?php
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
          <h1 id="total-products"></h1>
          <span>Products</span>
        </div>
        <div class="card-footer">
          <a href="admin-product.php">View</a>
        </div>
      </div>

      <div class="col-3">
        <div class="card-total">
        <i class="fa fa-users"></i>
        </div>
        <div class="card-body">
          <h1 id="total-users"></h1>
          <span>Users</span>
        </div>
        <div class="card-footer">
          <a href="admin-user.php">View</a>
        </div>
      </div>

      <div class="col-3">
        <div class="card-total">
        <i class="fa fa-credit-card" ></i>
        </div>
        <div class="card-body">
          <h1 id="total-sales"></h1>
          <span>Month Sales</span>
        </div>
        <div class="card-footer">
          <a href="admin-transaction.php">View</a>
        </div>
      </div>

    </div>
  </main>
  


</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="assets/js/admin_dashboard.js"></script>

</html>
