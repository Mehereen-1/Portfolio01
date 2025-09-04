<?php
include 'includes/db.php';

// Dynamic variables for content
$name = "Ayesha Mehereen";
$location = "Khulna, Bangladesh";
$pronouns = "she/her";
$role = "Student";
$school = "Khulna University of Engineering & Technology";
$degree = "BSC in Computer Science & Engineering";
$concentrations = "Problem Solving, Web Development";
$minor = "Business";
$educationYears = "August 2023 – May 2027";

// Fetch experiences
$experiences = $connection->query("SELECT * FROM experiences ORDER BY id DESC");

// Fetch education
$education = $connection->query("SELECT * FROM education ORDER BY id DESC");

// Fetch skills
$skills = $connection->query("SELECT * FROM skills ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About - <?php echo $name; ?></title>
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/about.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

  <section class="intro">
    <div class="id-card">
      <!-- <img src="profile.jpg" alt="<?php echo $name; ?>" class="profile-pic"> -->
      <h2><?php echo $name; ?></h2>
      <p><strong>Location:</strong> <?php echo $location; ?></p>
      <p><strong>Role:</strong> <?php echo $role; ?></p>
    </div>

    <div class="bio">
      <h1 class="hello">
        <span class="blue">H</span><span class="orange">e</span><span class="yellow">L</span><span class="pink">L</span><span class="purple">o</span> 👋
      </h1>
      <p>I’m Mehereen, a student at <strong><?php echo $school; ?></strong> studying Computer Science and Engineering.</p>
      <p>Growing up I always found crafting and DIY attractive. Alongside these, from rubics cube to word puzzles to math teasers I always found joy in the art of problem solving. I engaged in club activities from a young age. I was a part of Bangladesh Math Olympiad Team and as a child I took part in science fairs, language club and Olympiads very regularly.</p>
    </div>
  </section>

  <section class="details">
    <!-- Experiences -->
    <div class="experience">
      <h2>💼 Experiences</h2>
      <ul>
        <?php while($row = $experiences->fetch_assoc()): ?>
          <li>
            <span class="pink"><?php echo htmlspecialchars($row['exp_name']); ?></span> 
            @ <?php echo htmlspecialchars($row['company']); ?> — 
            <em><?php echo htmlspecialchars($row['time']); ?></em>
          </li>
        <?php endwhile; ?>
      </ul>
    </div>

    <!-- Education -->
    <div class="education">
      <h2>🎓 Education</h2>
      <?php while($row = $education->fetch_assoc()): ?>
        <p><strong><?php echo htmlspecialchars($row['degree']); ?></strong> 
           @ <span class="pink"><?php echo htmlspecialchars($row['institution']); ?></span></p>
        <p><?php echo htmlspecialchars($row['start_time']); ?> – <?php echo htmlspecialchars($row['end_time']); ?></p>
      <?php endwhile; ?>
    </div>

    <!-- Skills -->
    <div class="skills">
      <h2>🛠 Toolkit</h2>
      <h3>Skills</h3>
      <ul>
        <?php while($row = $skills->fetch_assoc()): ?>
          <li><?php echo htmlspecialchars($row['skill_name']); ?></li>
        <?php endwhile; ?>
      </ul>
    </div>
  </section>
  <?php include 'includes/footer.php'; ?>
</body>
</html>
