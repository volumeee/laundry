<?php

// membuat konstanta
// untuk keamanan  file .php anda

define('_IN_APP_', 1);

// menyisipkan file connection
include 'connection.php';
include 'functions.php';

// user must authenticated
must_authenticated();
require 'views/view_home.php';

// echo password_hash('admin', PASSWORD_BCRYPT);