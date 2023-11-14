<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "Restaurant";

$connect = mysqli_connect($host, $user, $pass, $dbname);

if (!$connect) {
  die("Connection failed: " . mysqli_connect_error());
}
