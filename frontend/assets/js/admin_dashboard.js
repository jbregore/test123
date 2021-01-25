
$(document).ready(function () {

  //change class
  $('#ad').addClass('active');
  $('#ap').removeClass('active');
  $('#au').removeClass('active');
  $('#at').removeClass('active');
  $('#af').removeClass('active');

  load_data();

  function load_data() {
    $.ajax({
      type: 'GET',
      url: '../backend/api/admin_dashboard/fetch.php',
      success: function (data) {
        //no need to loop pag isa lang ang kukunin na data mula sa json array
        document.getElementById('total-products').innerHTML = data.totalp.totalp;
        document.getElementById('total-users').innerHTML = data.totalu.totalu;
        document.getElementById('total-sales').innerHTML = data.totals.totals;
      }
    });
  }


  $("#admin-toggle").click(function () {
    $(".admin-nav").toggle(1000);
  });

});