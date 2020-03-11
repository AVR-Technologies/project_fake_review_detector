<?php
	session_start();
	if (isset($_SESSION["user_mail"])) {
		$response["success"] 	= true;
		$response["user_mail"] 	= $_SESSION["user_mail"];
		$response["message"]	= "User Session available.";
	}else{
		$response["success"]	= false;
		$response["message"]	= "No user session available.";
	}
	echo json_encode($response);
?>