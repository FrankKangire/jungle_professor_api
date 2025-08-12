<?php
// FILE: login.php

include 'db_connect.php'; // This now provides a PDO connection object named $conn

$username = $_POST['username'];
$password = $_POST['password'];

// PDO uses '?' as placeholders
$stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
// Pass parameters in an array to execute()
$stmt->execute([$username]); 

// fetch() gets a single row
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    // password_verify works the same way
    if (password_verify($password, $user['password'])) {
        echo json_encode(["status" => "success", "username" => $user['username']]);
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid password."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "User not found."]);
}
?>