<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if($_SERVER["REQUEST_METHOD"] !== "PUT"){
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

//instantiate product
$cart = new Cart($db);

// get raw posted data
$data = json_decode(file_get_contents("php://input"));

// get prod_id
$cart->user_id = $data->user_id;
$cart->prod_id = $data->prod_id;

// $cart->update();

// update product
if($cart->update_minus()) {
	echo json_encode(
		array("message" => "Cart Updated")
	);
} else {
	echo json_encode(
		array("message" => "Cart Not Updated")
	);
}