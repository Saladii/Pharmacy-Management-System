<?php
$servername = "localhost";
$username = "pharmacy";
$password = "passwordD1";
$dbname = "registration";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
