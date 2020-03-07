<?php


defined('_IN_APP_') or die('access denied ! '); //keep silent


define('DBHOST', 'localhost'); //host mysql
define('DBUSER', 'root'); //host mysql
define('DBPASS', ''); //host mysql
define('DBNAME', 'laundry_lsp'); //host mysql

// site configuration
define('SITE_URL', 'http://localhost:8080/laundry/'); //alamat localhost


// development workspace
// menampilkan seluruh error selama proses dev
ini_set('display_errors', true);
error_reporting(E_ALL);


//session configuration
session_name('LaundrySession');
session_set_cookie_params(3600 * 34 * 7, '/', '', false, true);
session_start();