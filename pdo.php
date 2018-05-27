<?php

// mysql configuration
$db_host   = "35.224.141.246";
$db_user   = "root";
$db_pass   = "peromingan";
$db_name   = "online_job";

try {
  //creating new connection object from PDO
  $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $message) {
  echo $message->getMessage();
}

?>
