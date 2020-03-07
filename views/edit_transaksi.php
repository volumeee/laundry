<?php

defined('_IN_APP_')  or die('access denied');
require 'layouts/header.php';
?>
<div class="content">
    <form action="<?php echo SITE_URL; ?>/transaksi.php?action=edit&id=<?php echo $_GET['id'] ?>" method="POST">
        <!-- <?php if (isset($error)) : ?>
        <p>ERROR ! <?php echo $error; ?></p>
        <?php endif;  ?> -->
        <div class="input-block">
            <label for="customer">Nama Pelanggan</label>
            <select name="customer" id="customer">
                <option value="">-- Select Pelanggan --</option>
                <?php foreach ($users as $user) { ?>
                <option value="<?php echo $user['id_user'] ?>"
                    <?php echo $user['id_user'] == $transaction['id_user'] ? 'selected' : '' ?>>
                    <?php echo $user['fullname'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="input-block">
            <label for="keterangan">Keterangan</label>
            <input type="text" name="keterangan" id="keterangan" placeholder="type the description..."
                value="<?php echo $transaction['keterangan'] ?>" />
        </div>
        <div class="input-block">
            <button type="submit" name="edit" value="edit">Ubah</button>
        </div>
    </form>
</div>
<?php
require 'layouts/footer.php';