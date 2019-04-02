<?php

 
include("../include/header-include.php");


if(isset($_POST["add-bus"])) {


	unset($_SESSION["bus_errors"]);
	unset($_SESSION["bus_credentials"]);
	unset($_SESSION["bus_success"]);





	//--get the plate--
	$name;
	$plate;
	$route;
	$photo;
	$seats;


	$errors = 0;

	if(isset($_POST["name"]) && trim($_POST["name"]) != "") {

		$name = $_POST["name"];

		// set old credentials
		$_SESSION["bus_credentials"]["name"] = $name;

	} else {

		$_SESSION["bus_errors"]["name"] = "Enter bus name";
		$errors++;
	}





	if(isset($_POST["plate"]) && trim($_POST["plate"]) != "") {

		$plate = $_POST["plate"];

		// set old credentials
		$_SESSION["bus_credentials"]["plate"] = $plate;

	} else {

		$_SESSION["bus_errors"]["plate"] = "Enter plate number";
		$errors++;
	}







	if(isset($_POST["route"]) && trim($_POST["route"]) != "") {

		$route = $_POST["route"];
		// set old credentials
		$_SESSION["bus_credentials"]["route"] = $route;


	} else {

		$_SESSION["bus_errors"]["route"] = "No route selected";
		$errors++;
	}







	if(isset($_POST["seats"]) && trim($_POST["seats"]) != "") {

		$seats = $_POST["seats"];
		// set old credentials
		$_SESSION["bus_credentials"]["seats"] = $seats;


	} else {

		$_SESSION["bus_errors"]["seats"] = "Specify no of seats";
		$errors++;
	}







	if(trim($_FILES['photo']['tmp_name']) != "") {


		$photo = $_FILES["photo"];


	} else {

		$_SESSION["bus_errors"]["photo"] = "Please upload a valid photo";
		$errors++;


	}






	if($errors == 0) {


		//upload the photo
		$first_name = strtolower(str_replace(" ", "_", $name));
		$target_dir = "../images/buses/";
		
		$filename = $_FILES['photo']['name'];
		$filename_array = explode('.', $filename);
		$fileExtension = strtolower(end($filename_array));
		$target_file = "bus_" . $first_name ."_". rand() . ".". $fileExtension;


		// var_dump($_FILES['photo']);

		$uploaded = uploadFile("photo", $target_dir, $target_file);

		if(!$uploaded) {

			$_SESSION["bus_errors"]["photo"] = "Please upload a valid photo";

			header("Location: " . $root_url . "admin/add-bus.php");


		} else {

			$_SESSION["bus_success"][] = "Uploaded bus photo";

		}


		$bus_photo = $root_url . "images/buses/" . "" . $target_file;


		//--add bus---
		$add_q = "INSERT INTO buses VALUES(NULL, '$name', '$plate', '$route', '$seats', '$bus_photo')";
		$add = mysqli_query($connection, $add_q);


		if(!$add) {

			$_SESSION["bus_errors"]['general'] = mysqli_error($connection);

			// redirect to add bus page
			// header("Location: " . $root_url . "admin/add-bus.php");


		} else {

			$bus_id = mysqli_insert_id($connection);

			// create the bus seats
			$seats_added = 0;

			for ($i=0; $i < (int)$seats ; $i++) { 

				# insert seat
				$seat_no = $i + 1;
				$seat_q = "INSERT INTO seats VALUES(NULL, '$bus_id', '$seat_no', 'empty-seat', 'none')";
				$seat = mysqli_query($connection, $seat_q);

				if($seat) {

					$seats_added++;
				}


			}


			$_SESSION["bus_success"][] = $seats_added . " seats added.";


			$_SESSION["bus_success"][] = "Bus successfully added. 
			<a href='" . $root_url . "/buses.php' >See buses </a></p>";

			// unset credentials
			unset($_SESSION["bus_credentials"]);
			unset($_SESSION["bus_errors"]);

			//attempt logging in
			header("Location: " . $root_url . "admin/add-bus.php");


		}

	} else {

		// redirect to add-bus page
		// header("Location: " . $root_url . "admin/add-bus.php");


	}



	
}








?>