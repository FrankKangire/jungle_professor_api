<?php
// FILE: get_results.php

include 'db_connect.php';

$username = $_GET['username'];

$stmt = $conn->prepare("SELECT gr.id, gr.created_at FROM game_results gr JOIN users u ON gr.user_id = u.id WHERE u.username = ? ORDER BY gr.created_at DESC");
$stmt->execute([$username]);

// fetchAll() gets all matching rows into an array
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(["status" => "success", "data" => $results]);
?>