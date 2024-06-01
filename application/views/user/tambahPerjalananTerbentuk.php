<div style="margin-left: 5%; margin-right: 5%;">
<?php echo $this->session->flashdata('pesan') ?>
        <h4>Tambah Perjalanan Terbentuk</h4>

        <div class="card" style="width: 60%; margin-bottom: 100px">
            <div class="card-body">
                
                <form method="POST" action="<?php echo base_url('perjalananTerbentuk/tambahPerjalananTerbentukAksi') ?>" enctype="multipart/form-data">
                
                <div class="form-group">
                        <label>Perjalanan Terbentuk</label>
                        <input type="text" name="perjalanan" class="form-control" placeholder="Example : A-B-C-D">
                        <?php echo form_error('perjalanan','<div class="text-small text-danger"></div>') ?>
                    </div>
    
                    <div class="form-group">
                        <label>Total Jarak</label>
                        <input type="text" name="jarak" class="form-control" placeholder="Example : 3.567">
                        <?php echo form_error('jarak','<div class="text-small text-danger"></div>') ?>
                    </div>
    
                    <button type="submit" class="btn btn-primary">Simpan</button>
    
                </form>
    
            </div>
        </div>
    </div>

</div>