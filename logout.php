<?php
session_start();

$redirect_url;

if(isset($_SESSION["admin"])) {

	$redirect_url = "login.php";

} else if(isset($_SESSION["customer"])) {

	$redirect_url = "customer-login.php";

}

session_destroy();
header("Location: " . $redirect_url);


?>