<?php
// FILE: save_results.php

include 'db_connect.php';

$username = $_POST['username'];
$resultsData = $_POST['results_data'];
$gameType = $_POST['game_type']; // Get the new game_type from the request

// First, get the user's ID
$stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    $userId = $user['id'];

    // Now, insert the game results, including the game type
    $insertStmt = $conn->prepare("INSERT INTO game_results (user_id, results_data, game_type) VALUES (?, ?, ?)"); 
    
    if ($insertStmt->execute([$userId, $resultsData, $gameType])) {
        echo json_encode(["status" => "success", "message" => "Results saved successfully."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to save results."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "User not found."]);
}
?>