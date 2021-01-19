<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if($_SERVER["REQUEST_METHOD"] !== "GET"){
	http_response_code(404);
	echo "Not Found";
	return;
}

include "../../config/Database.php";
include "../../models/Products.php";
include "../../models/Cart.php";

// instantiate database
$database = new Database();
$db = $database->getConnection();

//instantiate cart
$cart = new Cart($db);

// get prod_id
$cart->user_id = $_GET['user_id'] ? $_GET['user_id'] : die();

// get product
$result = $cart->fetch_cart();

// create array
$cart_arr = array();

while($row = $result->fetch_assoc()){
	array_push($cart_arr, $row);
}

// make json
// set http status code to - 200 ok
http_response_code(200);
echo json_encode($cart_arr);


