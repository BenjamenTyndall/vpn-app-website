<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Access-Control-Allow-Origin: *'); // Allow requests from any origin
header('Access-Control-Allow-Methods: POST, GET, OPTIONS'); // Allow POST and GET requests
header('Access-Control-Allow-Headers: Origin, Content-Type'); // Allow specified headers
header('Content-Type: application/json');

require "config.php";

$response = []; // Initialize an empty response array

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST["user"];
    $password = $_POST["password"];

    $match = mysqli_query($conn, "SELECT * FROM users WHERE username = '$user'");
    $row = mysqli_fetch_assoc($match);

    if ($row && password_verify($password, $row['password'])) {
        if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
        $_SESSION["login"] = true;
        $_SESSION["id"] = $row["id"];
        $response['message'] = 'passed';
    } else {
        $response['message'] = 'failed';
    }
} else {
    $response['message'] = 'Invalid request method';
}

echo json_encode($response);
?>
