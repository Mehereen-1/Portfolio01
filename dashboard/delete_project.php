<?php
// include DB connection
include("../includes/db.php"); 

if (!isset($_GET['id'])) {
    die("Project ID not provided.");
}

$id = intval($_GET['id']);

// 1. Fetch project first (to know the image file name)
$sql = "SELECT image_url FROM projects WHERE id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$project = $result->fetch_assoc();
$stmt->close();

if (!$project) {
    die("Project not found.");
}

// 2. Delete project from DB
$sql = "DELETE FROM projects WHERE id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

// 3. Optionally delete image file from server
$imagePath = "../assets/images/" . $project['image_url'];
if (file_exists($imagePath)) {
    unlink($imagePath);
}

// ✅ Redirect back to dashboard
header("Location: dashboard.php");
exit;
?>
