<?php
	$connection = mysqli_connect("localhost", "root", "", "ita");
	#check if product is provided
	$query = "SELECT * FROM reviews WHERE ip IN (SELECT ip FROM reviews GROUP BY ip, pid HAVING COUNT(*) > 1) AND pid IN (SELECT pid FROM reviews GROUP BY ip, pid HAVING COUNT(*) > 1) ORDER BY pid, rid";
	$query_run = mysqli_query($connection, $query);
	if ($query_run) {
		if (mysqli_num_rows($query_run) > 0) {
			$reviews = array();
			while ($row = mysqli_fetch_assoc($query_run)) {
				$review_data["rid"] = $row["rid"];
				$review_data["pid"] = $row["pid"];
				$review_data["pname"] = $row["pname"];
				$review_data["username"] = $row["username"];
				$review_data["email"] = $row["email"];
				$review_data["review"] = $row["review"];
				$review_data["ip"] = $row["ip"];
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