<!-- <?php include('includes/db.php'); ?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>
    <link rel="stylesheet" href="./css/style.css">

    <!-- boxicon link -->
     <link rel="stylesheet"
        href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!-- google font link link -->
     <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Nunito:wght@400;700&family=Quicksand:wght@400;600&family=Fredoka+One&family=Patrick+Hand&display=swap" rel="stylesheet">

</head>
<body>
    <?php include('includes/db.php'); ?>
     <?php include('includes/header.php'); 
     $sql = "SELECT * FROM temp LIMIT 6"; // Limit to show only 6 projects
        $result = mysqli_query($connection, $sql);
     ?>
     

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Welcome to My Portfolio</h1>
            <p>Discover my creative journey and the projects I've worked on.</p>
            <a href="projects.php" class="btn">View Projects</a>
        </div>
    </section>

    <!-- Featured Projects Section -->
    <section class="projects">
        <div class="container">
            <h2>Featured Projects</h2>
            <div class="project-grid">
                <?php
                // Check if there are any projects
                if (mysqli_num_rows($result) > 0) {
                    // Loop through each project and create a card
                    while ($project = mysqli_fetch_assoc($result)) {
                        // Get the project details
                        $title = htmlspecialchars($project['title']);
                        $description = htmlspecialchars($project['description']);
                        $image_url = 'assets/images/' . htmlspecialchars($project['image_url']);
                        $project_link = 'project.php?id=' . $project['id']; // Assuming you have a project page
                ?>
                    <!-- Project Card -->
                    <div class="project-card">
                        <a href="<?php echo $project_link; ?>" class="project-thumb">
                            <img src="<?php echo $image_url; ?>" alt="<?php echo $title; ?>">
                        </a>
                        <div class="project-body">
                            <h3 class="project-title"><?php echo $title; ?></h3>
                            <p class="project-desc"><?php echo mb_strimwidth($description, 0, 140, '...'); ?></p>
                            <div class="project-actions">
                                <a class="btn btn-primary" href="<?php echo $project_link; ?>">View Project</a>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                } else {
                    echo "<p>No projects found.</p>";
                }
                ?>
            </div>
        </div>
    </section>

    <footer>
        <p>© 2025 My Portfolio | All Rights Reserved</p>
    </footer>

    <script src="assets/js/script.js"></script>
</body>
</html>
