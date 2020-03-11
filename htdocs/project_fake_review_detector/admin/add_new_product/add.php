<?php
	#if error = file_put_contents(../../images/products/image.png): failed to open stream: 
	#Permission denied in add_new_product/add.php
	#solution = go to respective directories and in terminal type 
	#"sudo chmod -R 777 *"	it will give all permissions to read and write in subdirectories
	
	session_start();
	$connection = mysqli_connect("localhost", "root", "", "ita");
	#check if admin signed in or not
	if (isset($_SESSION["admin_mail"])) {
		#check if product category is provided throw if no
		if (isset($_POST["product_category"])) {
			#check if product id is provided throw if no
			if(isset($_POST["product_id"])){
				#check if product name is provided throw if no
				if (isset($_POST["product_name"])) {
					#check if product price is provided throw if no
					if (isset($_POST["product_price"])) {
						#check if product info is provided throw if no
						if(isset($_POST["product_info"])){
						#check if product image name is provided throw if no
							if (isset($_POST["product_image_name"])) {
								#check if product image data is provided throw if no
								if (isset($_POST["product_image_data"])) {
									$string_admin_email				= $_SESSION["admin_mail"];
									$string_product_category		= $_POST["product_category"];
									$string_product_id 				= $_POST["product_id"];
									$string_product_name			= $_POST["product_name"];
									$string_product_price			= $_POST["product_price"];
									$string_product_info			= $_POST["product_info"];
									$string_product_image_name		= $_POST["product_image_name"];
									$string_product_image_data		= $_POST["product_image_data"];
									if($string_product_category == '1'){
										$upload_directory				= "../../images/Men/";
									}else if($string_product_category == '2'){
										$upload_directory				= "../../images/Women/";
									}else if($string_product_category == '3'){
										$upload_directory				= "../../images/gadgets/";
									}else if($string_product_category == '4'){
										$upload_directory				= "../../images/Books/";
									}else if($string_product_category == '5' ){
										$upload_directory				= "../../images/sports/";
									}
									// $upload_directory				= "../../images/products/";
									$image_path						= "$upload_directory$string_product_image_name";
									$decoded_image 					= imageFromBase64($string_product_image_data);
									#check is file already exists or not
									#not exists
									if(!file_exists($image_path)){
										if(file_put_contents($image_path, $decoded_image)){
											$response["success"] 	= true;
											$response["message"]	= "File saved successfuly";
											$query					= "INSERT INTO products 
											( category, pid, pname, price, image, info) VALUES 
											('$string_product_category','$string_product_id','$string_product_name','$string_product_price','$string_product_image_name','$string_product_info')";
											$query_run = mysqli_query($connection, $query);
											if ($query_run) {
												$response["success"] = true;
												$response["message"] = "New product is added to database successfuly.";
											}else{
												$response["success"] = false;
												$response["message"] = "Unknown error is occurred while saving in database.";
											}
										}else{
											$response["success"]	= false;
											$response["message"]	= "Unknown error happened while saving image.";
										}
									#exists
									}else{
										$response["success"] 		= false;
										$response["message"] 		= "Same image name is already present, try with new one.";
									}
								}else{
									$response["success"] = false;
									$response["message"] = "Not all data provided";
								}
							}else{
								$response["success"] = false;
								$response["message"] = "Not all data provided";
							}
						}else{
							$response["success"] = false;
							$response["message"] = "Not all data provided";
						}
					}else{
						$response["success"] = false;
						$response["message"] = "Not all data provided";
					}
				}else{
					$response["success"] = false;
					$response["message"] = "Not all data provided";
				}
			}	else{
				$response["success"] = false;
				$response["message"] = "Not all data provided";
			}
		}else{
			$response["success"] = false;
			$response["message"] = "Not all data provided";
		}
	}else{
		$response["success"] = false;
		$response["message"] = "Please sign in first.";
	}
	

	#convert base64 encoded string into image string
	function imageFromBase64($imageData){
		$extension	= explode("/", explode(";",$imageData)[0])[1];
		$imageData 	= str_replace('data:image/'.$extension.';base64,', '', $imageData);
		$imageData 	= str_replace(' ', '+', $imageData);
		$decoded 	= base64_decode($imageData);
		return $decoded;	
	}
	echo json_encode($response);
	mysqli_close($connection);
?>
