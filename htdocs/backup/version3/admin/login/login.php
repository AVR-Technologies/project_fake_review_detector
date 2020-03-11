<?php
	session_start();
	$connection = mysqli_connect("localhost", "root", "", "smart");
	#check if email is provided if no throw error
	if (isset($_GET["email"])) {
		#check if password is provided if no throw error
		if (isset($_GET["password"])) {
			$string_email = $_GET["email"];
			$string_password = $_GET["password"];
			#query if email already present in database
			$query = "SELECT * FROM admin WHERE email = '$string_email' AND password = '$string_password'";
			$query_run = mysqli_query($connection,  $query);
			#check if email and password present if yes throw error
			if (mysqli_num_rows($query_run)>0) {
				$_SESSION["admin_mail"] = $string_email;
				$response["success"] = true;
				$response["message"] = "Successfully logged in.";
			}else{
				$response["success"] = false;
				$response["message"] = "Account not found, try to register with new one.";
			}
		}else{
			$response["success"] = false;
			$response["message"] = "Not all data provided.";
		}
	}else{
		$response["success"] = false;
		$response["message"] = "Not all data provided.";
	}
	echo json_encode($response);
	mysqli_close($connection);
?>
