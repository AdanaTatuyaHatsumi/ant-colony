<div style="margin-left: 5%; margin-right: 5%;">
<?php echo $this->session->flashdata('pesan') ?>
        <h4>Tambah Perjalanan Terbentuk</h4>

        <div class="card" style="width: 60%; margin-bottom: 100px">
            <div class="card-body">
                
                <form method="POST" action="<?php echo base_url('perjalananTerbentuk/editPerjalananTerbentukAksi') ?>" enctype="multipart/form-data">
                <?php foreach($e_perjalananTerbentuk as $e) : ?>
                <div class="form-group">
                        <label>Perjalanan Terbentuk</label>
                        <input type="hidden" name="id" class="form-control" value="<?php echo $e->id ?>">
                        <input type="text" name="perjalanan" class="form-control" placeholder="Example : A-B-C-D" value="<?php echo $e->perjalanan ?>">
                        <?php echo form_error('perjalanan','<div class="text-small text-danger"></div>') ?>
                    </div>
    
                    <div class="form-group">
                        <label>Total Jarak</label>
                        <input type="text" name="jarak" class="form-control" placeholder="Example : 3.567" value="<?php echo $e->jarak ?>">
                        <?php echo form_error('jarak','<div class="text-small text-danger"></div>') ?>
                    </div>
                <?php endforeach; ?>
                    <button type="submit" class="btn btn-primary">Simpan</button>
    
                </form>
    
            </div>
        </div>
    </div>

</div>