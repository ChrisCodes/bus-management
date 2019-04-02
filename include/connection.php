<?php

$db_name  = "bus-management";

$db_user  = "root";

$db_pass  = "";

$db_host  = "localhost";


$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if($connection){

mysqli_select_db($connection, $db_name);

}


?>