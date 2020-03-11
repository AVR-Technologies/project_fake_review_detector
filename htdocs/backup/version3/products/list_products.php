<?php
	$connection 		= mysqli_connect("localhost", "root", "", "smart");
	$image_directory	= "../images/products/";
	#check if category provided then list products only in that category
	if (isset($_GET["category"])) {
		$string_category	= $_GET["category"];
		$query = "SELECT * FROM products WHERE category = '$string_category'";
	#list all products
	}else{
		$query = "SELECT * FROM products";
	}
	$query_run = mysqli_query($connection, $query);
	#check if query run successfuly
	if ($query_run) {
		#check if tables rows find with query
		if (mysqli_num_rows($query_run) > 0) {
			$products = array();
			#parse table rows data
			while ($row = mysqli_fetch_assoc($query_run)) {
				$product_data["id"] = $row['id'];
				$product_data["name"] = $row['name'];
				$product_data["price"] = $row['price'];
				$product_data["image_name"] = $image_directory.$row['image_name'];
				$products[] = $product_data;
			}
			$response["success"] = true;
			$response["message"] = "Products list fetched successfuly.";
			$response["product_list"] = $products;
		}else{
			$response["success"] = false;
			$message["message"]	 = "No products found in this category.";
		}
	}else{
		$response["success"] = false;
		$response["message"] = "Unknown error happened while refreshing product list.";
	}
	echo json_encode($response);
	mysqli_close($connection);
?>