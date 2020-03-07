<?php


// membuat konstanta
// untuk keamanan  file .php anda

define('_IN_APP_', 1);

// menyisipkan file connection
include 'connection.php';
include 'functions.php';


must_authenticated();

if (!have_access('manage_customer')) {
    header('location:' . SITE_URL);
}

switch (isset($_GET['action']) ? $_GET['action'] : null) {
    case 'new':
        if (isset($_POST['new'])) {
            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $gender = $_POST['gender'];
            $address = $_POST['address'];

            $password = $_POST['password'];
            $repassword = $_POST['repassword'];

            if ($password !== $repassword) {
                // $error = 'password tidak sama';
                echo "<script>
                        alert('password tidak sama')
                        document.location.href = 'pelanggan.php?action=new';
                    </script>";
                return false;
            } else {
                $stmt = $db->prepare("INSERT INTO `users` SET `username` = ?, `fullname` = ?,  `email` = ?,  `phone` = ?, `gender` = ?,  `address` = ?, `password` = ?");
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                $stmt->bind_param('sssssss', $username, $fullname, $email, $phone, $gender, $address, $hashed_password);
                if ($stmt->execute()) {
                    header('location:' . SITE_URL . 'pelanggan.php?status=success-created-cust');
                    exit(0);
                }
            }
            exit;
        }

        require 'views/new_pelanggan.php';
        break;
    case 'edit':
        if (isset($_POST['edit'])) {
            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $gender = $_POST['gender'];
            $address = $_POST['address'];
            $password = $_POST['password'];
            $repassword = $_POST['repassword'];

            if ($password !== $repassword) {
                $error = 'kata sandi harus sama';
            } else {
                $stmt = $db->prepare("UPDATE `users` SET `username` = ?, `fullname` = ?,  `email` = ?,  `phone` = ?, `gender` = ?,  `address` = ?, WHERE `id_user` = ? ");
                $id = $_GET['id'];
                $stmt->bind_param('sssssss', $username, $fullname, $email, $phone, $gender, $address, $id);
                if ($stmt->execute()) {
                    header('location:' . SITE_URL . '/pelanggan.php?status=success-edited-cust');
                    exit(0);
                }
                // todo create feature update password
            }
        }

        $id_user = $_GET['id'];
        $stmt = $db->prepare("SELECT * FROM `users` WHERE `role`='pelanggan' AND `id_user` = ? ORDER BY `id_user` ASC");
        $stmt->bind_param('s', $id_user);
        $stmt->execute();
        $result = $stmt->get_result();
        $customer = $result->fetch_assoc();
        require 'views/edit_pelanggan.php';
        break;
    case 'delete';
        $id = $_GET['id'];
        $stmt = $db->prepare("DELETE FROM `users` WHERE `id_user` = ?");
        $stmt->bind_param('s', $id);
        $stmt->execute();
        header('location: ' . SITE_URL . '/pelanggan.php?status=succes-deleted-cust');
        exit(1);
        break;
    default:
        switch (isset($_GET['status']) ? $_GET['status'] : null) {
            case 'success-edited-cust':
                $success = 'Customer telah diubah';
                break;
            case 'success-created-cust':
                $success = 'Customer telah ditambahkan';
                break;
            case 'success-deleted-cust':
                $success = 'Customer telah dihapus';
                break;
            default:
        }
        $result = $db->query("SELECT * FROM `users` WHERE `role` = 'pelanggan' ORDER BY `id_user` ASC");
        $customer = $result->fetch_all(MYSQLI_ASSOC);
        require 'views/view_pelanggan.php';
}