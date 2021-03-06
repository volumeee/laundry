<?php

defined('_IN_APP_')  or die('access denied');
require 'layouts/header.php';
?>
<div class="content">
    <form action="" method="POST">
        <!-- <?php if (isset($error)) : ?>
        <p>ERROR ! <?php echo $error; ?></p>
        <?php endif;  ?> -->
        <div class="input-block">
            <label for="nama">Nama Barang</label>
            <input type="text" name="nama" id="nama" placeholder="type the nama..."
                value="<?php echo $lan['nama'] ?>" />
        </div>
        <div class="input-block">
            <label for="harga">Harga per item</label>
            <input type="text" name="harga" id="harga" placeholder="type the harga..."
                value="<?php echo $lan['harga'] ?>" />
        </div>
        <div class="input-block">
            <label for="status">Status Barang</label>
            <select name="status" id="status">
                <option value="">-- Select Status --</option>
                <?php foreach ($statuses as $status) { ?>
                <option value="<?php echo $status['idstatus'] ?>"
                    <?php echo $status['idstatus'] ==  $lan['idstatus'] ? 'selected' : '' ?>>
                    <?php echo $status['namastatus'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="input-block">
            <label for="type">Jenis Barang</label>
            <select name="type" id="type">
                <option value="">-- Select Jenis --</option>
                <option value="baju" <?php echo $lan['type'] == 'baju' ? 'selected' : null; ?>>Baju</option>
                <option value="celana" <?php echo $lan['type'] == 'celana' ? 'selected' : null; ?>>Celana</option>
                <option value="pakaian-dalam" <?php echo $lan['type'] == 'celana-dalam' ? 'selected' : null; ?>>Pakaian
                    Dalam</option>
                <option value="lainnya" <?php echo $lan['type'] == 'lainnya' ? 'selected' : null; ?>>Lainnya</option>
            </select>
        </div>
        <div class="input-block">
            <label for="total">Total</label>
            <input type="number" name="total" id="total" placeholder="type the Total..."
                value="<?php echo $lan['total'] ?>" />
        </div>
        <div class="input-block">
            <label for="keterangan">Keterangan</label>
            <input type="text" name="keterangan" id="keterangan" placeholder="type the harga..."
                value="<?php echo $lan['keterangan'] ?>" />
        </div>
        <div class="input-block">
            <button type="submit" name="edit" value="edit">Edit</button>
        </div>
    </form>
</div>
<?php
require 'layouts/footer.php';