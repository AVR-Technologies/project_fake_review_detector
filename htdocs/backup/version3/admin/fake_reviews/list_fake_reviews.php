<?php
	$connection = mysqli_connect("localhost", "root", "", "smart");
	#check if product is provided
	$query = "SELECT * FROM feedbacks WHERE ip IN (SELECT ip FROM feedbacks GROUP BY ip, product_id HAVING COUNT(*) > 1) AND product_id IN (SELECT product_id FROM feedbacks GROUP BY ip, product_id HAVING COUNT(*) > 1) ORDER BY product_id, id";
	$query_run = mysqli_query($connection, $query);
	if ($query_run) {
		if (mysqli_num_rows($query_run) > 0) {
			$reviews = array();
			while ($row = mysqli_fetch_assoc($query_run)) {
				$review_data["id"] = $row["id"];
				$review_data["email"] = $row["email"];
				$review_data["review"] = $row["review"];
				$review_data["rating"] = $row["rating"];
				$review_data["ip"] = $row["ip"];
				$review_data["product_id"] = $row["product_id"];
				$reviews[] = $review_data;
			}
			$response["fake_review_list"] = $reviews;
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
	echo json_encode($response);
	mysqli_close($connection);
?>