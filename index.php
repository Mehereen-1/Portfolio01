<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Portfolio</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Nunito:wght@400;700&family=Quicksand:wght@400;600&family=Fredoka+One&family=Patrick+Hand&display=swap" rel="stylesheet">

</head>

<?php
include('includes/db.php'); // Database connection

// Fetch the projects from the database
$sql = "SELECT * FROM projects"; // Fetch the first 6 projects
$result = mysqli_query($connection, $sql);
mysqli_close($connection);
//echo "Database disconnected successfully.";

if (!$result) {
    die("Error executing query: " . mysqli_error($connection));
}
?>

<body>
    <!-- header -->
    <?php include 'includes/header.php'; ?>

    <!-- Hero Section -->
    <section class="hero">
    <div class="hero-text">
        <h1>
            Aloe there, I'm <span class="highlight">Ayesha Mehereen.</span> <span class="emoji">⭐</span>
        </h1>
        <p>
            <span class="emoji">✺</span> A developer who thrives in collaborative and playful spaces. 
            <span class="emoji">✹</span> Building human-centric tools, a community of learners, and 
            a vibrant creative hub. 
            <span class="emoji">✷ ✸ ✦</span>
        </p>
    </div>
    </section>


    <!-- Featured Projects Section -->
    <section id="projects" class="projects">
    <?php
    if (mysqli_num_rows($result) > 0) {
        $i = 0;
        while ($project = mysqli_fetch_assoc($result)) {
            $title = htmlspecialchars($project['title']);
            $description = htmlspecialchars($project['description']);
            // $image_url = 'assets/images/' . htmlspecialchars($project['image_url']);
            $image_url = 'assets/images/project1.png';
    ?>
    <!-- Project Card -->
    <div class="project-card <?php echo $i === 0 ? 'active' : ''; ?>">
        <div class="project-content">
            <div class="project-image">
                <img src="<?php echo $image_url; ?>" alt="<?php echo $title; ?>">
            </div>
            <div class="project-text">
                <h2><?php echo $title; ?></h2>
                <p><?php echo $description; ?></p>
            </div>
        </div>
        <button class="next-btn">→</button>
    </div>
    <?php
            $i++;
        }
    } else {
        echo "<p>No projects found.</p>";
    }
    ?>
</section>



    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    <script src="js/script.js"></script>
    

</body>
</html>
