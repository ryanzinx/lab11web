<?= $this->include('template/admin_header'); ?>
<table border="1" cellpadding="20" cellspacing="0" width=100% style="text-align:center" class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <form method="get" class="form-search">
<input type="text" name="q" value="<?= $q; ?>" placeholder="Cari judul Artikel">
<input type="submit" value="Cari" class="btn btn-primary">
</form>
        <?php if ($artikel) : foreach ($artikel as $row) : ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td>
                        <b><?= $row['judul']; ?></b>
                        <p><small><?= substr($row['isi'], 0, 50); ?></small></p>
                    </td>
                    <td><?= $row['status']; ?></td>
                    <td>
                        <a class="btn" href="<?= base_url('/admin/artikel/edit/' . $row['id']); ?>">Ubah</a>
                        <a class="btn btn-danger" onclick="return confirm('Yakin menghapus data?');" href="<?= base_url('/admin/artikel/delete/' . $row['id']); ?>">Hapus</a>
                    </td>
                </tr>
            <?php endforeach;
        else : ?>
            <tr>
                <td colspan="4">Belum ada data.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?= $pager->only(['q'])->links(); ?>

<?= $this->include('template/admin_footer'); ?>
