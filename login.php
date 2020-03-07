<?php


// membuat konstanta
// untuk keamanan  file .php anda

define('_IN_APP_', 1);

// echo password_hash('admin', PASSWORD_BCRYPT);

// menyisipkan file connection
include 'connection.php';
include 'functions.php';


// must_authenticated();
if (isset($_POST['login'])) {
    # cod
    $username = $_POST['username'];
    $plain_pass = $_POST['password'];

    $sql = "SELECT * FROM `users` WHERE `username` = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result(); //fetch password
    $user = $result->fetch_object();


    if ($result->num_rows <= 0) {
        $error = "Username salah";
    } else if (!password_verify($plain_pass, $user->password)) {
        $error = "password salah";
    } else {
        // succes condition
        // make session
        //redirect homepage
        $_SESSION['is_login'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $user->role;
        $_SESSION['id_user'] = $user->id_user;
        header('location: ' . SITE_URL);
        exit(0);
    }
}



// menampilkan view
require_once 'views/view_login.php';