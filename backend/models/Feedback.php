<?php

class Feedback{
	private $conn;
	private $table_name = "tbl_feedback";

	public $user_username;
	public $star;
	public $message;
	

	public function __construct($db){
		$this->conn = $db;
	}

	
	//fetch to table
	public function fetchAll(){
		// Create query
		$query = "SELECT * FROM $this->table_name";

		//execute query
		$stmt = $this->conn->query($query);

		return $stmt;
	}


	public function create(){
		
		$query = "INSERT INTO $this->table_name (user_username, star, message)	VALUES (?, ?, ?)";

					// prepare and bind
		$stmt = mysqli_stmt_init($this->conn);

		if(!mysqli_stmt_prepare($stmt, $query)){
			echo "SQL statement failed";
		}
		else{
			mysqli_stmt_bind_param($stmt, "sss", $this->user_username, $this->star, $this->message);

			if(mysqli_stmt_execute($stmt)){
				return true;
			}
			return false;
		}
	}

	
	
}//end feedback

