<?php
	session_start();
	$connection = mysqli_connect("localhost", "root", "", "smart");
	#check if user signed in // if user session available 
	if (isset($_SESSION["user_mail"])) {
		#check if is provided
		if (isset($_GET["id"])) {
			#check if review is provided
			if (isset($_GET["review"])) {
				#check if rating is provided
				if (isset($_GET["rating"])) {
					$string_local_ip		=	$_SERVER['REMOTE_ADDR'];
					$string_email			=	$_SESSION["user_mail"];
					$string_product_id		=	$_GET["id"];
					$string_review			=	$_GET["review"];
					$string_rating			=	$_GET["rating"];
					$query = "SELECT * FROM products WHERE id = '$string_product_id'";
					$query_run = mysqli_query($connection, $query);
					#check if product is present with provided id
					if ($query_run) {
						if (mysqli_num_rows($query_run) > 0) {
							$query = "INSERT INTO feedbacks (email, review , ip, product_id, rating) VALUES ('$string_email','$string_review','$string_local_ip','$string_product_id','$string_rating')";
							$query_run = mysqli_query($connection, $query);
							#check if review is submitted or not 
							if ($query_run) {
								$response["success"] = true;
								$response["message"] = "Review submitted successfuly.";
							}else{
								$response["success"] = false;
								$response["message"] = "Unknown error happened while submitting review.";
							}
						}else{
							$response["success"] = false;
							$response["message"] = "No product is found with provided id.";
						}	
					}else{
						$response["success"] = false;
						$response["message"] = "Unknown error is happened while searching product.";
					}
				}else{
					$response["success"] = false;
					$response["message"] = "Not all data is provied.";
				}
			}else{
				$response["success"] = false;
				$response["message"] = "Not all data is provied.";
			}
		}else{
			$response["success"] = false;
			$response["message"] = "Not all is provided.";
		}
	}else{
		$response["success"] = false;
		$response["message"] = "Review can not submitted, please sign in first.";
	}
	echo json_encode($response);
	mysqli_close($connection);
?>