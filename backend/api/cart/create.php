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

//instantiate product
$product = new Product($db);

// get raw posted data
$data = json_decode(file_get_contents("php://input"));

// get prod_id
$product->prod_id = $data->prod_id;

// get product
$product->fetch_single();

//instantiate cart
$cart = new Cart($db);

//for user
$cart->user_id = $data->user_id;
$cart->user_username = $data->user_username;

//for product
$cart->prod_id = $product->prod_id;
$cart->prod_brand = $product->prod_brand;
$cart->prod_name = $product->prod_name;
$cart->prod_category = $product->prod_category;
$cart->prod_price = $product->prod_price;
$cart->prod_qty = 1;
$cart->prod_photo = $product->prod_photo;

//create product
$isCreated = $cart->create();

if($isCreated){
	//201 - created
	http_response_code(201);
	echo json_encode(array("message" => "success"));
}
else{
	//500 - internal server error/ may problema sa db connection
	http_response_code(500);
}



// make json
// echo json_encode($product_arr);