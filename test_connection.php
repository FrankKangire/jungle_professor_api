<?php
// Set the content type to plain text for clear error messages
header('Content-Type: text/plain');

echo "Attempting to connect to the database...\n\n";

// This will try to run your existing connection script.
// It uses the getenv() functions to read the secrets from Render.
include 'db_connect.php';

// If the script gets this far without dying, the connection was successful.
// The 'die()' function in db_connect.php will prevent this line from ever
// being reached if the connection fails.
echo "SUCCESS: Database connection was established successfully!";

// No need to close the connection, the script ends here.
?>
