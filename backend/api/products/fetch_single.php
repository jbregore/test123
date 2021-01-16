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

// instantiate database
$database = new Database();
$db = $database->getConnection();

//instantiate product
$product = new Product($db);

// get prod_id
$product->prod_id = $_GET['prod_id'] ? $_GET['prod_id'] : die();

// get product
$product->fetch_single();

// create array
$product_arr = array(
	'prod_id' => $product->prod_id,
	'prod_brand' => $product->prod_brand,
	'prod_name' => $product->prod_name,
	'prod_category' => $product->prod_category,
	'prod_price' => $product->prod_price,
	'prod_qty' => $product->prod_qty,
	'prod_status' => $product->prod_status,
	'prod_photo' => $product->prod_photo
);

// make json
echo json_encode($product_arr);