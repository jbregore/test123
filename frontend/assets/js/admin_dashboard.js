
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

  let myChart = document.getElementById('myChart').getContext('2d');

  let massPopChart = new Chart(myChart, {
    type: 'bar',
    data: {
      labels: ['January', 'February', 'March', 'April', 'May', 'June'],
      datasets: [{
        label: 'This is just a static graph',
        data: [
          617594,
          481645,
          153060,
          106519,
          105562,
          95072
        ],
        backgroundColor: [
          '#fcebcf',
          '#fcebcf',
          '#fcebcf',
          '#fcebcf',
          '#fcebcf',
          '#fcebcf'
        ],
        borderColor: [
          '#f39c12',
          '#f39c12',
          '#f39c12',
          '#f39c12',
          '#f39c12',
          '#f39c12'
        ],
        borderWidth: 1
      }]
    },
    options: {}

  });

});