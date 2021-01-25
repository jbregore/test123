$(document).ready(function () {
  //change class
  $('#ap').addClass('active');
  $('#ad').removeClass('active');
  $('#au').removeClass('active');
  $('#at').removeClass('active');
  $('#af').removeClass('active');

  // **************** nav **************** //
  $("#admin-toggle").click(function () {
    $(".admin-nav").toggle(1000);
  });



  // **************** fetch data **************** //
  load_data();



  // ********** product-form submit ********** //
  $('#product-form').on('submit', function (event) {
    event.preventDefault();
    var valid = 0;

    //product name    
    if ($('#txt-prod-name').val() == '' ||
      $('#txt-prod-price').val() == '' || $('#txt-prod-price').val().charAt(0) == 0 ||
      $('#txt-prod-qty').val() == '' || $('#txt-prod-qty').val().charAt(0) == 0 ||
      $('#upload').val().length == 0) {
      valid = 0;
    }
    else {
      valid = 1;
    }


    if (valid == 1) {
      if ($("#action").val() === "add_product") {
        add_product();
      }
      else if ($("#action").val() === "edit_product") {
        edit_product();
      }
    } else {
      window.alert("Please fill all the fields.")
    }

  });//product-form submit



  // **************** adding **************** //
  //trigger add modal
  $(document).on('click', '#add-btn', function () {
    $("#action").val('add_product');
    document.getElementById('title-ope').innerHTML = "Add Product";
    document.getElementById('form-action').innerHTML = "Add Product";
    $("#modal-container").fadeIn();
  });//trigger add modal



  // **************** editing **************** //
  var preview_img_edit, prodid_edit;

  //trigger edit modal
  $(document).on('click', '.edit-btn', function () {

    var prod_id = $(this).attr("id");
    // console.log(prod_id);
    $.ajax({
      type: 'GET',
      url: '../backend/api/products/fetch_single.php',
      data: { prod_id: prod_id },
      success: function (data) {
        $("#sel-prod-category").val(data.prod_category);
        $("#sel-prod-brand").val(data.prod_brand);
        $("#txt-prod-name").val(data.prod_name);
        $("#txt-prod-price").val(data.prod_price);
        $("#txt-prod-qty").val(data.prod_qty);
        $("#sel-prod-status").val(data.prod_status);

        var preview = document.getElementById('img-prod');
        preview.src = data.prod_photo;
        preview_img_edit = data.prod_photo;
        prodid_edit = data.prod_id;

        $("#action").val('edit_product');
        document.getElementById('title-ope').innerHTML = "Edit Product";
        document.getElementById('form-action').innerHTML = "Save Product";


        $("#modal-container").fadeIn();

      }
    });
  });//end trigger edit modal



  // **************** delete **************** //
  $(document).on('click', '.del-btn', function () {

    if (confirm('Are you sure you want to delete?')) {
      var prod_id_this = $(this).attr("id");
      var product = { prod_id: prod_id_this };
      $.ajax({
        type: 'DELETE',
        url: '../backend/api/products/delete.php',
        data: JSON.stringify(product),
        success: function (data) {
          $('#prod-table').html('');
          load_data();
          window.alert(data.message);
        },
        error: function (jqXHR, exception) {
          error_function(jqXHR, exception);
        }
      });
    } else {

    }
  });


  
  // **************** close modal **************** //
  //close modal
  $("#close").click(function () {
    clear_modal();
  });


});

//load data
function load_data() {
  $.ajax({
    type: 'GET',
    url: '../backend/api/products/fetch.php',
    success: function (data) {
      var $books = $('#prod-table');
      var book_data = '<table class="content-table">';
      book_data += '<thead>';
      book_data += '<tr>';
      book_data += '<th>Brand</th>';
      book_data += '<th>Name</th>';
      book_data += '<th>Category</th>';
      book_data += '<th>Price</th>';
      book_data += '<th>Quantity</th>';
      book_data += '<th>Date Added</th>';
      book_data += '<th>Status</th>';
      book_data += '<th>Action</th>';
      book_data += '</tr>';
      book_data += '</thead>';
      book_data += '<tbody>';

      $.each(data, function (key, value) {
        book_data += '<tr>';
        book_data += '<td>' + value.prod_brand + '</td>';
        book_data += '<td>' + value.prod_name + '</td>';
        book_data += '<td>' + value.prod_category + '</td>';
        book_data += '<td>' + value.prod_price + '</td>';
        book_data += '<td>' + value.prod_qty + '</td>';
        book_data += '<td>' + value.prod_datein + '</td>';
        book_data += '<td>' + value.prod_status + '</td>';
        book_data += '<td><button class="edit-btn" id="' + value.prod_id + '" >Edit</button>';
        book_data += '<button class="del-btn" id="' + value.prod_id + '" >Delete</button></td>';
        book_data += '</tr>';

      });
      book_data += '</tbody>';
      book_data += '</table>';
      $books.append(book_data);
    }
  });
}



