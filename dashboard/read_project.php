<?php
$result = $connection->query("SELECT * FROM projects ORDER BY id DESC");
?>

<div class="table-container">
    <h2>All Projects</h2>
    <table class="projects-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo htmlspecialchars($row["title"]); ?></td>
                <td><?php echo htmlspecialchars($row["description"]); ?></td>
                <td><img src="../assets/images/<?php echo $row["image_url"]; ?>" alt="Project Image"></td>
                <td>
                    <a href="update_project.php?id=<?php echo $row["id"]; ?>" class="btn edit-btn">Edit</a>
                    <a href="delete_project.php?id=<?php echo $row["id"]; ?>" class="btn delete-btn" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
