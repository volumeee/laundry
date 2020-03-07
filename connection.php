<?php

defined('_IN_APP_') or die('access denied');

//  menyisipkan file config 
require 'config.php';

if (!$db = mysqli_connect(
    DBHOST,
    DBUSER,
    DBPASS,
    DBNAME
)) {
    echo "koneksi gagal" . $db->connect_error;
    exit(1); //tidak meghasilkan apa-apa
}
