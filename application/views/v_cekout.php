<!-- Main content -->
<div class="invoice p-3 mb-3">
    <!-- title row -->
    <div class="row">
        <div class="col-12">
            <h4>
                <i class="fa fa-shopping-cart"></i> Check Out
                <small class="float-right">Date: <?= date('d-m-y'); ?></small>
            </h4>
        </div>
        <!-- /.col -->
    </div>
    <!-- info row -->

    <!-- /.row -->

    <!-- Table row -->
    <div class="row">

        <div class="col-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Item</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>

                    <?php foreach ($this->cart->contents() as $items) { ?>
                        <tr>
                            <td><?php echo $items['qty']; ?></td>
                            <td style="text-align:left">Rp. <?php echo $this->cart->format_number($items['price']); ?></td>
                            <td><?php echo $items['name']; ?></td>
                            <td style="text-align:left">Rp. <?php echo $this->cart->format_number($items['subtotal']); ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <?php
    echo validation_errors('<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        ', '</div>');
    ?>
    <?php
    echo form_open('belanja/cekout');
    $no_order = date('Ymd') . strtoupper(random_string('alnum', 8));
    ?>
    <div class="row">
        <!-- accepted payments column -->
        <div class="col-sm-6 invoice-col">
            Detail Pesanan :
            <div class="row">
                <!-- <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama_pelanggan" required>
                    </div>
                </div> -->
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nomor meja</label>
                        <select name="id_meja" class="form-control">
                            <option>---pilih meja---</option>
                            <?php foreach ($daftar_meja as $key => $value) {
                                if ($value->status_meja == 0) { ?>
                                    <option value="<?= $value->id_meja ?>"><?= $value->no_meja ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Metode Pembayaran</label>
                        <select name="metode_bayar" class="form-control">
                            <option value="cash">Cash</option>
                            <option value="transfer_bank">Bank Transfer</option>
                        </select>
                    </div>
                </div>
            </div>
            Informasi Tambahan :
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>catatan</label>
                        <textarea class="form-control" name="catatan_pesanan" cols="50" rows="4"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-6">
            <div class="table-responsive">
                <table class="table">

                    <tr>
                        <th>Total Bayar:</th>
                        <td>Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- simpan transaksi-->
    <input name="no_order" value="<?= $no_order ?>" hidden>
    <input name="total_bayar" value="<?= $this->cart->total() ?>" hidden>
    <!-- end simpan transaksi-->
    <!-- simpan rinci transaksi-->
    <?php
    $i = 1;
    foreach ($this->cart->contents() as $items) {
        echo form_hidden('qty' . $i++, $items['qty']);
    }
    ?>
    <!-- end rinci transaksi-->
    <br>
    <div class="row no-print">
        <div class="col-12">
            <a href="<?= base_url('belanja') ?>" class="btn btn-warning">
                <i class="fas fa-back"></i>
                Kembali
            </a>
            <button type="submit" class="btn btn-primary float-right"><i class="far fa-shopping-cart"></i>Submit
                check out
            </button>

        </div>
    </div>
    <?php echo form_close() ?>
</div>