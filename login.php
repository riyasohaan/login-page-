<?php
session_start();
$conn = new mysqli("localhost", "root", "", "system_login");

if ($conn->connect_error) {
  die("Database Connection Failed: " . $conn->connect_error);
}

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = "SELECT * FROM users WHERE email='$email'";
  $result = $conn->query($query);

  if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
      $_SESSION['username'] = $user['username'];
      $_SESSION['email'] = $user['email'];
      header("Location: welcome.php");
      exit();
    } else {
      echo "<script>alert('Incorrect Password ❌');</script>";
    }
  } else {
    echo "<script>alert('User not found');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>💫 Login Here</h2>
    <form method="POST">
      <input type="email" name="email" placeholder="Enter Email" required><br>
      <input type="password" name="password" placeholder="Enter Password" required><br>
      <button type="submit" name="login">Login</button>
    </form>
    <p>Don't have an account? <a href="register.php">Register</a></p>
  </div>
</body>
</html>
