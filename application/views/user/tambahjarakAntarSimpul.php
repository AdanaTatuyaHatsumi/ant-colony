<div style="margin-left: 5%; margin-right: 5%;">
<?php echo $this->session->flashdata('pesan') ?>
        <h4>Tambah Jarak Antar Simpul</h4>

        <div class="card" style="width: 60%; margin-bottom: 100px">
            <div class="card-body">
                
                <form method="POST" action="<?php echo base_url('jarakAntarSimpul/tambahjarakAntarSimpulAksi') ?>" enctype="multipart/form-data">
                <?php $j=1; $t1=1; $t2=1; $jk=1; foreach($t_penentuanJalur as $t) : ?>
                    <?php  foreach($t_penentuanJalur as $tp) : ?>
                        <div class="form-group">
                        <label>Titik <?php echo $t->simbol.' & '.$tp->simbol ?></label>
                        <input type="hidden" name="<?php echo 'titik1'.$t1++ ?>" class="form-control" value="<?php echo $t->simbol; ?>">
                        <input type="hidden" name="<?php echo 'titik2'.$t2++ ?>" class="form-control" value="<?php echo $tp->simbol ?>">
                        <input type="text" name="<?php echo 'jarak'.$j++ ?>" class="form-control" placeholder="Example Jarak = 0.345">
                        <?php echo form_error('jarak'.$jk++,'<div class="text-small text-danger"></div>') ?>
                        </div>
                    <?php endforeach; ?>
                <?php endforeach; ?>
    
                    <button type="submit" class="btn btn-primary">Simpan</button>
    
                </form>
    
            </div>
        </div>
    </div>

</div>