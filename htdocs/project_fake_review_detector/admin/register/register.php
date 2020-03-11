<?php
	session_start();
	$connection = mysqli_connect("localhost", "root", "", "ita");
	#check if email is provided if no throw error
	if (isset($_GET["email"])) {
		#check if username is provided if no throw error
		if (isset($_GET["username"])) {
			#check if mobile no is provided if no throw error
			if (isset($_GET["mobile_no"])) {
				#check if password is provided if no throw error
				if (isset($_GET["password"])) {
					$string_email = $_GET["email"];
					$string_username = $_GET["username"];
					$string_mobile_no = $_GET["mobile_no"];
					$string_password = $_GET["password"];
					#query if email already present in database
					$query = "SELECT * FROM admin WHERE email = '$string_email'";
					$query_run = mysqli_query($connection,  $query);
					#check if email already present if yes throw error
					if (mysqli_num_rows($query_run)>0) {
						$response["success"] = false;
						$response["message"] = "Email already present, register with new email.";
					}else{
						$query = "INSERT INTO admin (email, username, mobile, password) VALUES ('$string_email', '$string_username', '$string_mobile_no', '$string_password')";
						$query_run = mysqli_query($connection, $query);
						#insert new admin data throw error if query failed
						if ($query_run) {
							$_SESSION["admin_mail"] = $string_email;
							$response["success"] = true;
							$response["message"] = "The account created successfully.";
						}else{
							$response["success"] = false;
							$response["message"] = "Unknown error is occurred while creating new account.";
						}
					}
				}else{
					$response["success"] = false;
					$response["message"] = "Not all data provided.";
				}
			}else{
				$response["success"] = false;
				$response["message"] = "Not all data provided.";
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
