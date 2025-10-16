<?php
// FILE: fix_results_table.php

include 'db_connect.php';
header('Content-Type: text/plain');

try {
    // Correctly add the 'game_type' column to the 'game_results' table.
    $conn->exec("ALTER TABLE game_results ADD COLUMN game_type VARCHAR(50) NOT NULL DEFAULT 'jungle';");
    echo "SUCCESS: 'game_results' table has been correctly updated with the game_type column.";
} catch (PDOException $e) {
    // This will show an error if the column already exists, which is also a success in this case.
    die("An error occurred (or column already exists): " . $e->getMessage());
}
?>
