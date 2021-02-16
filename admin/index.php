<?php
// include config to connect to data and use our functions
require '../includes/config.php';

//make sure user is logged in, function will redirect user if not logged in
admin_required();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo DIR . 'assets/css/styles.css'; ?>" type="text/css">
  <!-- google font -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
  <title><?php echo SITETITLE; ?></title>
</head>

<body>
  <div class="header-wrapper">
    <div class="container">
      <header class="site-header">
        <a class="logo" href="<?php echo DIR; ?>"><?php echo SITETITLE; ?></a>
        <ul class="navigation">
          <li><a href="<?php echo DIR . '?logout'; ?>">Излез</a></li>
          <li><a href="<?php echo DIR; ?>">Посети сайта</a></li>
        </ul>
      </header>
    </div>
  </div>
  <main class="admin-content">
    <ul class="admin-navigation">
      <li><a href="<?php echo DIRADMIN . 'products.php'; ?>">Продукти</a></li>
      <li><a href="<?php echo DIRADMIN . 'orders.php'; ?>">Поръчки</a></li>
      <li><a href="<?php echo DIRADMIN . 'reviews.php'; ?>">Ревюта</a></li>
    </ul>
    <div class="admin-page">
      <h1>Здравей <?php echo $_SESSION['auth_user']['name'] ?> Добре дошъл!</h1>
    </div>
  </main>
</body>

</html>