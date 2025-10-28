<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}
$username = $_SESSION['username'];
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Welcome</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="welcome-box">
    <h2>🌸 Welcome, <?php echo $username; ?>!</h2>
    <div class="info">
      <p><strong>👤 Username:</strong> <?php echo $username; ?></p>
      <p><strong>📧 Email:</strong> <?php echo $email; ?></p>
      <p><strong>🕒 Login Time:</strong> <?php echo date("d M Y, h:i A"); ?></p>
    </div>
    <form method="post" action="logout.php">
      <button type="submit" name="logout">Logout</button>
    </form>
  </div>
</body>
</html>
