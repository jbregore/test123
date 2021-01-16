<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if($_SERVER["REQUEST_METHOD"] !== "POST"){
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

$user->user_username = $data->user_username;
$user->user_password = $data->user_password;
$user->user_status = $data->user_status;


//create user
$isCreated = $user->create();

if($isCreated){
	//201 - created
	http_response_code(201);
	echo json_encode(array("message" => "Registered Successfully"));
}
else{
	//500 - internal server error/ may problema sa db connection
	http_response_code(500);
}

