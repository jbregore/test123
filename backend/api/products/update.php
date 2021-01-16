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

$product->prod_brand = $data->prod_brand;
$product->prod_name = $data->prod_name;
$product->prod_category = $data->prod_category;
$product->prod_price = $data->prod_price;
$product->prod_qty = $data->prod_qty;
$product->prod_status = $data->prod_status;
$product->prod_photo = $data->prod_photo;

// update product
if($product->update()) {
	echo json_encode(
		array("message" => "Product Updated")
	);
} else {
	echo json_encode(
		array("message" => "Product Not Updated")
	);
}