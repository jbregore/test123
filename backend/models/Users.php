<?php

class User{
	private $conn;
	private $table_name = "tbl_user";


	private $table_admin = "tbl_admin";
	public $admin_old_password;
	public $admin_new_password;

	public $user_old_password;
	public $user_new_password;

	//object properties
	public $user_id;
	public $user_username;
	public $user_password;
	public $user_status;

	//login credentials
	public $login_user_id;
	public $login_user_username;

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



	//admin dashboard total products
	public function total_users(){
		// Create query
		$query = "SELECT COUNT(*) as totalu FROM $this->table_name";

		//execute query
		$stmt = $this->conn->query($query);

		return $stmt;

	}


	//login 
	public function login(){
		// Create query
		$query = "SELECT * FROM $this->table_name WHERE user_username = ? AND user_password = ? AND user_status = 'Active'";

		//prepare and bind
		$stmt = mysqli_stmt_init($this->conn);

		if(!mysqli_stmt_prepare($stmt, $query)){
			echo "SQL statement failed";
		}
		else{
			mysqli_stmt_bind_param($stmt, "ss", $this->user_username, $this->user_password);

			//execute query
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);

			if(mysqli_stmt_execute($stmt)){
				
				if(mysqli_num_rows($result) == 1){

					while($row = mysqli_fetch_assoc($result)){
						$this->user_id = $row['user_id'];
						$this->user_username = $row['user_username'];
						$this->user_password = $row['user_password'];
						$this->user_status = $row['user_status'];
					}

					$row = mysqli_fetch_assoc($result);
					session_start();
					$_SESSION['user_id'] = $this->user_id;
					$_SESSION['user_username'] = $this->user_username;
					return true;
					// echo "kalamugang utot";
				}
				else{
					// echo "failed";
					return false;
				}
				
				
			}//end first stmt
			return false;
		} 
	
	}

	//login admin
	public function login_admin(){
		// Create query

		$query = "SELECT * FROM $this->table_admin WHERE username = ? AND password = ? ";

		//prepare and bind
		$stmt = mysqli_stmt_init($this->conn);

		if(!mysqli_stmt_prepare($stmt, $query)){
			echo "SQL statement failed";
		}
		else{
			mysqli_stmt_bind_param($stmt, "ss", $this->user_username, $this->user_password);

			//execute query
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);

			if(mysqli_stmt_execute($stmt)){
				
				if(mysqli_num_rows($result) == 1){

					while($row = mysqli_fetch_assoc($result)){
						$this->user_username = $row['username'];
						$this->user_password = $row['password'];
					}

					$row = mysqli_fetch_assoc($result);
					session_start();
					$_SESSION['user_id'] = 'admin';
					return true;
					// echo "kalamugang utot";
				}
				else{
					// echo "failed";
					return false;
				}
				
				
			}//end first stmt
			return false;
		} 
	
	}


	//block
	public function block(){
		$query = "UPDATE $this->table_name SET user_status = ? WHERE user_id = ?";

	          // prepare and bind
			$stmt = mysqli_stmt_init($this->conn);

		if(!mysqli_stmt_prepare($stmt, $query)){
			echo "SQL statement failed";
		}
		else{
			$user_new_status = 'Inactive';
			mysqli_stmt_bind_param($stmt, "ss", $user_new_status, $this->user_id);

			if(mysqli_stmt_execute($stmt)){
				return true;
			}
			return false;
		} 
	}


	//unblock
	public function unblock(){
		$query = "UPDATE $this->table_name SET user_status = ? WHERE user_id = ?";

	          // prepare and bind
			$stmt = mysqli_stmt_init($this->conn);

		if(!mysqli_stmt_prepare($stmt, $query)){
			echo "SQL statement failed";
		}
		else{
			$user_new_status = 'Active';
			mysqli_stmt_bind_param($stmt, "ss", $user_new_status, $this->user_id);

			if(mysqli_stmt_execute($stmt)){
				return true;
			}
			return false;
		} 
	}
	
	//admin change pass
	public function admin_change(){
		// Create query
		$query = "SELECT password FROM $this->table_admin";

		//prepare and bind
		$stmt = mysqli_stmt_init($this->conn);

		if(!mysqli_stmt_prepare($stmt, $query)){
			echo "SQL statement failed";
		}
		else{

			//execute query
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);

			if(mysqli_stmt_execute($stmt)){
				
				if(mysqli_num_rows($result) == 1){
					while($row = mysqli_fetch_assoc($result)){
						$old_pass = $row['password'];
					}

					if($old_pass == $this->admin_old_password){
						//execute query
						$change = "UPDATE $this->table_admin SET password = ?";
						$stmt = mysqli_stmt_init($this->conn);

						if(!mysqli_stmt_prepare($stmt, $change)){
							echo "SQL statement failed";
						}
						else{
							mysqli_stmt_bind_param($stmt, "s", $this->admin_new_password);

							if(mysqli_stmt_execute($stmt)){
								return true;
							}
							return false;
						}
					}

				}
				else{
					// echo "failed";
					return false;
				}
				
				
			}//end first stmt
			return false;
		} 
	
	}
	
	//user change pass
	public function user_change(){
		// Create query
		$query = "SELECT user_password FROM $this->table_name WHERE user_id = ?";

		//prepare and bind
		$stmt = mysqli_stmt_init($this->conn);

		if(!mysqli_stmt_prepare($stmt, $query)){
			echo "SQL statement failed";
		}
		else{
			mysqli_stmt_bind_param($stmt, "s", $this->user_id);
			//execute query
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);

			if(mysqli_stmt_execute($stmt)){
				
				if(mysqli_num_rows($result) == 1){
					while($row = mysqli_fetch_assoc($result)){
						$old_pass = $row['user_password'];
					}

					if($old_pass == $this->user_old_password){
						//execute query
						$change = "UPDATE $this->table_name SET user_password = ? WHERE user_id = ?";
						$stmt = mysqli_stmt_init($this->conn);

						if(!mysqli_stmt_prepare($stmt, $change)){
							echo "SQL statement failed";
						}
						else{
							mysqli_stmt_bind_param($stmt, "ss", $this->user_new_password, $this->user_id);

							if(mysqli_stmt_execute($stmt)){
								return true;
							}
							return false;
						}
					}

				}
				else{
					// echo "failed";
					return false;
				}
				
				
			}//end first stmt
			return false;
		} 
	
	}


}//end product

