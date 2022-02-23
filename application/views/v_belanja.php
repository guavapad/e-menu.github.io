<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row">
            <?php
            if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>';
                echo $this->session->flashdata('pesan');
                echo '</div>';
            }
            ?>
            <div class="col-sm-12">
                <?php echo form_open('belanja/update'); ?>

                <table class="table" cellpadding="6" cellspacing="1" style="width:100%">

                    <tr>
                        <th width="85px">QTY</th>
                        <th>Pesanan</th>
                        <th style="text-align:right">Harga</th>
                        <th style="text-align:right">Sub-Total</th>
                        <th class="text-center">action</th>
                    </tr>

                    <?php $i = 1; ?>

                    <?php foreach ($this->cart->contents() as $items) : ?>

                        <tr>
                            <td>
                                <?php
                                echo form_input(array(
                                    'name' => $i . '[qty]',
                                    'value' => $items['qty'],
                                    'maxlength' => '3',
                                    'size' => '5',
                                    'type' => 'number',
                                    'min' => '1',
                                    'class' => 'form-control'
                                ));
                                ?>
                            </td>
                            <td><?php echo $items['name']; ?></td>
                            <td style="text-align:right">Rp. <?php echo $this->cart->format_number($items['price']); ?></td>
                            <td style="text-align:right">Rp. <?php echo $this->cart->format_number($items['subtotal']); ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('belanja/delete/' . $items['rowid']) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>

                        <?php $i++; ?>

                    <?php endforeach; ?>

                    <tr>
                        <td colspan="2"> </td>
                        <td style="text-align:right"><strong>Total</strong></td>
                        <td style="text-align:right"><strong>Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></strong></td>

                    </tr>
                    <!-- <label>apakah anda ingin melakukan booking tempat</label><br>
                    <input type="radio" id="html" name="book" value="ya">
                      <label for="html">ya</label><br>
                      <input type="radio" id="css" name="book" value="tidak">
                      <label for="css">tidak</label><br> -->

                </table>
                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i>Update Pesanan</button>
                <a href="<?= base_url('belanja/clear') ?>" class="btn btn-danger btn-flat"><i class="fa fa-recycle"></i>clear order</a>
                <a href="<?= base_url('belanja/cekout') ?>" class="btn btn-success btn-flat"><i class="fa fa-check-square"></i>Check Out</a>
                <?php echo form_close(); ?>
                <br>
            </div>
        </div>
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
<br>