<?php
    $connection = mysqli_connect('localhost:3306', 'root', '', 'portfolio');
    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }
    //echo "Database connected successfully.";
    // mysqli_close($connection);
?>