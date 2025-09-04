<?php
include('../includes/db.php');
if (!isset($_GET['id'])) {
    die("Project ID not provided.");
}

$id = intval($_GET['id']);

// Step 1: Fetch project
$sql = "SELECT * FROM projects WHERE id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$project = $result->fetch_assoc();

if (!$project) {
    die("Project not found.");
}
$stmt->close();

// Step 2: Handle update form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $overview = $_POST['overview'];
    $github_link = $_POST['github_link'];
    $timeline = $_POST['timeline'];

    $image_url = $project['image_url']; // keep old image by default

    // If a new image is uploaded
    if (!empty($_FILES['image']['name'])) {
        $image_url = $_FILES['image']['name'];
        $target = "../assets/images/" . basename($image_url);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
    }

    $sql = "UPDATE projects 
            SET title = ?, description = ?, overview = ?, image_url = ?, github_link = ?, timeline = ?
            WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssssssi", $title, $description, $overview, $image_url, $github_link, $timeline, $id);
    $stmt->execute();
    $stmt->close();

    // ✅ Redirect to dashboard
    header("Location: dashboard.php");
    exit;
}
?>

<?php include '../includes/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <div class="form-container">
    <h2>Edit Project</h2>
    <form method="POST" enctype="multipart/form-data" class="project-form">

      <label>Title</label>
      <input type="text" name="title" value="<?php echo htmlspecialchars($project['title']); ?>" required>

      <label>Description</label>
      <textarea name="description" required><?php echo htmlspecialchars($project['description']); ?></textarea>

      <label>Overview</label>
      <textarea name="overview" placeholder="Overview"><?php echo htmlspecialchars($project['overview']); ?></textarea>

      <label>GitHub Link</label>
      <input type="text" name="github_link" value="<?php echo htmlspecialchars($project['github_link']); ?>">

      <label>Timeline</label>
      <input type="text" name="timeline" value="<?php echo htmlspecialchars($project['timeline']); ?>">

      <p><strong>Current Image:</strong></p>
      <img src="../assets/images/<?php echo htmlspecialchars($project['image_url']); ?>" alt="Project Image" style="width:150px; border-radius:8px; margin-bottom:15px;">

      <label>Upload New Image</label>
      <input type="file" name="image">

      <button type="submit" class="btn-submit">Update Project</button>
    </form>
  </div>
</body>
</html>
