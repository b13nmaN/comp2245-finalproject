<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Page</title>
  <link rel="stylesheet" href="assets/css/styles.css" />
</head>

<body>
  <form action="includes/process-login.php" method="post" id="login">
    <h2>Login</h2>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required />
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required />
    <button type="submit">Login</button>
  </form>
</body>

</html>
