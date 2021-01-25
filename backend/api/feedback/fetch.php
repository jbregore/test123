<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if($_SERVER["REQUEST_METHOD"] !== "GET"){
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

//fetch product form db
$result = $feedback->fetchAll();

$feedback_arr = array();

while($row = $result->fetch_assoc()){
	array_push($feedback_arr, $row);
}

// set http status code to - 200 ok
http_response_code(200);
echo json_encode($feedback_arr);

