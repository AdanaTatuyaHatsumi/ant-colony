<div style="margin-left: 5%; margin-right: 5%;">
<?php echo $this->session->flashdata('pesan') ?>
        <h4>Tambah Parameter</h4>

        <div class="card" style="width: 60%; margin-bottom: 100px">
            <div class="card-body">
                
                <form method="POST" action="<?php echo base_url('parameter/tambahParameterAksi') ?>" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label>Tetapan Siklus Semut (Q)</label>
                        <input type="text" name="Q" class="form-control" placeholder="Example : Q >= 0">
                        <?php echo form_error('Q','<div class="text-small text-danger"></div>') ?>
                    </div>

                    <div class="form-group">
                        <label>Inisialisai Jejak Semut Antar Titik (Tij)</label>
                        <input type="text" name="Tij" class="form-control" placeholder="Example : 0 <= Tij <= 1">
                        <?php echo form_error('Tij','<div class="text-small text-danger"></div>') ?>
                    </div>

                    <div class="form-group">
                        <label>Pengendali Intensitas Jejak Semut (a)</label>
                        <input type="text" name="a" class="form-control" placeholder="Example : 0 <= a <=1">
                        <?php echo form_error('a','<div class="text-small text-danger"></div>') ?>
                    </div>

                    <div class="form-group">
                        <label>Tahapan Pengendali (B)</label>
                        <input type="text" name="B" class="form-control" placeholder="Example : B => 0">
                        <?php echo form_error('B','<div class="text-small text-danger"></div>') ?>
                    </div>
    
                    <div class="form-group">
                        <label>Tahapan Penguapan Semut (p)</label>
                        <input type="text" name="p" class="form-control" placeholder="Example : 0 <= p <=1">
                        <?php echo form_error('p','<div class="text-small text-danger"></div>') ?>
                    </div>
    
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?php echo base_url('parameter') ?>" class="btn btn-danger">Batal</a>
    
                </form>
    
            </div>
        </div>
    </div>

</div>