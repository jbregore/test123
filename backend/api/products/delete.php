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

// instantiate database
$database = new Database();
$db = $database->getConnection();

//instantiate product
$product = new Product($db);

$data = json_decode(file_get_contents("php://input"));

// set id to delete
$product->prod_id = $data->prod_id;

// delete product
if($product->delete()) {
	echo json_encode(
		array('message' => 'Product Deleted')
	);
} else {
	echo json_encode(
		array('message' => 'Product Not Deleted')
	);
}