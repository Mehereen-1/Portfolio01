<?php
include('../includes/db.php');

// ================= Add Experience ==================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_experience'])) {
    $exp_name = trim($_POST['exp_name']);
    $company = trim($_POST['company']);
    $time = trim($_POST['time']); // fixed name

    if (!empty($exp_name) && !empty($company) && !empty($time)) {
        $sql = "INSERT INTO experiences (exp_name, company, time) VALUES (?, ?, ?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("sss", $exp_name, $company, $time);

        if ($stmt->execute()) {
            header("Location: add_experience.php");
            exit;
        } else {
            echo "Error adding experience: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "All fields are required.";
    }
}

// ================= Delete Experience ==================
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $sql = "DELETE FROM experiences WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $delete_id);

    if ($stmt->execute()) {
        header("Location: add_experience.php"); // refresh after delete
        exit;
    } else {
        echo "Error deleting experience: " . $stmt->error;
    }
    $stmt->close();
}
?>

<?php include '../includes/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Experience</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
  <div class="dash-container">
    <h2>Add New Experience</h2>
    <form method="POST" class="experience-form">
        <input type="text" name="exp_name" placeholder="Enter Your Experience" required>
        <input type="text" name="company" placeholder="Company" required>
        <input type="text" name="time" placeholder="Duration" required>
        <button type="submit" name="add_experience" class="btn-submit">Add Experience</button>
    </form>
  </div>

  <div class="list-container">
    <h3>Your Experiences</h3>
    <ul class="skill-list">
    <?php
    $exp = $connection->query("SELECT * FROM experiences ORDER BY id DESC");
    while ($row = $exp->fetch_assoc()) {
        echo "<li>
                <span><strong>{$row['exp_name']}</strong> at {$row['company']} ({$row['time']})</span>
                <a href='add_experience.php?delete_id={$row['id']}' class='btn-delete' onclick=\"return confirm('Delete this experience?')\">Delete</a>
              </li>";
    }
    ?>
    </ul>
  </div>
</body>
</html>
