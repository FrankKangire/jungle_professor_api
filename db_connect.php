<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Read credentials from Environment Variables
$host = getenv('DB_HOST');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');
$db = getenv('DB_NAME');
$port = "5432"; // Default PostgreSQL port

// --- FIX: Use PDO for a PostgreSQL connection ---
// Create a Data Source Name (DSN) string
$dsn = "pgsql:host=$host;port=$port;dbname=$db";

try {
    // Create a new PDO instance
    $conn = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    // If the connection fails, stop the script and show the error.
    die("Connection failed: " . $e->getMessage());
}
?>