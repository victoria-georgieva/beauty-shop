<?php
// include config to connect to data and use our functions
require 'includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo DIR . 'assets/css/styles.css'; ?>" type="text/css">
  <!-- google font -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
  <title>Регистрация | <?php echo SITETITLE; ?></title>
</head>

<body>

  <div class="header-wrapper">
    <div class="container">
      <header class="site-header">
        <a class="logo" href="<?php echo DIR; ?>"><?php echo SITETITLE; ?></a>
        <ul class="navigation">
          <li><a href="<?php echo DIR . 'login.php'; ?>">Вход</a></li>
          <li><a href="<?php echo DIR . 'register.php'; ?>">Регистрация</a></li>
        </ul>
      </header>
    </div>
  </div>
  <main class="container">
    <?php
    if (isset($_POST['submit'])) {
      register($conn, $_POST['name'], $_POST['email'], $_POST['password']);
    }
    ?>
    <h1 class="page-title">Регистрация</h1>
    <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
      <div class="form-control">
        <label for="name">Име и фамилия</label>
        <input type="text" name="name">
      </div>
      <div class="form-control">
        <label for="email">Имейл</label>
        <input type="email" name="email">
      </div>
      <div class="form-control">
        <label for="password">Парола</label>
        <input type="password" name="password">
      </div>
      <input type="submit" name="submit" value="Регистрация" />
    </form>
    <div class="switch">
      <a href="<?php echo DIR; ?>login.php">Вече имаш акаунт? Влез.</a>
    </div>
  </main>
  <footer class="site-footer">
    <p>&copy; <?php echo date('Y'); ?> Shop Beauty Products. All rights reserved.</p>
  </footer>
</body>

</html>