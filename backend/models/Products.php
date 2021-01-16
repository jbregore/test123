<?php

class Product{
	private $conn;
	private $table_name = "tbl_product";

	//object properties
	public $prod_id;
	public $prod_brand;
	public $prod_name;
	public $prod_category;
	public $prod_price;
	public $prod_qty;
	public $prod_status;
	public $prod_photo;

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

	// get single product
	public function fetch_single() {
        // Create query
		$query = "SELECT * FROM $this->table_name WHERE prod_id = ?";

        //prepare and bind
		$stmt = mysqli_stmt_init($this->conn);

		if(!mysqli_stmt_prepare($stmt, $query)){
			echo "SQL statement failed";
		}
		else{
			mysqli_stmt_bind_param($stmt, "s", $this->prod_id);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);

			while($row = mysqli_fetch_assoc($result)){

				$this->prod_brand = $row['prod_brand'];
				$this->prod_name = $row['prod_name'];
				$this->prod_category = $row['prod_category'];
				$this->prod_price = $row['prod_price'];
				$this->prod_qty = $row['prod_qty'];
				$this->prod_status = $row['prod_status'];
				$this->prod_photo = $row['prod_photo'];
			}
		}
	}

	// create product
	public function create(){

		$this->prod_id = uniqid('', true);

		// Create query
		$query = "INSERT INTO $this->table_name (prod_id, prod_brand, prod_name, prod_category, prod_price, prod_qty, 
			prod_datein, prod_status, prod_photo)	VALUES (?, ?, ?, ?, ?, ?, NOW(), ?, ?)";

		// prepare and bind
		$stmt = mysqli_stmt_init($this->conn);

		if(!mysqli_stmt_prepare($stmt, $query)){
			echo "SQL statement failed";
		}
		else{
			mysqli_stmt_bind_param($stmt, "ssssiiss", $this->prod_id, $this->prod_brand, $this->prod_name, $this->prod_category, $this->prod_price, $this->prod_qty, $this->prod_status, $this->prod_photo);

			if(mysqli_stmt_execute($stmt)){
				return true;
			}
			return false;
		} 

	}

	// // update product
	public function update() {
          // Create query
		$query = "UPDATE $this->table_name
			SET prod_brand = ?, prod_name = ?, prod_category = ?, prod_price = ?, prod_qty = ?, prod_status = ? , prod_photo = ?
			WHERE prod_id = ?";

	          // prepare and bind
			$stmt = mysqli_stmt_init($this->conn);

		if(!mysqli_stmt_prepare($stmt, $query)){
			echo "SQL statement failed";
		}
		else{
			mysqli_stmt_bind_param($stmt, "sssiisss", $this->prod_brand, $this->prod_name, $this->prod_category, $this->prod_price, $this->prod_qty, $this->prod_status, $this->prod_photo, $this->prod_id);

			if(mysqli_stmt_execute($stmt)){
				return true;
			}
			return false;
		}      
	}

    // delete product
    public function delete() {
          // Create query
          $query = "DELETE FROM $this->table_name WHERE prod_id = ?";

          // prepare and bind
          $stmt = mysqli_stmt_init($this->conn);

          if(!mysqli_stmt_prepare($stmt, $query)){
          	echo "SQL statement failed";
          }
          else{
          	mysqli_stmt_bind_param($stmt, "s", $this->prod_id);

          	if(mysqli_stmt_execute($stmt)){
          		return true;
          	}
          	return false;
          }      
	}


	//admin dashboard total products
	public function total_products(){
		// Create query
		$query = "SELECT COUNT(*) as totalp FROM $this->table_name";

		//execute query
		$stmt = $this->conn->query($query);

		return $stmt;

	}

}//end product

class convertToString{
	public $str;

	public function __construct($str) {
		$this->str = $str;
	}

	public function __toString() {
		return (string) $this->str;
	}
}