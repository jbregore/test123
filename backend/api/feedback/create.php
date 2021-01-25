<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if($_SERVER["REQUEST_METHOD"] !== "POST"){
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

$feedback->user_username = $data->user_username;
$feedback->star = $data->star;
$feedback->message = $data->message;


//create product
$isCreated = $feedback->create();

if($isCreated){
	//201 - created
	http_response_code(201);
	echo json_encode(array("message" => "One record added"));
}
else{
	//500 - internal server error/ may problema sa db connection
	http_response_code(500);
}