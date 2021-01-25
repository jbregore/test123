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

//fetch product form db
$result = $product->fetch_other();

$product_arr = array();

while($row = $result->fetch_assoc()){
	array_push($product_arr, $row);
}

// set http status code to - 200 ok
http_response_code(200);
echo json_encode($product_arr);

