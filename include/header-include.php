<?php

  session_start();

  $root_url = "http://localhost/bus-management/";

  $root_path  = $_SERVER['DOCUMENT_ROOT'] . "/bus-management/";
  include($root_path . "include/connection.php");
  include($root_path . "include/file_upload.php");


?>