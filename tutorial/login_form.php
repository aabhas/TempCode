<?php
	//Code Author: Aabhas Sharma

			//network credentials
			$servername = 'engr-cpanel-mysql.engr.illinois.edu';
			$database = 'asharm36_dummy';
			$username = 'asharm36_test_ad';
			$password = 'test123';
			$con = mysqli_connect($servername, $username, $password, $database);
			
			//establish connection
			if(!$con) die("Unable to connect to MYSQL: ".mysql_error()); //echo("FAIL");
			
			//required variables
			$lsb = $_POST["lsb"];
			//echo($width);

			//sql operations
			$sql2 = "SELECT * FROM `Datatab` WHERE lsb_num >= '$lsb'";

			//sql connections
			$data = mysqli_query($con, $sql2);

			//array representing database table columns
			$columns = ["part_num", "od", "id", "width", "lsb_num"];

			// If one was found
			if (mysqli_num_rows($data)) 
			{
				echo json_encode(mysqli_fetch_all($data));
				// $row = mysqli_fetch_row($data);
				// $return = array_combine($columns, $row);
				// echo json_encode($return);
			}

			else {
			 	echo "not found";
			}

			mysqli_close($con);
?>
