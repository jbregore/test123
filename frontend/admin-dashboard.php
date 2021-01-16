<?php
include 'admin-header.php';
?>



<main>
    <h2>Dashboard</h2>
    <div class="row"> <!--start row-->
      <div class="col-3">
        <div class="card-total">
        <i class="fa fa-product-hunt"></i>
        </div>
        <div class="card-body">
          <h1 id="total-products"></h1>
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
          <h1 id="total-users"></h1>
          <span>Users</span>
        </div>
        <div class="card-footer">
          <a href="">View</a>
        </div>
      </div>

      <div class="col-3">
        <div class="card-total">
        <i class="fa fa-credit-card" ></i>
        </div>
        <div class="card-body">
          <h1>200,000</h1>
          <span>Month Sales</span>
        </div>
        <div class="card-footer">
          <a href="">View</a>
        </div>
      </div>

    </div><!--end row-->
  </main>
  


</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){

    //change class
    $('#ap').removeClass('active');
    $('#ad').addClass('active');

    load_data();

    function load_data(){
      $.ajax({
        type: 'GET',
        url: '../backend/api/admin_dashboard/fetch.php',
        success: function(data){
          //no need to loop pag isa lang ang kukunin na data mula sa json array
         document.getElementById('total-products').innerHTML = data.totalp.totalp;
         document.getElementById('total-users').innerHTML = data.totalu.totalu;
        }
      });
    }


    $("#admin-toggle").click(function(){
      $(".admin-nav").toggle(1000);
    });

  });
</script>

</html>
