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
                <a href="update_project.php?id=<?php echo $row["id"]; ?>">Edit</a> | 
                <a href="delete_project.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>