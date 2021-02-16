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
      <h1>Поръчки</h1>
      <div class="admin-orders">
        <div class="grid-item">Име на продукта</div>
        <div class="grid-item">Име на купувач</div>
        <?php
        // list all orders
        $query = "SELECT
                    users.name AS user_name,
                    products.name AS product_name
                  FROM orders
                  INNER JOIN users
                    ON orders.user_id = users.id
                  INNER JOIN products
                    ON orders.product_id = products.id";
        $sql = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_object($sql)) :
          echo "<div class='grid-item'>" . $row->product_name . "</div>";
          echo "<div class='grid-item'>" . $row->user_name . "</div>";
        endwhile;
        ?>
        </tbody>
        </table>
      </div>
  </main>
</body>

</html>