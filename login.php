<?php
// session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: dashboard/dashboard.php");
    exit;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $name = "ayesha";
    $pass = '12345';
    
    if ($username === $name && $password === $pass) {
        $_SESSION['loggedin'] = true;
        // header("Location: index.php");
        header("Location: dashboard/dashboard.php");
        exit;
    } else {
        $error = "Invalid password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<?php include 'includes/header.php'; ?>
    <div class="main-container">
  <div class="login-container">
    <h2>Login</h2>
    <form method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>
    <?php if(isset($error)) echo "<p class='error-message'>$error</p>"; ?>
  </div>
  </div>
</body>
</html>
