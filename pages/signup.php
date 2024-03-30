<?php
include_once '../controllers/UserController.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bloggle - Sign Up</title>
  <?php
  include_once './utils/utils.php';
  import_css('../assets/css/main.css');

  ?>
  <style>
    body {
      font-family: var(--font-secondary);
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: var(--color-primary);
    }

    .signup-container {
      background-color: #fff;
      /* #6ef0cf */
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 20px;
      width: 400px;
      text-align: center;
    }

    h2 {
      margin-bottom: 20px;
      font-size: 30px;
    }

    input[type="text"],
    input[type="password"],
    input[type="email"] {
      font-family: var(--font-secondary);
      font-size: 16px;
      width: calc(100% - 20px);
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      font-family: var(--font-secondary);
      font-size: 16px;
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>

<body>

  <?php
  // check if user is logged in
  if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    echo "<script>console.log('User is logged in as: " . $user['username'] . "')</script>";
  } else {
    echo "<script>console.log('User is not logged in')</script>";
  }
  ?>
  <div class="signup-container">
    <h2>Sign Up for Bloggle</h2>
    <form action="signup.php" method="post">
      <input type="text" name="username" placeholder="Username" required>
      <br>
      <input type="text" name="fullname" placeholder="Full Name" required>
      <br>
      <input type="password" name="password" placeholder="Password" required>
      <br>
      <input type="password" name="confirm_password" placeholder="Confirm Password" required>
      <br>
      <input type="email" name="email" placeholder="Email" required>
      <br>
      <input type="submit" value="Sign Up" style="margin-bottom: 10px;">
      <br>
      <?php
      if (isset($_GET['error']) && $_GET['error'] === 'username_exists')
        echo "<p class='error'>Username already exists</p>";
      else if (isset($_GET['error']) && $_GET['error'] === 'signup_failed')
        echo "<p class='error'>Signup failed</p>";
      else if (isset($_GET['error']) && $_GET['error'] === 'passwords_do_not_match')
        echo "<p class='error'>Passwords do not match</p>";
      else if (isset($_GET['error']) && $_GET['error'] === 'signup_successful')
        echo "<p>Signup successful</p>";
      ?>

      <br>
      <p>Already have an account? <a href="login.php">Login</a></p>
    </form>
  </div>

  <?php
  include_once '../database/db.php';
  include_once '../models/User.php';
  include_once '../constants/db_vars.php';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];


    if ($password !== $confirm_password) {
      echo "<script>window.location.href = 'signup.php?error=passwords_do_not_match';</script>";
      return;
    }

    $ret = registerUser($username, $password, $email, $fullname, null, null);
    if ($ret) {
      if ($ret === $USERNAME_EXISTS)
        echo "<script>window.location.href = 'signup.php?error=username_exists';</script>";
      else if ($ret === $USER_SAVED)
        echo "<script>window.location.href = 'signup.php?error=signup_successful';</script>";
      else
        echo "<script>window.location.href = 'signup.php?error=signup_failed';</script>";
    } else {
      echo "<script>window.location.href = 'signup.php?error=signup_failed';</script>";
    }
  }

  ?>
</body>

</html>