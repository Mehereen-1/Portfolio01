<?php
// session_start();
// if (!isset($_SESSION['author_id'])) {
//     header("Location: login.php");
//     exit;
// }

include('../includes/db.php');
include('add_project.php');
?>

<h1>>Existing Projects</h1>
<?php include 'read_project.php'; ?>






