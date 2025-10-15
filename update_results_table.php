<?php
include 'db_connect.php';
try {
    // Add a new column to store the type of game
    $conn->exec("ALTER TABLE game_results ADD COLUMN game_type VARCHAR(50) NOT NULL DEFAULT 'jungle';");
    echo "SUCCESS: 'game_results' table updated successfully with game_type column.";
} catch (PDOException $e) {
    die("An error occurred: " . $e->getMessage());
}
?>
