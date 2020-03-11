<?php
	#check if product is provided
	//deleteAllFakeReviews(getIds(idOfAllFakeReviews()));
	$response["success"] = true;
	$response["message"] = "nowstarted";

	$connection = mysqli_connect("localhost", "root", "", "ita");

	#get fake reviews id in array format ex. ["id":1,"id":2,"id",3]
	$query = "SELECT * FROM reviews WHERE ip IN (SELECT ip FROM reviews GROUP BY ip, pid HAVING COUNT(*) > 1) AND pid IN (SELECT pid FROM reviews GROUP BY ip, pid HAVING COUNT(*) > 1) ORDER BY pid, rid";
	$query_run = mysqli_query($connection, $query);
	if ($query_run) {
		if (mysqli_num_rows($query_run) > 0) {
			$reviews = array();
			while ($row = mysqli_fetch_assoc($query_run)) {
				$reviews[] = $row["pid"];
			}
			# convert array format to quamma seperated string ex. 1,2,3
			$id_of_rows_to_be_deleted = implode(",", $reviews);
			#on last delete all selected rows where id i given
			$query = "DELETE FROM reviews WHERE pid IN ($id_of_rows_to_be_deleted)";
			$query_run = mysqli_query($connection, $query);
			if ($query_run) {
				$response["success"] = true;
				$response["message"] = "All fake reviews deleted successfuly.";				
			}
		}else{
			$response["success"] = false;
			$response["message"] = "No data found to delete.";
		}
	}
	mysqli_close($connection);
	echo json_encode($response);
?>