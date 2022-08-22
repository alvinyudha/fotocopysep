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

        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-info mb-3" data-toggle="modal" data-target="#newKategoriModal">Tambah Data</a>
            <div class="table-container">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama File</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Ukuran</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($cetakfoto as $c) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $c['paket']; ?></td>
                                <td>Rp. <?= number_format($c['harga']) ?></td>
                                <td>
                                    <img src="<?= base_url('/assets/barang/') . $c['gambar']; ?>" width="150px" class="img-thumbnail">
                                </td>
                                <td>

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
<!-- Button trigger modal -->

<!-- Modal Tambah -->
<div class="modal fade" id="newKategoriModal" tabindex="-1" role="dialog" aria-labelledby="newKategoriModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newKategoriModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open_multipart('cetakfoto/tambah'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Paket Foto</label>
                    <input type="text" class="form-control" id="paket" name="paket" placeholder="Paket Foto" required>
                </div>
                <div class="form-group">
                    <label for="">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga" required>
                </div>
                <div class="form-group">
                    <label for="">Pilih Gambar</label>
                    <input type="file" class="form-control" id="preview_gambar" name="gambar" placeholder="Gambar Contoh" required>
                </div>
                <div class="form-group">
                    <img src="<?= base_url('/assets/barang/no_image.png') ?>" width="150" id="gambar_load">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>


<!-- Modal Edit -->
<?php $no = 0;
foreach ($cetakfoto as $c) : $no++ ?>
    <div class="modal fade" id="editCetakFoto<?= $c['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editCetakFotoLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newEditModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open_multipart('cetakfoto/edit/' . $c['id']) ?>
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?= $c['id']; ?>">
                    <div class="form-group">
                        <label for="">Paket Foto</label>
                        <input type="text" class="form-control" id="paket" name="paket" value="<?= $c['paket']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" value="<?= $c['harga']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar">
                    </div>
                    <img src=" <?= base_url('/assets/barang/') . $c['gambar']; ?>" width="150" class="img-thumbnail">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <?php echo form_close(); ?>

            </div>
        </div>
    </div>
<?php endforeach ?>