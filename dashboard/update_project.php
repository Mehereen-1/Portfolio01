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

<!-- Step 3: Show update form -->
<h1>Edit Project</h1>
<form method="POST" enctype="multipart/form-data">
    <input type="text" name="title" value="<?php echo htmlspecialchars($project['title']); ?>" required><br>
    <textarea name="description" required><?php echo htmlspecialchars($project['description']); ?></textarea><br>
    <textarea name="overview" placeholder="Overview"><?php echo htmlspecialchars($project['overview']); ?></textarea><br>
    <input type="text" name="github_link" placeholder="GitHub Link" value="<?php echo htmlspecialchars($project['github_link']); ?>"><br>
    <input type="date" name="timeline" value="<?php echo htmlspecialchars($project['timeline']); ?>"><br>
    
    <p>Current Image: <?php echo $project['image_url']; ?></p>
    <input type="file" name="image"><br>
    
    <button type="submit">Update Project</button>
</form>
