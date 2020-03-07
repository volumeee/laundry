<?php

defined('_IN_APP_')  or die('access denied');
require 'layouts/header.php';
?>
<div class="content">
    <form action="<?php echo SITE_URL; ?>/pelanggan.php?action=new" method="POST">
        <!-- <?php if (isset($error)) : ?>
        <p>ERROR ! <?php echo $error; ?></p>
        <?php endif;  ?> -->
        <div class="input-block">
            <label for="username">Nama Pengguna</label>
            <input type="text" name="username" id="username" placeholder="type the username..." />
        </div>
        <div class="input-block">
            <label for="fullname">Nama Lengkap</label>
            <input type="text" name="fullname" id="fullname" placeholder="type the fullname..." />
        </div>
        <div class="input-block">
            <label for="email">Email Pengguna</label>
            <input type="email" name="email" id="email" placeholder="type the email..." />
        </div>
        <div class="input-block">
            <label for="phone">Nomor Pengguna</label>
            <input type="number" name="phone" id="phone" placeholder="type the phone..." />
        </div>
        <div class="input-block">
            <label for="gender">Jenis Kelamin</label>
            <select name="gender" id="gender">
                <option value="">-- Select Gender --</option>
                <option value="male">Laki-Laki
                <option value="female">Perempuan
            </select>
        </div>
        <div class="input-block">
            <label for="address">Alamat Pengguna</label>
            <input type="text" name="address" id="address" placeholder="type the address..." />
        </div>
        <div class="input-block">
            <label for="password">Password Pengguna</label>
            <input type="password" name="password" id="password" placeholder="type the password..." />
        </div>
        <div class="input-block">
            <label for="repassword">Ulangi password</label>
            <input type="password" name="repassword" id="repassword" placeholder="type the password again..." />
        </div>
        <div class="input-block">
            <button type="submit" name="new" value="new">Tambahkan</button>
        </div>
    </form>
</div>
<?php
require 'layouts/footer.php';
