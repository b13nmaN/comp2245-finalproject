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
      <header>
        <p>Dolphin CRM</p>
      </header>
      <div class="form-container">
        <form action="includes/process-login.php" method="post" id="login">
          <h2>Login</h2>
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required />
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required />
          <button type="submit">Login</button>
        </form>
      </div>
      <footer>
        <p>&copy; 2023 Dolphin CRM. All rights reserved.</p>
      </footer>
        <script src="https://unpkg.com/feather-icons"></script>
        <script src="../assets/js/app.js"></script>
        <script>
          feather.replace();
        </script>
  </body>
</html>
