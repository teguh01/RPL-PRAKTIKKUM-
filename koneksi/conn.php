<?php
date_default_timezone_set("Asia/Jakarta");
$servername = "localhost";
$username = "id8313853_user";
$password = "kelompok5";
$dbname = "id8313853_user";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>