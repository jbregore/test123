<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if($_SERVER["REQUEST_METHOD"] !== "POST"){
	http_response_code(404);
	echo "Not Found";
	return;
}

include "../../config/Database.php";
include "../../models/Transaction.php";

// instantiate database
$database = new Database();
$db = $database->getConnection();

//instantiate product
$trans = new Transaction($db);

$data = json_decode(file_get_contents("php://input"));

$trans->user_id = $data->user_id;
$trans->paypal_name = $data->paypal_name;
$trans->paypal_address = $data->paypal_address;
$trans->total_prod = $data->total_prod;
$trans->total_item = $data->total_item;
$trans->trans_date = $data->trans_date;
$trans->trans_total = $data->trans_total;


//create product
$isCreated = $trans->create();

if($isCreated){
	//201 - created
	http_response_code(201);
	echo json_encode(array("message" => "One record added"));
}
else{
	//500 - internal server error/ may problema sa db connection
	http_response_code(500);
}