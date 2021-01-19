<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if($_SERVER["REQUEST_METHOD"] !== "POST"){
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

// get raw posted data
$data = json_decode(file_get_contents("php://input"));

// set id 
$cart->user_id = $data->user_id;

//fetch cart form db
$result_cart = $cart->cart_count();

//total array
$cart_arr = array();

// cart
while($row = $result_cart->fetch_assoc()){
	$cart_arr['totalc'] = $row;
}


// set http status code to - 200 ok
http_response_code(200);
echo json_encode($cart_arr);

