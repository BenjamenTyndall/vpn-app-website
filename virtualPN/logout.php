<?php
require 'config.php';
header("Access-Control-Allow-Origin: *"); // Replace * with the specific origin of your Flutter app
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: *"); // You may need to specify the allowed headers

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // Clear the session data
    $_SESSION = [];
    session_unset();
    session_destroy();

    // Send a JSON response indicating successful logout
    $response = ['status' => 'success', 'message' => 'User logged out successfully'];
} else {
    // Send a JSON response indicating that the user was not logged in
    $response = ['status' => 'error', 'message' => 'User was not logged in'];
}

// Send the JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
