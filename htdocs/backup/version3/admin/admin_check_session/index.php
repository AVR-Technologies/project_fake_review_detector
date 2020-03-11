<?php
	session_start();
	if (isset($_SESSION["admin_mail"])) {
		$response["success"] 	= true;
		$response["admin_mail"] = $_SESSION["admin_mail"];
		$response["message"]	= "User Session available.";
	}else{
		$response["success"]	= false;
		$response["message"]	= "No user session available.";
	}
	echo json_encode($response);
?>