<?php

$conn = new mysqli ("localhost", "root", "", "db_rumahsakit");

if ($conn->connect_errno) {
	die ("ERROR : -> " . $conn->connect_error);
	exit();
} else {

}
?>