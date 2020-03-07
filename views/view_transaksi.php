<?php

defined('_IN_APP_')  or die('access denied');
require  'layouts/header.php';
?>
<div class="content">
    <a href="<?php echo SITE_URL; ?>/transaksi.php?action=new">Tambah Pelanggan</a>
    <?php if (isset($success)) : ?>
    <p><strong>Sukses !</strong><?php echo $success; ?></p>
    <?php endif; ?>
    <table border="1" style="width: 100%">
        <tr>
            <th>#</th>
            <th>Nama Pemilik</th>
            <th>Tanggal Transaksi</th>
            <th>Keterangan</th>
            <th>Action</th>
        </tr>
        <?php $i = 1;
        foreach ($transaction as $trans) : ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $trans['fullname'] ?></td>
            <td><?php echo $trans['tgltransaksi'] ?></td>
            <td><?php echo $trans['keterangan'] ?></td>
            <td>
                <a
                    href="<?php echo SITE_URL; ?>/transaksi.php?action=delete&id=<?php echo $trans['idtransaksi'] ?>">Hapus</a>
                <a
                    href="<?php echo SITE_URL; ?>/transaksi.php?action=edit&id=<?php echo $trans['idtransaksi'] ?>">Ubah</a>
                <a href="<?php echo SITE_URL; ?>/laundry.php?idtrans=<?php echo $trans['idtransaksi'] ?>">Lihat</a>
                <a href="<?php echo SITE_URL; ?>/print-nota.php?idtrans=<?php echo $trans['idtransaksi'] ?>">Cetak
                    Nota</a>
            </td>
        </tr>
        <?php $i++;
        endforeach; ?>
        <!-- <tr>
            <th>#</th>
            <th>Nama Lengkap</th>
            <th>Nama Pengguna</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Action</th>
        </tr> -->
    </table>
</div>
<?php
require  'layouts/footer.php';