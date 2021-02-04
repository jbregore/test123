<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if($_SERVER["REQUEST_METHOD"] !== "DELETE"){
	http_response_code(404);
	echo "Not Found";
	return;
}

include "../../config/Database.php";
include "../../models/Feedback.php";

// instantiate database
$database = new Database();
$db = $database->getConnection();

//instantiate product
$feedback = new Feedback($db);

$data = json_decode(file_get_contents("php://input"));

// set id to delete
$feedback->feedback_id = $data->feedback_id;

// delete product
if($feedback->delete()) {
	echo json_encode(
		array('message' => 'Product Deleted')
	);
} else {
	echo json_encode(
		array('message' => 'Product Not Deleted')
	);
}