<?php
// membuat konstanta 
// untuk keamanan file php anda
define('_IN_APP_', 1);

//menyisipkan file connection php
include 'connection.php';
include 'functions.php';

must_authenticated();

session_destroy(); // kill session

// header('location' . SITE_URL . '/login.php');

// menampilkan view
// require 'views/view_logout.php';
require_once 'views/view_login.php';