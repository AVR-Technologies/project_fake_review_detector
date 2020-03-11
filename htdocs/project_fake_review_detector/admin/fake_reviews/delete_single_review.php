<?php
	$connection = mysqli_connect("localhost", "root", "", "ita");
	if (isset($_POST["rid"])) {
		$review_id = $_POST["rid"];
		$query = "DELETE FROM reviews WHERE rid = '$review_id'";
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