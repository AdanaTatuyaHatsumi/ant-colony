<!-- Begin Page Content -->
<div class="container-fluid">

<?php echo $this->session->flashdata('pesan') ?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Jarak Antar Simpul</h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <?php if(empty($t_jarakAntarSimpul)) { ?>
        <h6 class="m-0 font-weight-bold text-primary"><a class="btn btn-sm btn-success" href="<?php echo base_url('jarakAntarSimpul/tambahJarakAntarSimpul') ?>"><i class="fas fa-plus"></i>Tambah Data</a></h6>
        <?php } else { ?>
        <h6 class="m-0 font-weight-bold text-primary"><a onclick="return confirm('Yakin Hapus?')" class="btn btn-sm btn-danger" href="<?php echo base_url('jarakAntarSimpul/deleteJarakAntarSimpul') ?>">Delete Data</a></h6>
        <?php } ?>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Titik 1</th>
                        <th>Titik 2</th>
                        <th>Jarak</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
                   <?php $no=1; foreach($t_jarakAntarSimpul as $t) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $t->titik1 ?></td>
                        <td><?php echo $t->titik2 ?></td>
                        <td><?php echo $t->jarak ?></td>
                        <td>
                        <a class="btn btn-sm btn-warning" href="<?php echo base_url('penentuanJalur/editPenentuanJalur/'.$t->id) ?>">Edit</a>
                        </td>
                   </tr>
                   <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
