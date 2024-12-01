<?php
session_start();
require("../includes/database_connect.php");

// Sanitize and validate input
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Ensure email and password fields are not empty
if (empty($email) || empty($password)) {
    $response = array("success" => false, "message" => "Email and password are required!");
    echo json_encode($response);
    return;
}

// Hash the password with SHA1 (Note: SHA-1 is not recommended for passwords. Use bcrypt or similar in the future)
$password = sha1($password);

// Create SQL query to check user credentials
$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    // Handle SQL query failure
    $response = array("success" => false, "message" => "Something went wrong with the database query!");
    echo json_encode($response);
    return;
}

$row_count = mysqli_num_rows($result);

if ($row_count == 0) {
    // No matching email/password found
    $response = array("success" => false, "message" => "Login failed! Invalid email or password.");
    echo json_encode($response);
    return;
}

// Fetch user data from the query result
$row = mysqli_fetch_assoc($result);

// Set session variables upon successful login
$_SESSION['user_id'] = $row['id'];
$_SESSION['full_name'] = $row['full_name'];
$_SESSION['email'] = $row['email'];

// Send a success response
$response = array("success" => true, "message" => "Login successful!");
echo json_encode($response);

// Close the database connection
mysqli_close($conn);
?>
