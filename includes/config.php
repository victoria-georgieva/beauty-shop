<?php

ob_start();
session_start();

// db properties
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'simple-shop');

// make a connection to mysql here
$conn = mysqli_connect(DBHOST, DBUSER, DBPASS);
$db = mysqli_select_db($conn, DBNAME);
if (!$db) {
  die("Sorry! There seems to be a problem connecting to our database.");
}

// define site path
define('DIR', 'http://localhost/simple-shop/');

// define admin site path
define('DIRADMIN', 'http://localhost/simple-shop/admin/');

// define site title for top of the browser
define('SITETITLE', 'Shop Beauty Products');

//define include checker
define('included', 1);

include 'functions.php';
