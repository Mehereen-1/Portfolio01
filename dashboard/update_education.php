<?php
include('../includes/db.php');

// ================= Add Education ==================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_education'])) {
    $degree = trim($_POST['degree']);
    $institution = trim($_POST['institution']);
    $start_time = trim($_POST['start_time']);
    $end_time = trim($_POST['end_time']);

    if (!empty($degree) && !empty($institution) && !empty($start_time) && !empty($end_time)) {
        $sql = "INSERT INTO education (degree, institution, start_time, end_time) VALUES (?, ?, ?, ?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ssss", $degree, $institution, $start_time, $end_time);

        if ($stmt->execute()) {
            header("Location: update_education.php");
            exit;
        } else {
            echo "Error adding education: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "All fields are required.";
    }
}

// ================= Delete Education ==================
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $sql = "DELETE FROM education WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $delete_id);

    if ($stmt->execute()) {
        header("Location: update_education.php");
        exit;
    } else {
        echo "Error deleting education: " . $stmt->error;
    }
    $stmt->close();
}
?>

<?php include '../includes/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Update Education</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
  <div class="form-container">
    <h2>Add New Education</h2>
    <form method="POST" class="education-form">
        <input type="text" name="degree" placeholder="Degree (e.g. B.Sc Computer Science)" required>
        <input type="text" name="institution" placeholder="Institution (e.g. Harvard University)" required>
        <input type="text" name="start_time" placeholder="Start Year (e.g. 2018)" required>
        <input type="text" name="end_time" placeholder="End Year (e.g. 2022)" required>
        <button type="submit" name="add_education" class="btn-submit">Add Education</button>
    </form>
  </div>

  <div class="list-container">
    <h3>Your Education</h3>
    <ul class="education-list">
    <?php
    $edu = $connection->query("SELECT * FROM education ORDER BY id DESC");
    while ($row = $edu->fetch_assoc()) {
        echo "<li>
                <span><strong>{$row['degree']}</strong> at {$row['institution']} ({$row['start_time']} - {$row['end_time']})</span>
                <a href='update_education.php?delete_id={$row['id']}' class='btn-delete' onclick=\"return confirm('Delete this education?')\">Delete</a>
              </li>";
    }
    ?>
    </ul>
  </div>
</body>
</html>
