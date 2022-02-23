<div class="row">
    <div class="col-sm-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Rekening Dama</h3>
            </div>

            <div class="card-body">
                <p>silahkan transfer uang ke nomor rekening dibawah ini sebesar :
                    <?php $bookingan->dp_booking = $bookingan->banyak_orang * 20000 ?>
                <h1 class="text-primary">Rp. <?= number_format($bookingan->dp_booking, 0); ?>.-</h1>
                </p><br>
                <table class="table">
                    <tr>
                        <th>Bank</th>
                        <th>No Rekening</th>
                        <th>Atas Nama</th>
                    </tr>
                    <?php foreach ($rekening as $key => $value) { ?>
                        <tr>
                            <td><?= $value->nama_bank; ?></td>
                            <td><?= $value->no_rek; ?></td>
                            <td><?= $value->atas_nama; ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>

    </div>
    <div class="col-sm-6">
        <div class="card card-primary">
            <?php
            echo validation_errors('<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>', '</div>');

            if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Sukses!</h5>';
                echo $this->session->flashdata('pesan');
                echo '</div>';
            }

            if ($this->session->flashdata('error')) {
                echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-times"></i> Error!</h5>';
                echo $this->session->flashdata('error');
                echo '</div>';
            }
            ?>
            <div class="card-header">
                <h3 class="card-title">Upload Bukti Pembayaran</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?php echo form_open_multipart('booking_tempat/bayar/' . $bookingan->id_booking) ?>
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Atas Nama</label>
                    <input class="form-control" name="atas_nama_bayar" placeholder="Atas Nama" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Bank</label>
                    <input class="form-control" name="nama_bank" placeholder="Nama Bank" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nomor Rekening</label>
                    <input class="form-control" name="no_rek" placeholder="Nomor Rekening" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">Bukti Bayar</label>
                    <input type="file" name="bukti_bayar" class="form-control" required>
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?= base_url('booking_tempat') ?>" class="btn btn-success">back</a>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>