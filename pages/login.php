<?php
include_once '../controllers/UserController.php';
include_once '../constants/db_vars.php';
include_once '../models/User.php';
include_once '../services/UserService.php';
include_once '../pages/utils/utils.php';

// Check if the user is already logged in
if (isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
  echo "<script>console.log('User is logged in as: " . $user["username"] . "')</script>";
} else {
  echo "<script>console.log('User is not logged in')</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bloggle - Login</title>
  <?php
  include_once './utils/utils.php';
  import_css('../assets/css/main.css');
  ?>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: var(--color-primary);
      /* #22b7ca */
    }

    .login-container {
      font-family: var(--font-secondary);
      background-color: #fff;
      /* #3ddfdf */
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(6, 10, 235, 0.1);
      padding: 20px;
      width: 400px;
      text-align: center;
    }

    h2 {
      margin-bottom: 20px;
      /* font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; */
      font-family: var(--font-secondary);
      font-size: 30px;
    }

    input[type="text"],
    input[type="password"] {
      font-family: var(--font-secondary);
      width: calc(100% - 20px);
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 16px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      font-size: 16px;
      font-family: var(--font-secondary);
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

    .signup-link {
      margin-top: 15px;
      font-size: 14px;
    }
  </style>
</head>

<body>
  <div class="login-container">
    <h2>Welcome to Bloggle</h2>
    <form action="#" method="post">
      <input type="text" name="username" placeholder="Username" required>
      <br>
      <input type="password" name="password" placeholder="Password" required>
      <br>
      <?php
      if (isset($_GET['error']) && $_GET['error'] === 'invalid_credentials') {
        echo "<p class='error'>Invalid username or password</p>";
      } else if (isset($_GET['error']) && $_GET['error'] === 'user_does_not_exist') {
        echo "<p class='error'>User does not exist</p>";
      } else if (isset($_GET['error']) && $_GET['error'] === 'login_failed') {
        echo "<p class='error'>Login failed</p>";
      }
      ?>
      <br>
      <input type="submit" value="Login">
    </form>
    <div class="signup-link">Don't have an account? <a href="signup.php">Sign Up</a></div>
  </div>
</body>

<?php
include_once '../constants/db_vars.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  global $USER_DOES_NOT_EXIST, $INVALID_CREDENTIALS;

  $username = $_POST['username'];
  $password = $_POST['password'];

  $ret = loginUser($username, $password);
  $success_redirect = 'landing.php';
  if ($ret) {
    if ($ret === $USER_DOES_NOT_EXIST) {
      echo "<script>console.log('User does not exist.')</script>";
      echo "<script>window.location.href = 'login.php?error=user_does_not_exist';</script>";
    } else if ($ret === $INVALID_CREDENTIALS) {
      echo "<script>console.log('Login failed')</script>";
      echo "<script>window.location.href = 'login.php?error=invalid_credentials';</script>";
    } else {
      echo "<script>console.log('Login successful')</script>";
      echo "<script>window.location.href = '" . $success_redirect . "';</script>";
    }
  } else {
    echo "<script>console.log('Login failed')</script>";
    echo "<script>window.location.href = 'login.php?error=login_failed';</script>";
  }
}
?>

</html>