<?php

class User{
	private $conn;
	private $table_name = "tbl_user";

	//object properties
	public $user_id;
	public $user_username;
	public $user_password;
	public $user_status;

	public function __construct($db){
		$this->conn = $db;
	}

	// fetch all product
	public function fetchAll(){
		// Create query
		$query = "SELECT * FROM $this->table_name";

		//execute query
		$stmt = $this->conn->query($query);

		return $stmt;
	}

	// // get single product
	// public function fetch_single() {
 //        // Create query
	// 	$query = "SELECT * FROM $this->table_name WHERE prod_id = ?";

 //        //prepare and bind
	// 	$stmt = mysqli_stmt_init($this->conn);

	// 	if(!mysqli_stmt_prepare($stmt, $query)){
	// 		echo "SQL statement failed";
	// 	}
	// 	else{
	// 		mysqli_stmt_bind_param($stmt, "s", $this->prod_id);
	// 		mysqli_stmt_execute($stmt);
	// 		$result = mysqli_stmt_get_result($stmt);

	// 		while($row = mysqli_fetch_assoc($result)){

	// 			$this->prod_brand = $row['prod_brand'];
	// 			$this->prod_name = $row['prod_name'];
	// 			$this->prod_category = $row['prod_category'];
	// 			$this->prod_price = $row['prod_price'];
	// 			$this->prod_qty = $row['prod_qty'];
	// 			$this->prod_status = $row['prod_status'];
	// 			$this->prod_photo = $row['prod_photo'];
	// 		}
	// 	}
	// }

	// // create product
	public function create(){

		//duplicate
		$duplicate = "SELECT * FROM $this->table_name WHERE user_username = ?";

		//prepare and bind
		$stmt = mysqli_stmt_init($this->conn);

		
		if(!mysqli_stmt_prepare($stmt, $duplicate)){
			echo "SQL statement failed";
		}
		else{
			mysqli_stmt_bind_param($stmt, "s", $this->user_username);

			//execute query
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);

			if(mysqli_stmt_execute($stmt)){
				
				if (mysqli_num_rows($result)>0){
					return false;
				}
				else{
					//user id
					$this->user_id = uniqid('', true);

					// Create query
					$query = "INSERT INTO $this->table_name (user_id, user_username, user_password, user_status) VALUES (?, ?, ?, ?)";

					// prepare and bind
					$stmt = mysqli_stmt_init($this->conn);

					if(!mysqli_stmt_prepare($stmt, $query)){
						echo "SQL statement failed";
					}
					else{
						mysqli_stmt_bind_param($stmt, "ssss", $this->user_id, $this->user_username, $this->user_password, $this->user_status);

						if(mysqli_stmt_execute($stmt)){
							return true;
						}
						return false;
					} //end else second stmt
				}

				
			}//end first stmt
			return false;
		} 

	}

	// // // update product
	// public function update() {
 //          // Create query
	// 	$query = "UPDATE $this->table_name
	// 		SET prod_brand = ?, prod_name = ?, prod_category = ?, prod_price = ?, prod_qty = ?, prod_status = ? , prod_photo = ?
	// 		WHERE prod_id = ?";

	//           // prepare and bind
	// 		$stmt = mysqli_stmt_init($this->conn);

	// 	if(!mysqli_stmt_prepare($stmt, $query)){
	// 		echo "SQL statement failed";
	// 	}
	// 	else{
	// 		mysqli_stmt_bind_param($stmt, "sssiisss", $this->prod_brand, $this->prod_name, $this->prod_category, $this->prod_price, $this->prod_qty, $this->prod_status, $this->prod_photo, $this->prod_id);

	// 		if(mysqli_stmt_execute($stmt)){
	// 			return true;
	// 		}
	// 		return false;
	// 	}      
	// }

 //    // delete product
 //    public function delete() {
 //          // Create query
 //          $query = "DELETE FROM $this->table_name WHERE prod_id = ?";

 //          // prepare and bind
 //          $stmt = mysqli_stmt_init($this->conn);

 //          if(!mysqli_stmt_prepare($stmt, $query)){
 //          	echo "SQL statement failed";
 //          }
 //          else{
 //          	mysqli_stmt_bind_param($stmt, "s", $this->prod_id);

 //          	if(mysqli_stmt_execute($stmt)){
 //          		return true;
 //          	}
 //          	return false;
 //          }      
	// }


	// //admin dashboard total products
	public function total_users(){
		// Create query
		$query = "SELECT COUNT(*) as totalu FROM $this->table_name";

		//execute query
		$stmt = $this->conn->query($query);

		return $stmt;

	}

}//end product

