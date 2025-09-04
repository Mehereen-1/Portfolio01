<?php
include('../includes/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $overview = $_POST['overview'];
    $github_link = $_POST['github_link'];
    $tools_techs = $_POST['tools_techs'];
    $timeline = $_POST['timeline'];

    // Handle image upload
    $target_dir = "../assets/images/";
    $image_name = basename($_FILES["image"]["name"]);
    $target_file = $target_dir . $image_name;
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    // Insert into database
    $sql = "INSERT INTO projects (title, description, overview, image_url, github_link, tools_techs, timeline) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sssssss", $title, $description, $overview, $image_name, $github_link, $tools_techs, $timeline);
    $stmt->execute();

    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Project</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
  <div class="form-container">
    <h2>Add New Project</h2>
    <form method="POST" enctype="multipart/form-data" class="project-form">
      <label>Title</label>
      <input type="text" name="title" placeholder="Project Title" required>

      <label>Description</label>
      <textarea name="description" placeholder="Short Description" required></textarea>

      <label>Overview</label>
      <textarea name="overview" placeholder="Detailed Overview" required></textarea>

      <label>GitHub Link</label>
      <input type="text" name="github_link" placeholder="https://github.com/...">

      <label>Tools & Techs</label>
      <input type="text" name="tools_techs" placeholder="React, Node.js, etc.">

      <label>Timeline</label>
      <input type="text" name="timeline" placeholder="Jan 2023 - Mar 2023">

      <label>Upload Image</label>
      <input type="file" name="image" required>

      <button type="submit" class="btn-submit">Add Project</button>
    </form>
  </div>

  <?php include('read_project.php'); ?>
</body>
</html>
