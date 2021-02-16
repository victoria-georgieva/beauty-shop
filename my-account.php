<?php
// include config to connect to data and use our functions
require 'includes/config.php';

//make sure user is logged in, function will redirect user if not logged in
login_required();

// if (isset($_GET['product'])) {
//   $product_id = $_GET['product'];
//   $user_id = $_SESSION['auth_user']['id'];
//   purchase($conn, $user_id, $product_id);
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo DIR . 'assets/css/styles.css'; ?>" type="text/css">
  <!-- google font -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Моят акаунт | <?php echo SITETITLE; ?></title>
</head>

<body>
  <div class="header-wrapper">
    <div class="container">
      <header class="site-header">
        <a class="logo" href="<?php echo DIR; ?>"><?php echo SITETITLE; ?></a>
        <ul class="navigation">
          <li><a href="<?php echo DIR . '?logout'; ?>">Излез</a></li>
          <li><a href="<?php echo DIR . 'cart.php'; ?>"><i class="fa fa-shopping-cart"></a></i></li>
        </ul>
      </header>
    </div>
  </div>
  <main class="container">
    <?php messages() ?>
    <h1 class="page-title">Здравей <?php echo $_SESSION['auth_user']['name'] ?> Добре дошъл!</h1>
    <h2 class="section-title">Историята с твоите поръчки</h2>
    <?php
    $user_id = $_SESSION['auth_user']['id'];
    // displays user orders
    $query = "SELECT * FROM products
              RIGHT JOIN orders
              ON products.id = orders.product_id
              WHERE orders.user_id = '$user_id'";
    $sql = mysqli_query($conn, $query);
    $result = mysqli_num_rows($sql);
    if ($result > 0) {
      echo "<ul class='orders'>";
      while ($row = mysqli_fetch_object($sql)) :
         echo "<li class='product'>";
        echo "<div class='product-meta'>";
        echo "<p class='product-name'>" . $row->name . "</p>";
        echo "<p class='product-price'>" . $row->price . "лв.</p>";
        echo "</div>";
        echo "</li>";
      endwhile;
      echo "</ul>";
    } else {
      echo "<p>Все още нямаш направени поръчки!!<p>";
    }
    ?>
    <a class="primary-btn" href="<?php echo DIR; ?>">Продължи с пазаруването</a>
  </main>
  <footer class="site-footer">
    <p>&copy; <?php echo date('Y'); ?> Shop Beauty Products. All rights reserved.</p>
  </footer>
</body>

</html>