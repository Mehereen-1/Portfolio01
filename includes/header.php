<?php
session_start();
$base_url = "/Portfolio/"; // adjust to your XAMPP folder
?>
<header class="navbar" id  ="navbar">
  <div class="logo">
    <a href="<?php echo $base_url; ?>index.php"><img src="<?php echo $base_url; ?>images/logo.png" alt="Logo"></a>
  </div>

  <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
    <!-- Show this UL when logged in -->
    <ul class="nav-links">
      <li><a href="<?php echo $base_url; ?>index.php">Home</a></li>
      <li><a href="<?php echo $base_url; ?>about2.php">About</a></li>
      <li><a href="<?php echo $base_url; ?>projects.php">Projects</a></li>
      <li><a href="<?php echo $base_url; ?>contact.php">Contact</a></li>
      <li><a href="<?php echo $base_url; ?>dashboard/dashboard.php">Dashboard</a></li>
      <li><a href="<?php echo $base_url; ?>logout.php">Logout</a></li>
    </ul>
  <?php else: ?>
    <!-- Show this UL when logged out -->
    <ul class="nav-links">
      <li><a href="<?php echo $base_url; ?>index.php">Home</a></li>
      <li><a href="<?php echo $base_url; ?>about.php">About</a></li>
      <li><a href="<?php echo $base_url; ?>projects.php">Projects</a></li>
      <li><a href="<?php echo $base_url; ?>contact.php">Contact</a></li>
      <li><a href="<?php echo $base_url; ?>login.php">Login</a></li>
    </ul>
  <?php endif; ?>
</header>
