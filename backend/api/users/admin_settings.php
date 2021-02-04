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

$user->admin_old_password = $data->old_password;
$user->admin_new_password = $data->new_password;


//create user
$isChange = $user->admin_change();

if($isChange){
	//201 - created
	http_response_code(200);
	echo json_encode(array("message" => "Password has been changed"));
}
else{
	//500 - internal server error/ may problema sa db connection
	http_response_code(500);
	echo json_encode(array("message" => "Wrong password"));
}

