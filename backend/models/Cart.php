<?php

class Cart{
	private $conn;
	private $table_name = "tbl_cart";

	//object properties
	//user
	public $user_id;
	public $user_username;

	//product
	public $prod_id;
	public $prod_brand;
	public $prod_name;
	public $prod_category;
	public $prod_price;
	public $prod_qty;
	public $prod_photo;

	public function __construct($db){
		$this->conn = $db;
	}

	

	// create cart
	public function create(){

		//duplicate
		$duplicate = "SELECT * FROM $this->table_name WHERE user_id = ? AND prod_id = ?";

		//prepare and bind
		$stmt = mysqli_stmt_init($this->conn);

		if(!mysqli_stmt_prepare($stmt, $duplicate)){
			echo "SQL statement failed";
		}
		else{
			mysqli_stmt_bind_param($stmt, "ss", $this->user_id, $this->prod_id);

			//execute query
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);

			if(mysqli_stmt_execute($stmt)){
				
				if (mysqli_num_rows($result)>0){
					return false;
				}
				else{
					//insert na sa table cart
					// Create query
					$query = "INSERT INTO $this->table_name (user_id, user_username, prod_id, prod_brand, prod_name, prod_category, prod_price, prod_qty, prod_photo)	VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

					// prepare and bind
					$stmt = mysqli_stmt_init($this->conn);

					if(!mysqli_stmt_prepare($stmt, $query)){
						echo "SQL statement failed";
					}
					else{
						mysqli_stmt_bind_param($stmt, "ssssssiis", $this->user_id, $this->user_username, $this->prod_id, $this->prod_brand, $this->prod_name, $this->prod_category, $this->prod_price, $this->prod_qty, $this->prod_photo);

						if(mysqli_stmt_execute($stmt)){
							return true;
						}
						return false;
					} 
				}//

				
			}//end first stmt
			return false;
		} 


	}

	//cart count yung number sa taas ng cart
	public function cart_count(){
		// Create query
		$query = "SELECT COUNT(*) as cart_num FROM $this->table_name WHERE user_id = ?";

		$stmt = mysqli_stmt_init($this->conn);

		if(!mysqli_stmt_prepare($stmt, $query)){
			echo "SQL statement failed";
		}
		else{
			mysqli_stmt_bind_param($stmt, "s", $this->user_id);

			//execute query
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			return $result;
			
		} 

		// //execute query
		// $stmt = $this->conn->query($query);

		// return $stmt;

	}

	// get single product
	public function fetch_cart() {
        // Create query
		$query = "SELECT * FROM $this->table_name WHERE user_id = ?";

        //prepare and bind
		$stmt = mysqli_stmt_init($this->conn);

		if(!mysqli_stmt_prepare($stmt, $query)){
			echo "SQL statement failed";
		}
		else{
			mysqli_stmt_bind_param($stmt, "s", $this->user_id);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);

			return $result;
		}
	}


	// update qty to cart // add //
	public function update() {
        // Create query
		$get_qty = "SELECT prod_qty FROM $this->table_name WHERE prod_id = ? AND user_id = ?";

	    // prepare and bind
		$stmt = mysqli_stmt_init($this->conn);

		if(!mysqli_stmt_prepare($stmt, $get_qty)){
			echo "SQL statement failed";
		}
		else{
			mysqli_stmt_bind_param($stmt, "ss", $this->prod_id, $this->user_id);

			if(mysqli_stmt_execute($stmt)){
				// // return true;
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);

				while($row = mysqli_fetch_assoc($result)){
					$current_qty = $row['prod_qty'];
				}

				// //add btn
				$add_qty = "UPDATE $this->table_name SET prod_qty = ? WHERE prod_id = ? AND user_id = ?";
				$stmt = mysqli_stmt_init($this->conn);

				if(!mysqli_stmt_prepare($stmt, $add_qty)){
					echo "SQL statement failed";
				}
				else{
					$new_qty = $current_qty+1;
					mysqli_stmt_bind_param($stmt, "iss", $new_qty, $this->prod_id, $this->user_id);

					if(mysqli_stmt_execute($stmt)){
						return true;
					}
					return false;
				}
			}
			return false;
		} 
	}


	// update qty to cart // minus //
	public function update_minus() {
        // Create query
		$get_qty = "SELECT prod_qty FROM $this->table_name WHERE prod_id = ? AND user_id = ?";

	    // prepare and bind
		$stmt = mysqli_stmt_init($this->conn);

		if(!mysqli_stmt_prepare($stmt, $get_qty)){
			echo "SQL statement failed";
		}
		else{
			mysqli_stmt_bind_param($stmt, "ss", $this->prod_id, $this->user_id);

			if(mysqli_stmt_execute($stmt)){
				// // return true;
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);

				while($row = mysqli_fetch_assoc($result)){
					$current_qty = $row['prod_qty'];
				}

				if($current_qty == 1){
					//delete
					$delete = "DELETE FROM $this->table_name WHERE prod_id = ? AND user_id = ?";
					$stmt = mysqli_stmt_init($this->conn);

					if(!mysqli_stmt_prepare($stmt, $delete)){
						echo "SQL statement failed";
					}
					else{
						mysqli_stmt_bind_param($stmt, "ss", $this->prod_id, $this->user_id);

						if(mysqli_stmt_execute($stmt)){
							return true;
						}
						return false;
					}
				}//delete else minus 1 lang

				$minus_qty = "UPDATE $this->table_name SET prod_qty = ? WHERE prod_id = ? AND user_id = ?";
				$stmt = mysqli_stmt_init($this->conn);

				if(!mysqli_stmt_prepare($stmt, $minus_qty)){
					echo "SQL statement failed";
				}
				else{
					$new_qty = $current_qty-1;
					mysqli_stmt_bind_param($stmt, "iss", $new_qty, $this->prod_id, $this->user_id);

					if(mysqli_stmt_execute($stmt)){
						return true;
					}
					return false;
				}
			}
			return false;
		} 
	}


	// delete product
    public function delete() {
        // Create query
    	$query = "DELETE FROM $this->table_name WHERE prod_id = ? AND user_id = ?";

          // prepare and bind
    	$stmt = mysqli_stmt_init($this->conn);

    	if(!mysqli_stmt_prepare($stmt, $query)){
    		echo "SQL statement failed";
    	}
    	else{
    		mysqli_stmt_bind_param($stmt, "ss", $this->prod_id, $this->user_id);

    		if(mysqli_stmt_execute($stmt)){
    			return true;
    		}
    		return false;
    	}      
	}


	// delete product
    public function delete_qty() {
        // Create query
    	$query = "DELETE FROM $this->table_name WHERE user_id = ?";

          // prepare and bind
    	$stmt = mysqli_stmt_init($this->conn);

    	if(!mysqli_stmt_prepare($stmt, $query)){
    		echo "SQL statement failed";
    	}
    	else{
    		mysqli_stmt_bind_param($stmt, "s", $this->user_id);

    		if(mysqli_stmt_execute($stmt)){
    			return true;
    		}
    		return false;
    	}      
	}

}//end cart

