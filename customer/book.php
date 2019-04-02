<?php

include("../include/header-include.php");

if(isset($_SESSION["customer"])) {


	// get the next empty seat on bus
	$bus_id = $_GET["bus-id"];
	$customer_id = $_SESSION["customer"];

	$seat_q = "SELECT * FROM seats WHERE bus_id = '$bus_id' AND booking = 'empty-seat' LIMIT 1";
	$seat = mysqli_query($connection, $seat_q);

	

	$seat = mysqli_fetch_array($seat);
	$seat_id = $seat["id"];

	$occupied = "occupied";


	// book seat
	$book_q = "UPDATE seats SET booking = '$occupied', customer_id = '$customer_id' WHERE id = '$seat_id'";
	$book = mysqli_query($connection, $book_q);


	if($book) {

		header("Location: " . $root_url . "customer/bookings.php");
		

	} else {

		echo "Sorry, error booking. <a href='" . $root_url . "buses.php'>Try again</a>";

	}




} else {

	header("Location: " . $root_url . "customer-login.php");

}





?>