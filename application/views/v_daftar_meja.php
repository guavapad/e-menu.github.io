<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Data Meja</h3>

            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6"></div>
                <div class="col-md-3">
                    <div class="card-tools">
                        <button data-toggle="modal" data-target="#add" type="button" class="btn btn-primary btn-xs">
                            <i class="fas fa-plus"></i>
                            Add</button>
                    </div>
                    <div class="card-tools">
                        <button data-toggle="modal" data-target="#update_all" type="button" class="btn btn-warning btn-xs">
                            Reset</button>
                    </div>
                </div>
            </div>
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
                        <th>Nomor meja</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($daftar_meja as $key => $value) {

                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value->no_meja; ?></td>
                            <?php if ($value->status_meja == 1) { ?>
                                <td>berisi</td>
                            <?php } else { ?>
                                <td>kosong</td>
                            <?php } ?>
                            <td class="text-center">
                                <button data-toggle="modal" data-target="#update<?= $value->id_meja ?>" class="btn btn-warning btn-sm">non-active</button>
                                <button data-toggle="modal" data-target="#active<?= $value->id_meja ?>" class="btn btn-success btn-sm">active</button>
                                <button data-toggle="modal" data-target="#edit<?= $value->id_meja ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                <button data-toggle="modal" data-target="#delete<?= $value->id_meja ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
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

<!-- /.MODAL update all -->
<div class="modal fade" id="update_all">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">update all Meja</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('daftar_meja/update_all');
                ?>
                <h4>apakah anda yakin mengupdate semua status meja?</h4>
                <!-- <div class="form-group">
                    <label>Nomor Meja</label>
                    <input type="text" name="no_meja" class="form-control" placeholder="Nomor Meja" required>
                </div> -->

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?php
            echo form_close();
            ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- /.MODAL ADD -->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Meja</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('daftar_meja/add');
                ?>

                <div class="form-group">
                    <label>Nomor Meja</label>
                    <input type="text" name="no_meja" class="form-control" placeholder="Nomor Meja" required>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?php
            echo form_close();
            ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- /.MODAL EDIT -->
<?php foreach ($daftar_meja as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value->id_meja ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Meja</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('daftar_meja/edit/' . $value->id_meja);
                    ?>

                    <div class="form-group">
                        <label>Nomor Meja</label>
                        <input type="text" name="no_meja" value="<?= $value->no_meja ?>" class="form-control" placeholder="Nama kategori" required>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
//
<!-- /.MODAL Update-->
<?php foreach ($daftar_meja as $key => $value) { ?>
    <div class="modal fade" id="update<?= $value->id_meja ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">update Meja menjadi non-active</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('daftar_meja/update/' . $value->id_meja);
                    ?>

                    <div class="form-group">
                        <label>Nomor Meja</label>
                        <input type="text" name="no_meja" value="<?= $value->no_meja ?>" class="form-control" placeholder="Nama kategori" required>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>

<!-- /.MODAL Update active-->
<?php foreach ($daftar_meja as $key => $value) { ?>
    <div class="modal fade" id="active<?= $value->id_meja ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">update Meja menjadi active</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('daftar_meja/active/' . $value->id_meja);
                    ?>

                    <div class="form-group">
                        <label>Nomor Meja</label>
                        <input type="text" name="no_meja" value="<?= $value->no_meja ?>" class="form-control" placeholder="Nama kategori" required>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!-- /.MODAL delete -->
<?php foreach ($daftar_meja as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value->id_meja ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete<?= $value->no_meja; ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Apakah anda yakin ingin menghapus data ini?</h5>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('daftar_meja/delete/' . $value->id_meja) ?>" class="btn btn-primary">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>