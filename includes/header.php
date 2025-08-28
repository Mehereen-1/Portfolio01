<?php
// includes/header.php
$current = basename($_SERVER['SCRIPT_NAME']); // e.g., index.php
function active($file, $current) { return $file === $current ? 'active' : ''; }
?>
<header class="site-header">
  <div class="container nav-wrap">
    <a href="index.php" class="brand">
      <!-- Optional logo -->
      <!-- <img src="assets/images/logo.png" alt="Logo"> -->
      <span>My Portfolio</span>
    </a>

    <!-- Hamburger -->
    <button class="hamburger" aria-label="Toggle menu" aria-expanded="false">
      <i class='bx bx-menu'></i>
    </button>

    <nav class="nav">
      <ul>
        <li><a class="nav-link <?=active('index.php',$current)?>" href="index.php">Home</a></li>
        <li><a class="nav-link <?=active('about.php',$current)?>" href="about.php">About</a></li>
        <li><a class="nav-link <?=active('projects.php',$current)?>" href="projects.php">Projects</a></li>
        <li><a class="nav-link <?=active('contact.php',$current)?>" href="contact.php">Contact</a></li>
        <li><a class="nav-link admin" href="admin/index.php">Admin</a></li>
      </ul>
    </nav>
  </div>
</header>
