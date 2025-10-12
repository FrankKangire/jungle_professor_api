<?php
include 'db_connect.php';
try {
    $conn->exec("ALTER TABLE users ADD COLUMN created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;");
    echo "SUCCESS: 'users' table updated successfully with created_at column.";
} catch (PDOException $e) {
    die("An error occurred: " . $e->getMessage());
}
?>
