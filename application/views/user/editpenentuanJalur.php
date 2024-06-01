<div style="margin-left: 5%; margin-right: 5%;">
<?php echo $this->session->flashdata('pesan') ?>
        <h4>Edit Penentuan Jalur</h4>

        <div class="card" style="width: 60%; margin-bottom: 100px">
            <div class="card-body">
                
                <form method="POST" action="<?php echo base_url('penentuanJalur/editPenentuanJalurAksi') ?>" enctype="multipart/form-data">
                    <?php foreach($e_penentuanJalur as $e) : ?>
                    <div class="form-group">
                        <label>Simbol</label>
                        <input type="hidden" name="id" class="form-control" value="<?php echo $e->id ?>">
                        <input type="text" name="simbol" class="form-control" placeholder="Example : A" value="<?php echo $e->simbol ?>">
                        <?php echo form_error('simbol','<div class="text-small text-danger"></div>') ?>
                    </div>
    
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" placeholder="Example : Jalur 1" value="<?php echo $e->keterangan ?>">
                        <?php echo form_error('keterangan','<div class="text-small text-danger"></div>') ?>
                    </div>

                    <div class="form-group">
                        <label>Latitude</label>
                        <input type="text" name="latitude" class="form-control" placeholder="Example : Jalur 1" value="<?php echo $e->latitude ?>">
                        <?php echo form_error('latitude','<div class="text-small text-danger"></div>') ?>
                    </div>

                    <div class="form-group">
                        <label>Longitude</label>
                        <input type="text" name="longitude" class="form-control" placeholder="Example : Jalur 1" value="<?php echo $e->longitude ?>">
                        <?php echo form_error('longitude','<div class="text-small text-danger"></div>') ?>
                    </div>
                    <?php endforeach; ?>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?php echo base_url('penentuanJalur') ?>" class="btn btn-danger">Cancel</a>
    
                </form>
    
            </div>
        </div>
    </div>

</div>