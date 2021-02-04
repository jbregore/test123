<?php

class Transaction{
	private $conn;
	private $table_name = "tbl_transaction";

	//object properties
	//user
	public $trans_id;
	public $user_id;

	//paypal
	public $paypal_name;
	public $paypal_address;

	//transaction
	public $total_prod;
	public $total_item;
	public $trans_date;
	public $trans_total;

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

	
	// create transaction
	public function create(){

		$query = "INSERT INTO $this->table_name (user_id, paypal_name, paypal_address, total_prod, total_item, trans_date, trans_total)	VALUES (?, ?, ?, ?, ?, ?, ?)";

					// prepare and bind
		$stmt = mysqli_stmt_init($this->conn);

		if(!mysqli_stmt_prepare($stmt, $query)){
			echo "SQL statement failed";
		}
		else{
			mysqli_stmt_bind_param($stmt, "ssssisi", $this->user_id, $this->paypal_name, $this->paypal_address, $this->total_prod, $this->total_item, $this->trans_date, $this->trans_total);

			if(mysqli_stmt_execute($stmt)){
				return true;
			}
			return false;
		} 

	}


	//get total sales
	public function total_sales(){
		// Create query
		$query = "SELECT SUM(trans_total) as totals FROM $this->table_name";

		//execute query
		$stmt = $this->conn->query($query);

		return $stmt;
	}

	// delete transaction
    public function delete() {
		// Create query
		$query = "DELETE FROM $this->table_name WHERE trans_id = ?";

		// prepare and bind
		$stmt = mysqli_stmt_init($this->conn);

		if(!mysqli_stmt_prepare($stmt, $query)){
			echo "SQL statement failed";
		}
		else{
			mysqli_stmt_bind_param($stmt, "i", $this->trans_id);

			if(mysqli_stmt_execute($stmt)){
				return true;
			}
			return false;
		}      
    }
	
}//end transaction

