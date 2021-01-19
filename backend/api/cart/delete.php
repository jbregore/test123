<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if($_SERVER["REQUEST_METHOD"] !== "DELETE"){
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

$data = json_decode(file_get_contents("php://input"));

// set id to delete
$cart->user_id = $data->user_id;
$cart->prod_id = $data->prod_id;

// delete product
if($cart->delete()) {
	echo json_encode(
		array('message' => 'Product Deleted')
	);
} else {
	echo json_encode(
		array('message' => 'Product Not Deleted')
	);
}