<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if($_SERVER["REQUEST_METHOD"] !== "PUT"){
	http_response_code(404);
	echo "Not Found";
	return;
}

include "../../config/Database.php";
include "../../models/Users.php";

// instantiate database
$database = new Database();
$db = $database->getConnection();

//instantiate user
$user = new User($db);

$data = json_decode(file_get_contents("php://input"));

// set id to block
$user->user_id = $data->user_id;


// update product
if($user->unblock()) {
	echo json_encode(
		array("message" => "User Unblocked")
	);
} else {
	echo json_encode(
		array("message" => "User Not Unblocked")
	);
}

