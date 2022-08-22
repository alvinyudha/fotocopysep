<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <h1 class="h3 mb-4 text-gray-800"><?= $tittle; ?></h1>
    <div class="row">

        <div class="col-lg">

            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-info mb-3" data-toggle="modal" data-target="#newSupplierModal">Tambah Supplier</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Supplier</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($supplier as $s) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $s['nama_supplier']; ?></td>
                            <td><?= $s['alamat']; ?></td>
                            <td><?= $s['phone']; ?></td>
                            <td><?= $s['keterangan']; ?></td>
                            <td>
                                <a href="" class="badge badge-success">edit</a>
                                <a href="<?= base_url('/supplier/hapus_supplier/') . $s['id_supplier']; ?>" class="badge badge-danger" onclick="return confirm('yakin untuk menghapus?') ">delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>

    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="newSupplierModal" tabindex="-1" role="dialog" aria-labelledby="newSupplierModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSupplierModalLabel">Tambah Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('supplier') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" placeholder="Nama Supplier" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" required>
                    </div>
                    <!--ComboBox-->
                    <div class="form-group">
                        <select name="keterangan" id="keterangan" class="form-control" required>
                            <option value="">Pilih Keterangan</option>
                            <!--looping-->
                            <?php foreach ($kategori as $k) : ?>
                                <option value="<?= $k['nama_kategori']; ?>"><?= $k['nama_kategori']; ?></option>

                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>