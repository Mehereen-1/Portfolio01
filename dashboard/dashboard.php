<?php
// session_start();
// if (!isset($_SESSION['author_id'])) {
//     header("Location: login.php");
//     exit;
// }

include('../includes/db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css"> <!-- main site style -->
  <link rel="stylesheet" href="../css/dashboard.css"> <!-- dashboard-only style -->
</head>
<body>
  <?php include '../includes/header.php'; ?>

  <div class="dashboard-container">
    <h1 class="dashboard-title">Author Dashboard</h1>

    <div class="dashboard-links">
      <div class="dashboard-card">
        <a href="add_project.php">Manage Your Projects</a>
        <p>Add, edit, or remove portfolio projects.</p>
      </div>

      <div class="dashboard-card">
        <a href="add_skill.php">Add a New Skill</a>
        <p>Showcase tools & skills you’ve mastered.</p>
      </div>

      <div class="dashboard-card">
        <a href="add_experience.php">Add Any Experience</a>
        <p>Highlight your professional experiences.</p>
      </div>

      <div class="dashboard-card">
        <a href="update_education.php">Update Your Education</a>
        <p>Keep your education details up-to-date.</p>
      </div>
    </div>
  </div>
</body>
</html>