//add product
function add_product() {
  var productImg = $('input[name="prod-img"]').get(0).files[0];
  var formData = new FormData();
  formData.append('prod-img', productImg);
  var product;

  // upload file
  $.ajax({
    type: 'POST',
    url: '../backend/api/fileupload.php',
    data: formData,
    contentType: false,
    // cache: false,
    processData: false,
    success: function (data) {
      product = {
        prod_brand: $("#sel-prod-brand").val(),
        prod_name: $('#txt-prod-name').val(),
        prod_category: $('#sel-prod-category').val(),
        prod_price: $('#txt-prod-price').val(),
        prod_qty: $('#txt-prod-qty').val(),
        prod_status: $('#sel-prod-status').val(),
        prod_photo: data.url
      };
      ajax_create();
    },
    error: function (jqXHR, exception) {
      window.alert("Please fill all the fields");
    }
  });//

  //upload json
  function ajax_create() {
    $.ajax({
      type: 'POST',
      url: '../backend/api/products/create.php',
      data: JSON.stringify(product),
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {
        $('#prod-table').html('');
        load_data();
        window.alert(data.message);
        clear_modal();
      },
      error: function (jqXHR, exception) {
        error_function(jqXHR, exception);
      }
    });
  }
}//end add product



//edit product
function edit_product() {
  var product;
  var preview = document.getElementById('img-prod');

  if (preview_img_edit !== preview.src) {

    var productImg = $('input[name="prod-img"]').get(0).files[0];
    var formData = new FormData();
    formData.append('prod-img', productImg);

    // upload file
    $.ajax({
      type: 'POST',
      url: '../backend/api/fileupload.php',
      data: formData,
      contentType: false,
      // cache: false,
      processData: false,
      success: function (data) {
        product = {
          prod_id: prodid_edit,
          prod_brand: $("#sel-prod-brand").val(),
          prod_name: $('#txt-prod-name').val(),
          prod_category: $('#sel-prod-category').val(),
          prod_price: $('#txt-prod-price').val(),
          prod_qty: $('#txt-prod-qty').val(),
          prod_status: $('#sel-prod-status').val(),
          prod_photo: data.url
        };
        ajax_update();
      },
      error: function (jqXHR, exception) {
        window.alert("Please fill all the fields");
      }
    });//
  }//end if
  else {
    product = {
      prod_id: prodid_edit,
      prod_brand: $("#sel-prod-brand").val(),
      prod_name: $('#txt-prod-name').val(),
      prod_category: $('#sel-prod-category').val(),
      prod_price: $('#txt-prod-price').val(),
      prod_qty: $('#txt-prod-qty').val(),
      prod_status: $('#sel-prod-status').val(),
      prod_photo: preview_img_edit
    };
    ajax_update();
  }

  // upload json
  function ajax_update() {
    console.log(product);
    $.ajax({
      type: 'PUT',
      url: '../backend/api/products/update.php',
      data: JSON.stringify(product),
      contentType: false,
      // cache: false,
      processData: false,
      success: function (data) {
        $('#prod-table').html('');
        load_data();
        window.alert(data.message);
        clear_modal();
      },
      error: function (jqXHR, exception) {
        error_function(jqXHR, exception);
      }
    });
  }
}//end edit product



//clear modal (exit modal)
function clear_modal() {
  $("#modal-container").fadeOut();

  $("#sel-prod-category").val('t-shirt');
  $("#sel-prod-brand").val('hghmnds');
  $("#txt-prod-name").val('');
  $("#txt-prod-price").val('');
  $("#txt-prod-qty").val('');
  $("#sel-prod-status").val('available');

  var preview = document.getElementById('img-prod');
  preview.src = "";
  document.getElementById('upload').value = null;
}



//error message
function error_function(jqXHR, exception) {
  var msg = '';
  if (jqXHR.status === 0) {
    msg = 'Not connect.\n Verify Network.';
  } else if (jqXHR.status == 400) {
    msg = 'Bad Request. [400]';
    window.alert("Please fill all the fields.");
  } else if (jqXHR.status == 404) {
    msg = 'Requested page not found. [404]';
  } else if (jqXHR.status == 500) {
    msg = 'Internal Server Error [500].';
  } else if (exception === 'parsererror') {
    msg = 'Requested JSON parse failed.';
  } else if (exception === 'timeout') {
    msg = 'Time out error.';
  } else if (exception === 'abort') {
    msg = 'Ajax request aborted.';
  } else {
    msg = 'Uncaught Error.\n' + jqXHR.responseText;
  }
}



//file preview
function previewFile() {
  var preview = document.getElementById('img-prod');
  var file = document.querySelector('input[type=file]').files[0];
  var reader = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  }

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "";
  }
}


