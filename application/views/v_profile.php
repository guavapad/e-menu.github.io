<div class="card card-primary card-outline">
    <div class="card-body box-profile">
        <div class="text-center">
            <img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/logo/profile.png') ?>" alt="User profile picture">
        </div>
        <h3 class="profile-username text-center"><?= $profile->nama_pelanggan; ?></h3>


        <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
                <b>Email</b> <a class="float-right"><?= $profile->email; ?></a>
            </li>
        </ul>
        <div class="row">
            <button data-toggle="modal" data-target="#edit>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
            <a href="#" class="btn btn-primary btn-block"><b>back</b></a>
        </div>

    </div>
    <!-- /.card-body -->

    <!-- /.MODAL EDIT -->
    <div class="modal fade" id="edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit data pelanggan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('pelanggan/edit/');
                    ?>

                    <div class="form-group">
                        <label>Nama pelanggan</label>
                        <input type="text" name="nama_pelanggan" value="<?= $profile['nama_pelanggan'] ?>" class="form-control" placeholder="Nama pelanggan" required>
                    </div>
                    <div class="form-group">
                        <label>email</label>
                        <input type="text" name="email" value="<?= $profile['email'] ?>" class="form-control" placeholder="email" required>
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


</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>