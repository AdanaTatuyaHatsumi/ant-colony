<div style="margin-left: 5%; margin-right: 5%;">
<?php echo $this->session->flashdata('pesan') ?>
        <h4>Tambah Penentuan Jalur</h4>

        <div class="card" style="width: 60%; margin-bottom: 100px">
            <div class="card-body">
                
                <form method="POST" action="<?php echo base_url('penentuanJalur/tambahpenentuanJalurAksi') ?>" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label>Simbol</label>
                        <input type="text" name="simbol" class="form-control" placeholder="Example : A">
                        <?php echo form_error('simbol','<div class="text-small text-danger"></div>') ?>
                    </div>
    
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" placeholder="Example : Jalur 1">
                        <?php echo form_error('keterangan','<div class="text-small text-danger"></div>') ?>
                    </div>

                    <div class="form-group">
                        <label>Latitude</label>
                        <input type="text" name="latitude" class="form-control" placeholder="Example : -5.123790205771314">
                        <?php echo form_error('latitude','<div class="text-small text-danger"></div>') ?>
                    </div>

                    <div class="form-group">
                        <label>Longitude</label>
                        <input type="text" name="longitude" class="form-control" placeholder="Example : 119.4088597961251">
                        <?php echo form_error('longitude','<div class="text-small text-danger"></div>') ?>
                    </div>
    
                    <button type="submit" class="btn btn-primary">Simpan</button>
    
                </form>
    
            </div>
        </div>
    </div>

</div>