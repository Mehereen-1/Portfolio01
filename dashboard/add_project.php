<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Handle image upload
    $target_dir = "../assets/images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $sql = "INSERT INTO projects (title, description, image_url) VALUES (?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sss", $title, $description, $_FILES["image"]["name"]);
    $stmt->execute();
    echo "<p>Project added!</p>";
    header("Location: dashboard.php");
}
?>

<h2>Add New Project</h2>
<form method="POST" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Title" required><br>
    <textarea name="description" placeholder="Description" required></textarea><br>
    <input type="file" name="image" required><br>
    <button type="submit">Add Project here</button>
</form>