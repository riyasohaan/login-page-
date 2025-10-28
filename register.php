<?php
session_start();
$conn = new mysqli("localhost", "root", "", "system_login");

if ($conn->connect_error) {
  die("Database Connection Failed: " . $conn->connect_error);
}

if (isset($_POST['register'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $query = "INSERT INTO users (username, email, password) VALUES ('$username','$email','$password')";
  if ($conn->query($query)) {
    echo "<script>alert('🌸 Welcome $username! Registered Successfully'); window.location='login.php';</script>";
  } else {
    echo "<script>alert('Registration Failed');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>🌷 Create Account</h2>
    <form method="POST">
      <input type="text" name="username" placeholder="Enter Username" required><br>
      <input type="email" name="email" placeholder="Enter Email" required><br>
      <input type="password" name="password" placeholder="Enter Password" required><br>
      <button type="submit" name="register">Register</button>
    </form>
    <p>Already have an account? <a href="login.php">Login</a></p>
  </div>
</body>
</html>
