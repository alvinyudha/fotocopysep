<style>
    .table-container {
        overflow: auto;
        width: 100%;
    }

    button[type=submit] {
        color: white;
        background-color: #5FD068;
        font-family: sans-serif;
        font-size: 15px;
        border: white 3px solid;
        border-radius: 10px;
        padding: 10px 10px;
        margin-top: 10px;
    }

    button[type=submit]:hover {
        opacity: 0.9;
    }

    button[name=tutup] {
        text-decoration: none;
        color: white;
        background-color: red;
        font-family: sans-serif;
        font-size: 15px;
        border: white 3px solid;
        border-radius: 10px;
        padding: 10px 10px;
        margin-top: 10px;
    }

    button[name=tutup]:hover {
        opacity: 0.7;
    }
</style>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <div class="col-md-4 d-none d-sm-block">
                <form action="<?= base_url('barang') ?>" method="POST">
                    <div class="input-group">
                        <input type="text" name="keyword" placeholder="Search" class="form-control form-control-navbar" autocomplete="off" autofocus>
                        <div class="input-group-append">
                            <input class="btn btn-primary" type="submit" name="submit">

                        </div>
                    </div>
                </form>
            </div>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated-grow-in" aria-labelledby="searchDropdown">
                        <form action="<?= base_url('barang') ?>" method="POST">
                            <div class="input-group">
                                <input type="text" name="keyword" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <input class="btn btn-primary" type="submit" name="submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </li>


                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $tb_user['name']; ?></span>
                        <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $tb_user['image']; ?>"></img>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <!-- <a class="dropdown-item" href="#">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Settings
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                            Activity Log
                        </a>
                        <div class="dropdown-divider"></div> -->
                        <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->

            <h1 class="h3 mb-4 text-gray-800"><?= $tittle; ?></h1>
            <hr>

            <div class="row">
                <div class="col-lg ">
                    <?= $this->session->flashdata('message'); ?>
                    <a href="" class="btn btn-info mb-3" data-toggle="modal" data-target="#tambahModal">Tambah Barang</a>
                </div>
                <div class="table-container">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col" class="column-primary" data-header="Data Barang"><span>No</span> </th>
                                <th scope="col">Nama Kategori</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Merk</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Stok</th>
                                <th scope="col" class="column-primary">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($barang as $b) : ?>
                                <tr>
                                    <th scope="row"><?= ++$start; ?></th>
                                    <td data-header="Kategori" class="title"><?= $b['nama_kategori']; ?></td>
                                    <td data-header="Barang"><?= $b['nama_barang']; ?></td>
                                    <td data-header="Merk"><?= $b['merk']; ?></td>
                                    <td data-header="Gambar">
                                        <img src="<?= base_url('/assets/barang/') . $b['gambar_barang']; ?>" width="150px" class="img-thumbnail">
                                    </td>
                                    <td data-header="Harga">Rp.<?= number_format($b['harga_barang']); ?></td>
                                    <td data-header="Satuan"><?= $b['satuan']; ?></td>
                                    <td data-header="Stok"><?= $b['stok']; ?></td>
                                    <th scope="row">
                                        <div class="toolbox">
                                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#editModal<?= $b['id_barang']; ?>"> <i class="fa fa-edit"></i>Edit</a>
                                            <a href="<?= base_url('barang/hapus/') . $b['id_barang']; ?>" class="badge badge-danger" onclick="return confirm('yakin untuk menghapus?') "><i class="fa fa-trash"></i> hapus</a>
                                        </div>
                                    </th>
                                </tr>

                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
                <?= $this->pagination->create_links(); ?>
            </div>

        </div>



    </div>
    <!-- /.container-fluid -->
    <!-- Modal Tambah -->
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="#tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Tambah Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <?php echo form_open_multipart('barang/tambah'); ?>

                    <div class="form-group">
                        <label for="nama_kategori">Nama Kategori</label>
                        <select name="nama_kategori" id="nama_kategori" class="form-control">
                            <option value="">Pilih Kategori</option>
                            <!--looping-->
                            <?php foreach ($kategori as $k) : ?>
                                <option value="<?= $k['nama_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang" required>
                    </div>
                    <div class="form-group">
                        <label for="merk">Merk</label>
                        <input type="text" class="form-control" id="merk" name="merk" placeholder="Merk" required>
                    </div>
                    <div class="form-group">
                        <label for="gambar_barang">Gambar</label>
                        <input type="file" class="form-control" id="preview_gambar" name="gambar_barang" required>
                    </div>
                    <div class="form-group">
                        <img src="<?= base_url('/assets/barang/no_image.png') ?>" width="150" id="gambar_load">
                    </div>
                    <div class="form-group mt-3">
                        <label for="harga_barang">Harga Barang</label>
                        <input type="number" class="form-control" id="harga_barang" name="harga_barang" placeholder="Harga Barang" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="5" placeholder="Deskripsi"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Satuan" required>
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" class="form-control" id="stok" name="stok" placeholder="Stok" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" name="tutup" data-dismiss="modal">Tutup</button>
                    <button type="submit" name="tambah" class=" float-right">Tambah Data</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>


    <!-- Modal Edit -->
    <?php $no = 0;
    foreach ($barang as $b) : $no++ ?>
        <div class="modal fade" id="editModal<?= $b['id_barang'] ?>" tabindex="-1" role="dialog" aria-labelledby="#editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <?php echo form_open_multipart('barang/edit/' . $b['id_barang']) ?>
                    <div class="modal-body">
                        <input type="hidden" name="id_barang" value="<?= $b['id_barang'] ?>">
                        <div class="form-group">
                            <label for="nama_kategori">Nama Kategori</label>
                            <select name="nama_kategori" id="nama_kategori" class="form-control">
                                <option value="">Pilih Kategori</option>
                                <!--looping-->
                                <?php foreach ($kategori as $k) : ?>
                                    <option value="<?= $k['nama_kategori']; ?>" <?= ($k['nama_kategori'] == $b['nama_kategori']) ? 'selected' : '' ?>><?= $k['nama_kategori']; ?></option>

                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $b['nama_barang']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="merk">Merk</label>
                            <input type="text" class="form-control" id="merk" name="merk" value="<?= $b['merk']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="gambar_barang">Gambar</label>
                            <input type="file" class="form-control" id="gambar_barang" name="gambar_barang">
                        </div>
                        <img src=" <?= base_url('/assets/barang/') . $b['gambar_barang'] ?>" width="150">
                        <div class="form-group">
                            <label for="harga_barang">Harga Barang</label>
                            <input type="number" class="form-control" id="harga_barang" name="harga_barang" value="<?= $b['harga_barang']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="5"><?= $b['deskripsi']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="satuan">Satuan</label>
                            <input type="text" class="form-control" id="satuan" name="satuan" value="<?= $b['satuan']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="number" class="form-control" id="stok" name="stok" value="<?= $b['stok']; ?>" required>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" name="tutup" data-dismiss="modal">Tutup</button>
                        <button type="submit" class=" float-right">Simpan</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>


    <!-- End of Main Content -->