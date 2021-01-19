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

$user->user_username = $data->login_username;
$user->user_password = $data->login_password;

//call login
$isLog = $user->login();

if($isLog){
	//201 - created
	http_response_code(201);

	// user array
	$user_arr = array(
		'user_id' => $user->user_id,
		'user_username' => $user->user_username,
		'user_password' => $user->user_password,
		'user_status' => $user->user_status
	);

	// make json
	echo json_encode($user_arr);
}
else{
	//500 - internal server error/ may problema sa db connection
	http_response_code(500);
}

