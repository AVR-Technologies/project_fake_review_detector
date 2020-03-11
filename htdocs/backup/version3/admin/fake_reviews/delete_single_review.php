<?php
	$connection = mysqli_connect("localhost", "root", "", "smart");
	if (isset($_POST["id"])) {
		$review_id = $_POST["id"];
		$query = "DELETE FROM feedbacks WHERE id = '$review_id'";
		$query_run = mysqli_query($connection, $query);
		if ($query_run) {
			$response["success"] = true;
			$response["message"] = "Review deleted successfuly.";
		}else{
			$response["success"] = false;
			$response["message"] = "Unknown error occurred while deleting review.";
		}
	}else{
		$response["success"] = false;
		$response["message"] = "No id provided. Operation cannot perform";
	}
	echo json_encode($response);
	mysqli_close($connection);
?>