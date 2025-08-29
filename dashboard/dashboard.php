<?php
// session_start();
// if (!isset($_SESSION['author_id'])) {
//     header("Location: login.php");
//     exit;
// }

include('../includes/db.php');
include('add_project.php');

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $title = $_POST['title'];
//     $description = $_POST['description'];

//     // Handle image upload
//     $target_dir = "../assets/images/";
//     $target_file = $target_dir . basename($_FILES["image"]["name"]);
//     move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

//     $sql = "INSERT INTO temp (title, description, image_url) VALUES (?, ?, ?)";
//     $stmt = $connection->prepare($sql);
//     $stmt->bind_param("sss", $title, $description, $_FILES["image"]["name"]);
//     $stmt->execute();
//     echo "<p>Project added!</p>";
//     mysqli_close($connection);
// }
?>

<h2>Add New Project</h2>
<form method="POST" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Title" required><br>
    <textarea name="description" placeholder="Description" required></textarea><br>
    <input type="file" name="image" required><br>
    <button type="submit">Add Project Ayesha</button>
</form>

<?php
$result = $connection->query("SELECT * FROM projects ORDER BY id DESC");
?>

<table border="1">
    <tr><th>Title</th><th>Description</th><th>Image</th><th>Actions</th></tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row["title"]; ?></td>
            <td><?php echo $row["description"]; ?></td>
            <td><img src="../assets/images/<?php echo $row["image_url"]; ?>" width="100"></td>
            <td>
                <a href="edit_project.php?id=<?php echo $row["id"]; ?>">Edit</a> | 
                <a href="delete_project.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>

