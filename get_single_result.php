<?php
// FILE: get_single_result.php

include 'db_connect.php';

$resultId = $_GET['id'];

$stmt = $conn->prepare("SELECT results_data FROM game_results WHERE id = ?");
$stmt->execute([$resultId]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row) {
    echo json_encode(["status" => "success", "data" => json_decode($row['results_data'])]);
} else {
    echo json_encode(["status" => "error", "message" => "Result not found."]);
}
?>