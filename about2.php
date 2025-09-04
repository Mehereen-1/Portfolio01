<?php
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
      <img src="profile.jpg" alt="<?php echo $name; ?>" class="profile-pic">
      <h2><?php echo $name; ?></h2>
      <p><strong>Location:</strong> <?php echo $location; ?></p>
      <p><strong>Role:</strong> <?php echo $role; ?></p>
    </div>

    <div class="bio">
      <h1 class="hello">
        <span class="blue">H</span><span class="orange">e</span><span class="yellow">L</span><span class="pink">L</span><span class="purple">o</span> 👋
      </h1>
      <p>I’m Mehereen, a student at <strong><?php echo $school; ?></strong> studying Computer Science and Engineering.</p>
      <p>Growing up crafting DIY projects out of random miscellanea, from rubics cube to math puzzles, I’ve always enjoyed the sensation of problem solving. Curious about this world of creation, I found myself channeling my explorations to various other outlets—namely apparel & graphic design, photography, and teaching arts & crafts to youth.</p>
      <p>Then, I discovered product design in college—I found it to be an incredibly transformative avenue through which I could connect my creative interests with unique storytelling and innovative solution-making. By being intentional in the way I design, I aim to create in such a way that fosters accessibility, connection, and joyful human experiences for social good.</p>
    </div>
  </section>

  <section class="details">
    <div class="experience">
      <h2>💼 Experiences</h2>
      <ul>
        <li><span class="pink">Product Design Intern</span> @ Apple — <em>May – Aug 2025</em></li>
        <li><span class="blue">Contract Product Designer</span> @ Lenovo — <em>Jan – May 2025</em></li>
        <li><span class="orange">Contract Product Designer</span> @ SoFi — <em>Jan – May 2024</em></li>
        <li><span class="purple">Design Lead</span> @ Digital Tech & Innovation Engineering Team — <em>Feb 2024 – Present</em></li>
        <li><span class="yellow">UX Lead / Design Consultant</span> @ Design Consulting Cornell — <em>Sep 2023 – Present</em></li>
        <li><span class="green">UX & Game Design Intern</span> @ Ai-Learners — <em>May – Aug 2024</em></li>
        <li><span class="pink">UX Project Manager</span> @ AlgoLink — <em>Aug – Dec 2024</em></li>
        <li><span class="blue">Publicity Director</span> @ Cornell Chinese Students Association — <em>Aug 2024 – Present</em></li>
        <li><span class="orange">Arts & Crafts Teacher</span> @ NYC Dept. of Education & YMCA — <em>Jul 2021 – Aug 2024</em></li>
        <li><span class="green">Design & Marketing Director</span> @ Flushing Business Improvement District — <em>Jul 2022 – Aug 2024</em></li>
      </ul>
    </div>

    <div class="education">
      <h2>🎓 Education</h2>
      <p><strong><?php echo $degree; ?></strong> @ <span class="pink"><?php echo $school; ?></span></p>
      <p><?php echo $concentrations; ?> Concentrations</p>
      <p><?php echo $educationYears; ?></p>
    </div>

    <div class="skills">
      <h2>🛠 Toolkit</h2>
      <h3>Skills</h3>
      <ul>
        <li>UX/UI</li>
        <li>UX Research</li>
        <li>Wireframing</li>
        <li>Prototyping</li>
        <li>Design Systems</li>
        <li>Graphic Design</li>
        <li>Apparel Design</li>
      </ul>
      <h3>Tools</h3>
      <ul>
        <li>Figma, Sketch, Procreate</li>
        <li>Adobe Illustrator, InDesign, Photoshop, Lightroom, After Effects</li>
        <li>Framer</li>
        <li>HTML/CSS, JavaScript</li>
        <li>Python, Java, R</li>
      </ul>
    </div>
  </section>
</body>
</html>
