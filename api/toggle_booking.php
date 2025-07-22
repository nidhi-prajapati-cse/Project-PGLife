<?php
session_start();
require "../includes/database_connect.php";

if (!isset($_SESSION['user_id'])) {
    echo "error"; // Not logged in
    exit;
}

if (!isset($_POST['property_id'])) {
    echo "error"; // No property ID
    exit;
}

$user_id = $_SESSION['user_id'];
$property_id = $_POST['property_id'];

// Check if already booked
$query = "SELECT * FROM booked_users_properties WHERE user_id = ? AND property_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $user_id, $property_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Already booked -> unbook it
    $deleteQuery = "DELETE FROM booked_users_properties WHERE user_id = ? AND property_id = ?";
    $deleteStmt = $conn->prepare($deleteQuery);
    $deleteStmt->bind_param("ii", $user_id, $property_id);
    $deleteStmt->execute();
    echo "unbooked";
} else {
    // Not booked -> insert booking
    $insertQuery = "INSERT INTO booked_users_properties(user_id, property_id) VALUES (?, ?)";
    $insertStmt = $conn->prepare($insertQuery);
    $insertStmt->bind_param("ii", $user_id, $property_id);
    if ($insertStmt->execute()) {
        echo "booked";
    } else {
        echo "error";
    }
}
?>
