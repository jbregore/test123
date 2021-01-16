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

// instantiate database
$database = new Database();
$db = $database->getConnection();

//instantiate product
$product = new Product($db);

$data = json_decode(file_get_contents("php://input"));

if(
	empty($data->prod_brand) ||
	empty($data->prod_name) ||
	empty($data->prod_category) ||
	empty($data->prod_price) ||
	empty($data->prod_qty) ||
	empty($data->prod_status) ||
	empty($data->prod_photo) 
){
	//bad request
	http_response_code(400);
	echo json_encode(array("message" => "Please fill all the fields"));
	return;
}

$product->prod_brand = $data->prod_brand;
$product->prod_name = $data->prod_name;
$product->prod_category = $data->prod_category;
$product->prod_price = $data->prod_price;
$product->prod_qty = $data->prod_qty;
$product->prod_status = $data->prod_status;
$product->prod_photo = $data->prod_photo;


//create product
$isCreated = $product->create();

if($isCreated){
	//201 - created
	http_response_code(201);
	echo json_encode(array("message" => "One record added"));
}
else{
	//500 - internal server error/ may problema sa db connection
	http_response_code(500);
}