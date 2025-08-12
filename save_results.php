<?php
// FILE: save_results.php

include 'db_connect.php';

$username = $_POST['username'];
$resultsData = $_POST['results_data'];

// First, get the user's ID
$stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    $userId = $user['id'];

    // Now, insert the game results
    // The second '?' is for a JSON data type, which PDO handles correctly as a string
    $insertStmt = $conn->prepare("INSERT INTO game_results (user_id, results_data) VALUES (?, ?)"); 
    
    if ($insertStmt->execute([$userId, $resultsData])) {
        echo json_encode(["status" => "success", "message" => "Results saved successfully."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to save results."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "User not found."]);
}
?>