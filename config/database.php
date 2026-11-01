<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "auth_db";

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
  die("Connection error: " . mysqli_connect_error());
}
