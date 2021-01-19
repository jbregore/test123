<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if($_SERVER["REQUEST_METHOD"] !== "GET"){
	http_response_code(404);
	echo "Not Found";
	return;
}

session_start();

$response = array(
		"user_id" => $_SESSION['user_id'],
		"user_username" => $_SESSION['user_username']
	);

echo json_encode($response);