<?php
$host = "localhost:3307";
$username = "root";
$password = "";
$database = "orderdb";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//database name - orderdb
//table name - data
//table - id, order_id, order amount, order date
?>

