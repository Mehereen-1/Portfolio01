<?php
// include database connection
include 'includes/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>About Me</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- header -->
  <?php include 'includes/header.php'; ?>

  <h1>About Me</h1>

  <!-- Experiences -->
  <h2>Experiences</h2>
  <?php
    $sql = "SELECT exp_name, company, time FROM experiences";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p><strong>" . htmlspecialchars($row['exp_name']) . "</strong> at " . 
                 htmlspecialchars($row['company']) . " (" . 
                 htmlspecialchars($row['time']) . ")</p>";
        }
    } else {
        echo "<p>No experiences added yet.</p>";
    }
  ?>

  <!-- Skills -->
  <h2>Skills</h2>
  <ul>
  <?php
    $sql = "SELECT skill_name FROM skills";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . htmlspecialchars($row['skill_name']) . "</li>";
        }
    } else {
        echo "<p>No skills added yet.</p>";
    }
  ?>
  </ul>

  <!-- Education -->
  <h2>Education</h2>
  <?php
    $sql = "SELECT degree, institution, start_time, end_time FROM education";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p><strong>" . htmlspecialchars($row['degree']) . "</strong> at " . 
                 htmlspecialchars($row['institution']) . " (" . 
                 htmlspecialchars($row['start_time']) . " - " . 
                 htmlspecialchars($row['end_time']) . ")</p>";
        }
    } else {
        echo "<p>No education details added yet.</p>";
    }
  ?>

  <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

</body>
</html>
