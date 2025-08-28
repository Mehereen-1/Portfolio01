<?php
    $connection = mysqli_connect('localhost:3306', 'root', '', 'temp_projects');
    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }
    echo "Database connected successfully.";
    // mysqli_close($connection);
?>