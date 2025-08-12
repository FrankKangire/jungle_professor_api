<?php
// FILE: signup.php

include 'db_connect.php';

$username = $_POST['username'];
$password = $_POST['password'];

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// First, check if the user exists
$stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch();

if ($user) {
    echo json_encode(["status" => "error", "message" => "Username already exists."]);
} else {
    // Insert new user
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    if ($stmt->execute([$username, $hashed_password])) {
        echo json_encode([
            "status" => "success", 
            "username" => $username, 
            "message" => "Signup successful!"
        ]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error during signup."]);
    }
}
?>