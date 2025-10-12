<?php
// FILE: view_users.php

// This connects to the database and provides the $conn object
include 'db_connect.php';

echo "<h1>Users Table Contents</h1>";

try {
    // Prepare a simple SELECT statement
    $stmt = $conn->prepare("SELECT id, username, created_at FROM users ORDER BY id ASC");
    $stmt->execute();

    // Fetch all rows from the result
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($users) > 0) {
        echo "<table border='1' cellpadding='5' cellspacing='0' style='border-collapse: collapse; font-family: sans-serif;'>";
        echo "<tr style='background-color: #f2f2f2;'><th>ID</th><th>Username</th><th>Created At</th></tr>";
        
        // Loop through each user and print their data in a table row
        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($user['id']) . "</td>";
            echo "<td>" . htmlspecialchars($user['username']) . "</td>";
            echo "<td>" . htmlspecialchars($user['created_at']) . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "<p>The 'users' table is currently empty.</p>";
    }

} catch (PDOException $e) {
    die("An error occurred: " . $e->getMessage());
}
?>
