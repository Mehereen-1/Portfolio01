<?php
include 'includes/db.php';
$sql = "SELECT * FROM projects ORDER BY id DESC"; // assuming table 'projects'
$result = $connection->query($sql);
$projects = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $projects[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/project.css">
    <!-- <style>
        .projects-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 50px 20px;
        }

        .project-card {
            margin-bottom: 50px;
            border: 1px solid #ccc;
            border-radius: 12px;
            overflow: hidden;
            padding: 20px;
            background-color: #f9f9f9;
            transition: transform 0.3s;
        }

        .project-card:hover {
            transform: translateY(-5px);
        }

        .project-title {
            text-align: center;
            font-size: 28px;
            margin-bottom: 15px;
        }

        .project-image img {
            display: block;
            margin: 0 auto;
            max-width: 100%;
            border-radius: 10px;
        }

        .project-overview {
            margin-top: 20px;
            line-height: 1.6;
        }

        .project-details {
            margin-top: 15px;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .project-details div {
            margin-bottom: 10px;
        }

        .project-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }

        .project-buttons button,
        .project-buttons a button {
            background-color: #2c6e49;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .project-buttons button:hover,
        .project-buttons a button:hover {
            background-color: #1e4d34;
            transform: translateY(-2px);
        }

        .extra-images {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 20px;
            justify-content: center;
        }

        .extra-images img {
            max-width: 300px;
            border-radius: 10px;
        }
    </style> -->
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="items-container">
        <h1 style="text-align:center; margin-bottom:50px;">All Projects</h1>

        <?php foreach ($projects as $project): ?>
        <div class="item-card" id="project-<?php echo $i; ?>">
            <h2 class="item-title"><?php echo $project['title']; ?></h2>

            <div class="item-image">
                <img src="./assets/images/<?php echo $project['image_url']; ?>" alt="<?php echo $project['title']; ?>">

            </div>

            <p class="item-overview"><?php echo $project['overview']; ?></p>

            <div class="item-details">
                <div><strong>Tools/Techs:</strong> <?php echo $project['tools_techs']; ?></div>
                <div><strong>Timeline:</strong> <?php echo $project['timeline']; ?></div>
            </div>

            <div class="item-buttons">
                <a href="<?php echo $project['github_link']; ?>" target="_blank">
                    <button>GitHub</button>
                </a>
            </div>

            <?php if(!empty($project['extra_images'])): ?>
            <div class="extra-images">
                <?php foreach ($project['extra_images'] as $img): ?>
                    <img src="<?php echo $img; ?>" alt="Extra image for <?php echo $project['title']; ?>">
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>

    </div>
</body>
</html>
