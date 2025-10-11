<?php
// Set the content type to plain text for clear output
header('Content-Type: text/plain');

// Bring in our database connection details
include 'db_connect.php'; // This provides the $conn PDO object

echo "Running database setup script...\n\n";

try {
    // SQL command to create the 'users' table
    $sqlUsers = "CREATE TABLE users (
      id SERIAL PRIMARY KEY,
      username VARCHAR(50) NOT NULL UNIQUE,
      password VARCHAR(255) NOT NULL
    );";

    // Execute the command
    $conn->exec($sqlUsers);
    echo "SUCCESS: 'users' table created successfully.\n";

    // SQL command to create the 'game_results' table
    $sqlGameResults = "CREATE TABLE game_results (
      id SERIAL PRIMARY KEY,
      user_id INT NOT NULL,
      results_data JSON NOT NULL,
      created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
      CONSTRAINT fk_user
          FOREIGN KEY(user_id) 
          REFERENCES users(id)
          ON DELETE CASCADE
    );";
    
    // Execute the command
    $conn->exec($sqlGameResults);
    echo "SUCCESS: 'game_results' table created successfully.\n\n";
    
    echo "Database setup is complete!";

} catch (PDOException $e) {
    // If something goes wrong (like the tables already exist), show the error
    die("An error occurred: " . $e->getMessage());
}

// Close the connection
$conn = null;
?>
