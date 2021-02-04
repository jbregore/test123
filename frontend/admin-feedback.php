<?php

	session_start();
	if(isset($_SESSION['user_id'])){
		
	}
	else{
		header("Location: account.php");
		exit;
	}

	include 'admin-header.php';
	
?>


<main>
	<h2>Feedbacks</h2>
	<div id="prod-table">  

	</div>

	
</main>




<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script src="assets/js/jquery-3.5.1.min.js"></script>
<script src="assets/js/admin_feedback.js"></script>