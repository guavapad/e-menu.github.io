<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Menu</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
            //notifikasi form kosong
            echo validation_errors('<div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-info"></i>', '</h5></div>');

            //notifikasi gagal upload gambar
            if (isset($error_upload)) {
                echo ('<div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-info"></i>' . $error_upload . '</h5></div>');
            }
            echo form_open_multipart('menu/edit/' . $menu->id_menu) ?>
            <div class="form-group">
                <label>Nama Menu</label>
                <input name="nama_menu" class="form-control" placeholder="nama menu" value="<?= $menu->nama_menu ?>">
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <select name="id_kategori" class="form-control">
                            <option value="<?= $menu->id_kategori ?>"><?= $menu->nama_kategori ?></option>
                            <?php foreach ($kategori as $key => $value) { ?>
                                <option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Harga</label>
                        <input name="harga" class="form-control" placeholder="harga" value="<?= $menu->harga ?>">
                    </div>
                </div>

            </div>
            <!-- text input -->
            <div class="form-group">
                <label>Deskripsi Menu</label>
                <textarea name="deskripsi" class="form-control" rows="5" placeholder="desripsi menu" value=""><?= $menu->deskripsi ?></textarea>
            </div>
            <!-- text input -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" name="gambar" class="form-control" id="preview_gambar">
                    </div>
                    <div class="form-group">
                        <img src="<?= base_url('assets/gambar/' . $menu->gambar) ?>" id="gambar_load">
                    </div>
                </div>
            </div>
            <!-- text input -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                <a href="<?= base_url('menu') ?>" class="btn btn-warning btn-sm">Kembali</a>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<script>
    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#gambar_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#preview_gambar").change(function() {
        bacaGambar(this);
    });
</script>