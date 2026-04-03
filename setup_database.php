<?php
require_once 'includes/db.php';

try {
    // 1. Read the schema file
    $schemaFile = __DIR__ . '/database/schema.sql';
    if (!file_exists($schemaFile)) {
        die("Error: database/schema.sql file not found.");
    }
    
    $sql = file_get_contents($schemaFile);
    
    // 2. Execute the SQL queries
    $pdo->exec($sql);
    
    echo "<h1>✅ Database Setup Complete!</h1>";
    echo "<p>All tables have been successfully created in your Aiven MySQL database.</p>";
    echo "<p>You can now use your application.</p>";
    echo "<p style='color:red'><strong>Security Warning:</strong> Please delete this file (setup_database.php) from your server now.</p>";
    
} catch (PDOException $e) {
    echo "<h1>❌ Database Setup Failed</h1>";
    echo "<p>Error details: " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p>Make sure you added the DB_HOST, DB_USER, DB_PASS, DB_NAME, and DB_PORT correctly in Render.</p>";
}
?>