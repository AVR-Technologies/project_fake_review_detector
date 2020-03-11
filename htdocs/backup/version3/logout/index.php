<?php
	session_start();
	session_destroy();
	$response["success"] = true;
	$response["message"] = "User logged out successfuly.";
	echo json_encode($response);
?>