
<?php
// include config to connect to data and use our functions
require 'includes/config.php';

//make sure user is logged in, function will redirect user if not logged in
login_required();

$product_id = false;
$method = false;
$user_id = $_SESSION['auth_user']['id'];

if (isset($_GET['product'])){
    $product_id = $_GET['product'];
}
if (isset($_GET['method'])){
    $method = $_GET['method'];
}
if ($product_id && $method == "add") {
    add_to_cart($product_id);
  }
else if ($product_id && $method=="remove") {
    remove_from_cart($product_id);
}
$products = get_cart_products($conn);
if ($products && $method == "order") {
    place_order($conn, $user_id, $products);
}
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

    <title>Моятa количка | <?php echo SITETITLE; ?></title>
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
        <h1 class="page-title">Моята количка</h1>
        <ul class='orders'>
        <?php foreach($products as $key => $value){?>
        <li class="product">
            <div class="product-meta">
                <p class="product-name"><?php echo $value['name'] ?></p><p class="product-price"><?php echo $value['price'] ?>лв.</p>
                <a class="purchase" href=<?php echo DIR . "cart.php?method=remove&product=" . $value['id'] ?>>Премахни от количка</a>
            </div>
        </li>
        <?php }
        if(!$products){
            echo "Няма добавени продукти в количката";
        }
        ?>
        </ul>
            <a class="primary-btn" href="<?php echo DIR; ?>">Продължи с пазаруването</a>
            <a class="primary-btn" href="<?php echo DIR . "cart.php?method=order"; ?>">Направи поръчка</a>

    </main>
    <footer class="site-footer">
        <p>&copy; <?php echo date('Y'); ?> Shop Beauty Products. All rights reserved.</p>
    </footer>
</body>

</html>