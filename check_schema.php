<?php
// FILE: check_schema.php
include 'db_connect.php';

echo "<h1>Table Structure: game_results</h1>";
echo "<table border='1' cellpadding='5' style='border-collapse: collapse;'>";
echo "<tr style='background-color: #f2f2f2;'><th>Column Name</th><th>Data Type</th></tr>";

try {
    // Query the standard PostgreSQL 'information_schema' to get column details
    $stmt = $conn->prepare("SELECT column_name, data_type 
                            FROM information_schema.columns 
                            WHERE table_name = 'game_results' 
                            ORDER BY ordinal_position");
    $stmt->execute();
    $columns = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($columns as $col) {
        // Highlight the new column we are looking for
        $style = ($col['column_name'] === 'game_type') ? 'background-color: yellow; font-weight: bold;' : '';
        
        echo "<tr style='$style'>";
        echo "<td>" . htmlspecialchars($col['column_name']) . "</td>";
        echo "<td>" . htmlspecialchars($col['data_type']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";

} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
