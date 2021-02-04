<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if($_SERVER["REQUEST_METHOD"] !== "DELETE"){
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
$transaction = new Transaction($db);

$data = json_decode(file_get_contents("php://input"));

// set id to delete
$transaction->trans_id = $data->trans_id;

// delete product
if($transaction->delete()) {
	echo json_encode(
		array('message' => 'Product Deleted')
	);
} else {
	echo json_encode(
		array('message' => 'Product Not Deleted')
	);
}