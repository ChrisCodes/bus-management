<?php

 
include("../include/header-include.php");


if(isset($_POST["add-route"])) {

	unset($_SESSION["route_errors"]);
	unset($_SESSION["route_credentials"]);


	//--get the email--
	$departure;
	$destination;
	$fare;

	$errors = 0;



	if(isset($_POST["departure"]) && trim($_POST["departure"]) != "") {

		$departure = $_POST["departure"];

		// set old credentials
		$_SESSION["route_credentials"]["departure"] = $departure;

	} else {

		$_SESSION["route_errors"]["departure"] = "Supply departure";
		$errors++;
	}





	if(isset($_POST["destination"]) && trim($_POST["destination"]) != "") {

		$destination = $_POST["destination"];

		// set old credentials
		$_SESSION["route_credentials"]["destination"] = $departure;


	} else {

		$_SESSION["route_errors"]["destination"] = "Supply destination";
		$errors++;
	}










	if(isset($_POST["fare"]) && trim($_POST["fare"]) != "") {

		$fare = $_POST["fare"];

		// set old credentials
		$_SESSION["route_credentials"]["fare"] = $fare;


	} else {

		$_SESSION["route_errors"]["fare"] = "Enter fare";
		$errors++;
	}







	if($errors == 0) {

		//--get user for password--
		$route_q = "INSERT INTO routes VALUES(NULL, '$departure', '$destination', '$fare' );";
		$add = mysqli_query($connection, $route_q);

		if(!$add) {

			$_SESSION["route_errors"]['general'] = "Failed to add. Try later." . mysqli_error($connection);

			// redirect to login
			header("Location: " . $root_url . "admin/add-route.php");


		} else {

			unset($_SESSION["route_errors"]);
			unset($_SESSION["route_credentials"]);
			unset($_SESSION["route_success"]);

			// success message
			$_SESSION["route_success"][] = "Successfully added route. <br /><a href=\"". $root_url."routes.php\">See routes</a>";


			header("Location: " . $root_url . "admin/add-route.php");

			
		}



	} else {

		// redirect to add route
		header("Location: " . $root_url . "admin/add-route.php");

	}


	
}










?>