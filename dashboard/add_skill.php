<?php
include('../includes/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_skill'])) {
    $skill_name = trim($_POST['skill_name']);

    if (!empty($skill_name)) {
        $sql = "INSERT INTO skills (skill_name) VALUES (?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $skill_name);

        if ($stmt->execute()) {
            header("Location: add_skill.php");
            exit;
        } else {
            echo "Error adding skill: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Skill name cannot be empty.";
    }
}

if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $sql = "DELETE FROM skills WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $delete_id);

    if ($stmt->execute()) {
        header("Location: add_skill.php"); // refresh after delete
        exit;
    } else {
        echo "Error deleting skill: " . $stmt->error;
    }
    $stmt->close();
}
?>

<?php include '../includes/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Skill</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <div class="form-container">
    <h2>Add New Skill</h2>
    <form method="POST" class="skill-form">
        <input type="text" name="skill_name" placeholder="Enter Skill Name" required>
        <button type="submit" name="add_skill" class="btn-submit">Add Skill</button>
    </form>
  </div>

  <div class="list-container">
    <h3>Existing Skills</h3>
    <ul class="skill-list">
    <?php
    $skills = $connection->query("SELECT * FROM skills ORDER BY id DESC");
    while ($row = $skills->fetch_assoc()) {
        echo "<li>
                <span>{$row['skill_name']}</span>
                <a href='add_skill.php?delete_id={$row['id']}' class='btn-delete' onclick=\"return confirm('Delete this skill?')\">Delete</a>
                </li>";
    }
    ?>
    </ul>

  </div>
</body>
</html>
