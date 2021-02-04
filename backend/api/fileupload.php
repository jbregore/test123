<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if($_SERVER["REQUEST_METHOD"] !== "POST"){
	http_response_code(404);
	echo "Not Found";
	return;
}


$response = array();

//directory
$upload_dir = '../uploads/';

//url				//projectname/ tas yung target directory yung target folder na pagsesavan
$upload_url = 'http://localhost/test_hghmnds/backend/uploads/';


if(isset($_FILES['prod-img'])){
	//yung prod-img sya yung name ng input type file ko
	// input type="file" name="prod-img" yan ganyan
	$file = $_FILES['prod-img'];
	$filename = $_FILES['prod-img']['name'];
	$fileTmpName = $_FILES['prod-img']['tmp_name'];
	$fileSize = $_FILES['prod-img']['size'];
	$fileError = $_FILES['prod-img']['error'];
	$fileType = $_FILES['prod-img']['type'];

	$fileExt = explode('.', $filename);
	$fileActualExt = strtolower(end($fileExt));
	$allowed = array('jpg', 'jpeg', 'png');

	if(in_array($fileActualExt, $allowed)){//image extension allowed
		if($fileError === 0){//file error of image
			if($fileSize < 10000000){//file size of image
				//giving uniqid to file name
				$fileNameNew = uniqid('', true).".".$fileActualExt;
				$fileDest = $upload_dir.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDest);

				//200 ok
				http_response_code(200);
				$response = array("url" => $upload_url .  $fileNameNew, "message" => "Successfully uploaded");
				echo json_encode($response);
			}//end file size
			else{
				//bad request
				http_response_code(400);
				$response = array("url" => $upload_url .  $fileNameNew, "message" => "Image size must be less than 10mb");
				echo json_encode($response);
				return;
			}
		}//end file error
		else{
			//bad request
			http_response_code(400);
			$response = array("url" => $upload_url .  $fileNameNew, "message" => "There was an error in your image file");
				echo json_encode($response);
			return;
			//echo "gago";
		}
	}//end image extension
	else{
		//bad request
		http_response_code(400);
		$response = array("url" => $upload_url .  $fileNameNew, "message" => "Please upload a valid image");
		echo json_encode($response);
		return;
	}


}//end prod-img isset

