<?php
	$connection 		= mysqli_connect("localhost", "root", "", "smart");
	$image_directory	= "../images/products/";
	if (isset($_GET['id'])) {
		$product_id = $_GET['id'];
		$query = "SELECT * FROM products WHERE id = '$product_id'";
		$query_run = mysqli_query($connection, $query);
		#check if query runs
		if ($query_run) {
			#check if tables rows available with query result
			if (mysqli_num_rows($query_run) > 0) {
				#parse table rows contents fetch with query result
				while ($rows = mysqli_fetch_assoc($query_run)) {
					$response["id"] = $rows["id"];
					$response["name"] = $rows["name"];
					$response["price"] = $rows["price"];
					$response["image_name"] = $image_directory.$rows['image_name'];
				}
				$response["success"] = true;
				$response["message"] = "All data fetched successfuly.";
			}else{
				$response["success"] = false;
				$response["message"] = "No data found with provided id";
			}	
		}else{
			$response["success"] = false;
			$response["message"] = "Unknown error happened while fetching data";
		}
	}else{
		$response["success"] = false;
		$response["message"] = "Product id is not provided.";
	}
	echo json_encode($response);
	mysqli_close($connection);
?>