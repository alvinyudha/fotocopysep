<style>
    .table-container {
        overflow: auto;
        width: 100%;
    }
</style>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <h1 class="h3 mb-4 text-gray-800"><?= $tittle; ?></h1>
    <div class="row">

        <div class="col-lg-12">
            <?= $this->session->flashdata('message'); ?>
            <div class="table-container">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Pelanggan</th>
                            <th scope="col">Nama File</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Ukuran</th>
                            <th scope="col">File</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($cetakfoto as $c) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $c['nama_pelanggan']; ?></td>
                                <td><?= $c['nama']; ?></td>
                                <td><?= $c['jumlah']; ?></td>
                                <td><?= $c['ukuran']; ?></td>
                                <td>
                                    <img src="<?= base_url('/assets/barang/') . $c['nama']; ?>" width="150px" class="img-thumbnail">
                                </td>
                                <td>Rp.<?= number_format($c['harga']); ?></td>
                                <td><?php $date = date_create($c['tanggal']);
                                    echo date_format($date, 'd F Y / H:i'); ?></td>
                                <td>
                                    <a href="<?= base_url('/assets/barang/') . $c['nama']; ?>" download="<?= $c['nama']; ?>" type="button" class="badge badge-primary">Unduh</a>
                                    <a href="<?= base_url('filepesanan/hapus/') . $c['id']; ?>" class="badge badge-danger" onclick="return confirm('yakin untuk menghapus?') "><i class="fa fa-trash"></i>Hapus</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
            <?= $this->pagination->create_links(); ?>
        </div>

    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->