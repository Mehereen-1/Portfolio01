<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();  // ✅ starts only if not already started
}
$base_url = "/Portfolio/"; // adjust to your XAMPP folder
?>
<header class="navbar" id="navbar">
  <h1 class="logo"><a href="<?php echo $base_url; ?>index.php">Mehereen</a></h1>

  <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
    <ul class="nav-links">
      <li><a href="<?php echo $base_url; ?>index.php">Home</a></li>
      <li><a href="<?php echo $base_url; ?>about2.php">About</a></li>
      <li><a href="<?php echo $base_url; ?>projects.php">Projects</a></li>
      <li><a href="<?php echo $base_url; ?>contact.php">Contact</a></li>
      <li><a href="<?php echo $base_url; ?>dashboard/dashboard.php">Dashboard</a></li>
      <li><a href="<?php echo $base_url; ?>logout.php">Logout</a></li>
    </ul>
  <?php else: ?>
    <ul class="nav-links">
      <li><a href="<?php echo $base_url; ?>index.php">Home</a></li>
      <li><a href="<?php echo $base_url; ?>about2.php">About</a></li>
      <li><a href="<?php echo $base_url; ?>projects.php">Projects</a></li>
      <li><a href="<?php echo $base_url; ?>contact.php">Contact</a></li>
      <li><a href="<?php echo $base_url; ?>login.php">Login</a></li>
    </ul>
  <?php endif; ?>
  <div class="social-icons">
            <a href="https://github.com/Mehereen-1"><i class="fab fa-github"></i></a>
            <a href="https://www.linkedin.com/in/ayesha-mehereen-a5a655253/"><i class="fab fa-linkedin"></i></a>
        </div>

</header>
