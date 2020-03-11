<?php
	$connection = mysqli_connect("localhost", "root", "", "smart");
	#check if product is provided
	if (isset($_GET["id"])) {
		$product_id = $_GET["id"];
		$query = "SELECT * FROM feedbacks WHERE product_id = $product_id";
		$query_run = mysqli_query($connection, $query);
		if ($query_run) {
			if (mysqli_num_rows($query_run) > 0) {
				$reviews = array();
				while ($row = mysqli_fetch_assoc($query_run)) {
					$review_data["id"] = $row["id"];
					$review_data["email"] = $row["email"];
					$review_data["review"] = $row["review"];
					$review_data["rating"] = $row["rating"];
					$reviews[] = $review_data;
				}
				$response["review_list"] = $reviews;
				$response["success"] = true;
				$response["message"] = "All data fetched successfuly.";
			}else{
				$response["success"] = false;
				$response["message"] = "No Reviews found.";
			}
		}else{
			$response["success"] = false;
			$response["message"] = "Unknown error occurred while listing reviews.";
		}	
	}else{
		$response["success"] = false;
		$response["message"] = "Product id not provided.";
	}
	echo json_encode($response);
	mysqli_close($connection);
?>