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
include "../../models/Users.php";

// instantiate database
$database = new Database();
$db = $database->getConnection();

//instantiate product
$product = new Product($db);

//instantiate users
$user = new User($db);

//fetch product form db
$result_prod = $product->total_products();

//fetch users form db
$result_users = $user->total_users();

//total array
$dash_arr = array();

//products
while($row = $result_prod->fetch_assoc()){
	$dash_arr['totalp'] = $row;
}

// users
while($row = $result_users->fetch_assoc()){
	$dash_arr['totalu'] = $row;
}


// set http status code to - 200 ok
http_response_code(200);
echo json_encode($dash_arr);
