<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Daftar Booking</h3>

            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body" style="display: block;">
            <?php
            if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>';
                echo $this->session->flashdata('pesan');
                echo '</div>';
            }
            ?>
            <table class="table table-bordered" id="example1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Atas Nama</th>
                        <th>Tanggal</th>
                        <th>jam</th>
                        <th>Banyak Orang</th>
                        <th>No Meja</th>
                        <th>lokasi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($booking_selesai as $key => $value) {

                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value->atas_nama; ?></td>
                            <td><?= $value->tgl_booking; ?></td>
                            <td><?= $value->jam; ?></td>
                            <td><?= $value->banyak_orang; ?></td>
                            <td><?= $value->no_meja; ?></td>
                            <td><?= $value->lokasi; ?></td>
                            <td class="text-center">
                                <button data-toggle="modal" data-target="#delete<?= $value->id_booking ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    <!-- /.card -->

</div>

<!-- /.MODAL delete -->
<?php foreach ($booking_selesai as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value->id_booking ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $value->atas_nama; ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Apakah anda yakin ingin menghapus data ini?</h5>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('daftar_booking/delete/' . $value->id_booking) ?>" class="btn btn-primary">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>