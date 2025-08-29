<?php
// includes/header.php
$current = basename($_SERVER['SCRIPT_NAME']); // e.g., index.php
function active($file, $current) { return $file === $current ? 'active' : ''; }
?>
<!-- Navbar -->
    <header class="navbar" id = "navbar">
        <div class="logo">
            <img src="assets/images/logo.png" alt="Logo">
        </div>

         <!-- Hamburger Icon for mobile -->
        <div class="hamburger" id="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>

        <nav>
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="#projects">PROJECTS</a></li>
                <li><a href="about.php">ABOUT</a></li>
                <li><a href="#contact">CONTACT</a></li>
                <li><a href='login.php'>LOGIN</a></li>
            </ul>
        </nav>
        <div class="social-icons">
            <a href="#"><i class="fab fa-github"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
        </div>
    </header>
