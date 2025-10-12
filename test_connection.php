<?php
// FILE: test_connection.php

// Include the connection file FIRST, before any output
include 'db_connect.php';

// Set the content type to plain text for clear error messages
header('Content-Type: text/plain');

echo "Attempting to connect to the database...\n\n";

// If the script got this far, the include() was successful.
// The 'die()' function in db_connect.php would have stopped it if the connection failed.
echo "SUCCESS: Database connection was established successfully!";
?>
