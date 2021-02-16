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
    <?php
    // add new product
    if (isset($_POST['is_active'])){
      $is_active = true;
    }
    else{
      $is_active = false;
    }
    if (isset($_POST['submit'])) {
      create_product(
        $conn,
        $_POST['name'],
        $_POST['description'],
        $_POST['price'],
        $_POST['image'],
        $is_active
      );
    }
    ?>
    <ul class="admin-navigation">
      <li><a href="<?php echo DIRADMIN . 'products.php'; ?>">Продукти</a></li>
      <li><a href="<?php echo DIRADMIN . 'orders.php'; ?>">Поръчки</a></li>
      <li><a href="<?php echo DIRADMIN . 'reviews.php'; ?>">Ревюта</a></li>
    </ul>
    <div class="admin-page">
      <h1>Добави нов продукт</h1>
      <form method="post" enctype="multipart/form-data" action="<?= $_SERVER['PHP_SELF'] ?>">
        <div class="form-control">
          <label for="name">Име на продукта</label>
          <input type="text" name="name" value="">
        </div>
        <div class="form-control">
          <label for="description">Описание на продукта</label>
          <textarea name="description" cols="30" rows="10"></textarea>
        </div>
        <div class="form-control">
          <label for="price">Цена на продукта</label>
          <input type="number" name="price" value="">
        </div>
        <div class="form-control">
          <label for="image">Снимка на продукта</label>
          <input type="file" name="image">
        </div>
        <div class="form-control">
          <label for="is_active">Активност на продукта</label>
          <input type="checkbox" name="is_active">
        </div>
        <input type="submit" name="submit" value="ЗАПАЗИ" />
      </form>
    </div>
  </main>
</body>

</html>