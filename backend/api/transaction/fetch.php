<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if($_SERVER["REQUEST_METHOD"] !== "GET"){
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

//fetch product form db
$result = $trans->fetchAll();

$trans_arr = array();

while($row = $result->fetch_assoc()){
	array_push($trans_arr, $row);
}

// set http status code to - 200 ok
http_response_code(200);
echo json_encode($trans_arr);

