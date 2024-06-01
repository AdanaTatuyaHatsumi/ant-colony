<!-- Begin Page Content -->
<div class="container-fluid">

<?php echo $this->session->flashdata('pesan') ?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Penentuan Jalur</h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><a class="btn btn-sm btn-success" href="<?php echo base_url('penentuanJalur/tambahpenentuanJalur') ?>"><i class="fas fa-plus"></i>Tambah Data</a></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Simbol</th>
                        <th>Keterangan</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
                   <?php $no=1; foreach($t_penentuanJalur as $t) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $t->simbol ?></td>
                        <td><?php echo $t->keterangan ?></td>
                        <td><?php echo $t->latitude ?></td>
                        <td><?php echo $t->longitude ?></td>
                        <td>
                        <a class="btn btn-sm btn-warning" href="<?php echo base_url('penentuanJalur/editPenentuanJalur/'.$t->id) ?>">Edit</a>
                        <a onclick="return confirm('Yakin Hapus?')" class="btn btn-sm btn-danger" href="<?php echo base_url('penentuanJalur/deletePenentuanJalur/'.$t->id) ?>">Delete</a>
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