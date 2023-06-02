<?php
define('user','amr');
define('password','12345');

$servername = "localhost";
$username = "amr";
$password = "12345";
$dbname = "cardb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>