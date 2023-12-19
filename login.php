<?php
include 'includes/helpers.php';
include 'config/config.php';
include 'includes/process-login.php';

if(isset($_SESSION['user'])) {
  header("Location: /comp2245-finalproject/index.php/home");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Page</title>
  <link rel="stylesheet" href="assets/css/styles.css" />
  <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
  <header id="logo-wrapper">
    <img src="assets/images/dolphin.svg" alt="dolphin_logo">
    <p>Dolphin CRM</p>
  </header>
  <div class="form-container">
    <form action="includes/process-login.php" method="post" id="login">
      <h2>Login</h2>
      <input type="email" id="email" name="email" placeholder="Email"  />
      <?php if (isset($errors['email'])):?>
        <p class="error"><?=$errors['email']?> </p>
      <?php endif;?>
      <input type="password" id="password" name="password" placeholder="Password"  />
      <?php if (isset($errors['password'])):?>
        <p class="error"><?=$errors['password']?> </p>
      <?php endif;?>
      <button type="submit">Login</button>
    </form>
  </div>
  <footer>
    <p>&copy; 2023 Dolphin CRM. All rights reserved.</p>
  </footer>
  <script src="https://unpkg.com/feather-icons"></script>
  <script src="assets/js/app.js"></script>
  <script>
    feather.replace();
  </script>
</body>
</html>
