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

// instantiate database
$database = new Database();
$db = $database->getConnection();

//instantiate product
$product = new Product($db);

// get raw posted data
$data = json_decode(file_get_contents("php://input"));

// set id to update
$product->prod_id = $data->prod_id;
$product->prod_qty = $data->prod_qty;

// update product
if($product->update_qty()) {
	echo json_encode(
		array("message" => "Product Updated")
	);
} else {
	echo json_encode(
		array("message" => "Product Not Updated")
	);
}

// $product->update_qty();

// // create array
// $product_arr = array(
// 	'prod_qty' => $product->current_qty
// );

// // make json
// echo json_encode($product_arr);