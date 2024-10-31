<?php
session_start();

// Attempt to establish a connection to the database
$conn = mysqli_connect("localhost", "root", "", "virtualpn");

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
