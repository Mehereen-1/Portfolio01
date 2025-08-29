<?php
session_start();
// include 'db.php'; // connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $name = "ayesha";
    $pass = '12345';
    
    if ($username === $name && $password === $pass) {
        header("Location: dashboard/dashboard.php");
        exit;
    } else {
        $error = "Invalid password!";
    }
}
?>
<form method="POST">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
</form>
<?php if(isset($error)) echo "<p>$error</p>"; ?>
