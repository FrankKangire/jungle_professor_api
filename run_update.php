<?php
// FILE: run_update.php
include 'db_connect.php';
header('Content-Type: text/plain');

try {
    // We use a try-catch to see if the column already exists.
    // This is a safe way to run this multiple times without causing errors.
    $conn->query("SELECT game_type FROM game_results LIMIT 1");
    echo "SUCCESS: The 'game_type' column already exists in the 'game_results' table. No action needed.";

} catch (PDOException $e) {
    // If the above query fails, it means the column does NOT exist. So we add it.
    try {
        $conn->exec("ALTER TABLE game_results ADD COLUMN game_type VARCHAR(50) NOT NULL DEFAULT 'jungle';");
        echo "SUCCESS: The 'game_type' column has been added to the 'game_results' table.";
    } catch (PDOException $e_add) {
        die("ERROR: Failed to add the column. " . $e_add->getMessage());
    }
}
?>
