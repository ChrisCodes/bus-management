<?php

include("include/header-include.php");

if(isset($_POST["login"])) {

	unset($_SESSION["login_errors"]);
	unset($_SESSION["login_credentials"]);

	//--get the email--
	$email;
	$password;

	$errors = 0;

	if(isset($_POST["email"]) && trim($_POST["email"]) != "") {

		$email = $_POST["email"];

		// set old credentials
		$_SESSION["login_credentials"]["email"] = $email;

	} else {

		$_SESSION["login_errors"]["email"] = "Invalid input";
		$errors++;
	}



	if(isset($_POST["password"]) && trim($_POST["password"]) != "") {

		$password = $_POST["password"];


	} else {

		$_SESSION["login_errors"]["password"] = "Invalid input";
		$errors++;
	}






	if($errors == 0) {

		//--get user for password--
		$login_q = "SELECT * FROM customers WHERE email = '$email'";
		$verify = mysqli_query($connection, $login_q);

		if(mysqli_num_rows($verify) == 0) {

			$_SESSION["login_errors"]['email'] = "User email doesn't exist";

			// redirect to login
			header("Location: customer-login.php");


		} else {

			// check password
			$admin_data = mysqli_fetch_array($verify);
			$db_password = $admin_data["password"];

			if($password == $db_password) {

				// login
				$_SESSION["customer"] = $admin_data["id"];

				//attempt logging in
				header('Location: customer/bookings.php');


			} else {


				$_SESSION["login_errors"]['password'] = "Wrong credentials for user";
				
				// redirect to login
				header("Location: customer-login.php");


			}

		}

	} else {

		// redirect to login
		header('Location: customer-login.php');
	}


	
}













if(isset($_POST["register"])) {


	unset($_SESSION["register_errors"]);
	unset($_SESSION["register_credentials"]);





	//--get the email--
	$name;
	$email;
	$password;


	$errors = 0;

	if(isset($_POST["name"]) && trim($_POST["name"]) != "") {

		$name = $_POST["name"];

		// set old credentials
		$_SESSION["register_credentials"]["name"] = $name;

	} else {

		$_SESSION["register_errors"]["name"] = "Invalid input";
		$errors++;
	}





	if(isset($_POST["email"]) && trim($_POST["email"]) != "") {

		$email = $_POST["email"];

		// set old credentials
		$_SESSION["register_credentials"]["email"] = $email;

	} else {

		$_SESSION["register_errors"]["email"] = "Invalid input";
		$errors++;
	}







	if(isset($_POST["password"]) && trim($_POST["password"]) != "") {

		$password = $_POST["password"];


	} else {

		$_SESSION["register_errors"]["password"] = "Invalid input";
		$errors++;
	}






	if($errors == 0) {

		//--add user---
		$reg_q = "INSERT INTO customers VALUES(NULL, '$name', '$email', '-', '$password', '-')";
		$register = mysqli_query($connection, $reg_q);


		if(!$register) {

			$_SESSION["register_errors"]['general'] = mysqli_error($connection);

			// redirect to login
			header("Location: customer-register.php");


		} else {

			
			// login
			$_SESSION["customer"] = mysqli_insert_id($connection);

			//attempt logging in
			header('Location: buses.php');


		}

	} else {

		// redirect to login
		header('Location: customer-register.php');
	}



	
}











?>