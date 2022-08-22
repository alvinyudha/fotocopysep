<body class="hold-transition layout-top-nav">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> <?= $tittle ?></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('website') ?>">Fotocopy SEP</a></li>
                            <li class="breadcrumb-item active"><?= $tittle ?></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- Main content -->
        <div class="container p-3 border-top-0 bg-transparent px-lg-5 align-items-stretch justify-content-center">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h4>
                        <i class="fas fa-shopping-cart"></i> Check Out
                        <small class="float-right">Date: <?= date('D, d F Y') ?></small>
                    </h4>
                </div>
                <!-- /.col -->
            </div>
            <hr>
            <?php
            echo form_open('belanja/checkout');
            $no_order = date('Ymd') . strtoupper(random_string('alnum', 8));

            ?>

            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    From
                    <address>
                        <strong>Admin, Inc.</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        Phone: (804) 123-5432<br>
                        Email: info@almasaeedstudio.com
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    To
                    <address>
                        <strong>John Doe</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        Phone: (555) 539-1037<br>
                        Email: john.doe@example.com
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>Invoice #007612</b><br>
                    <br>
                    <b>Order ID: </b> <?= $no_order ?><br>
                    <b>Payment Due:</b> 2/22/2014<br>
                    <b>Account:</b> 968-34567
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Qty</th>
                                <th>Barang</th>
                                <th>Harga</th>
                                <th width="150px">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>

                            <?php foreach ($this->cart->contents() as $items) :
                            ?>
                                <tr>
                                    <td><?php echo $items['qty']; ?></td>
                                    <td><?php echo $items['name']; ?></td>
                                    <td>Rp. <?php echo number_format($items['price']); ?></td>
                                    <td>Rp. <?php echo number_format($items['subtotal']); ?></td>
                                </tr>
                                <?php $i++; ?>

                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->


            <div class="row">
                <!-- accepted payments column -->
                <div class="col-6 invoice-col">
                    Tujuan :
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" rows="2"><?= $tb_user['alamat'] ?></textarea>
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Penerima</label>
                                <input type="text" name="nama_penerima" class="form-control" value="<?= $tb_user['name'] ?>" readonly>
                                <?= form_error('nama_penerima', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>No Telepon</label>
                                <input type="number" name="telp_penerima" class="form-control" value="<?= $tb_user['telepon'] ?>" readonly>
                                <?= form_error('telp_penerima', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-6">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:70%">Total Bayar:</th>
                                <td>Rp. <?php echo number_format($this->cart->total()); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- Simpan transaksi -->
            <input class="d-none" value="<?= $no_order ?>" name="no_order">
            <input class="" name="total_bayar" value="<?= $this->cart->total() ?>">
            <!-- end Simpan transaksi -->
            <!-- Simpan rincian transaksi -->
            <?php
            $i = 1;
            foreach ($this->cart->contents() as $items) {
                echo form_hidden('qty' . $i++, $items['qty']);
            } ?>
            <!-- End simpan rincian transaksi  -->
            <!-- this row will not appear when printing -->

            <?php echo form_close() ?>
        </div>
        <!-- /.invoice -->

        <script type="text/javascript">
            window.print();
        </script>