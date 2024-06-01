<!-- Begin Page Content -->
<div class="container-fluid">

<?php echo $this->session->flashdata('pesan') ?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Parameter</h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <?php if (empty($t_Parameter)) { ?>
            <h6 class="m-0 font-weight-bold text-primary"><a class="btn btn-sm btn-success" href="<?php echo base_url('parameter/tambahParameter') ?>"><i class="fas fa-plus"></i>Tambah Data</a></h6>
            <?php } ?>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th title="Tetapan Siklus Semut">Q</th>
                        <th title="Inisialisai Jejak Semut Antar Titik">Tij</th>
                        <th title="Pengendali Intesitas Jejak Semut">a</th>
                        <th title="Tahapan Pengendali">B</th>
                        <th title="Tahapan Penguapan Semut">p</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
                   <?php $no=1; foreach($t_Parameter as $t) : ?>
                    <tr>
                        <td><?php echo $t->Q ?></td>
                        <td><?php echo $t->Tij ?></td>
                        <td><?php echo $t->a ?></td>
                        <td><?php echo $t->B ?></td>
                        <td><?php echo $t->p ?></td>
                        <td>
                        <a class="btn btn-sm btn-warning" href="<?php echo base_url('parameter/editParameter/'.$t->id) ?>">Edit</a>
                        <a onclick="return confirm('Yakin Hapus?')" class="btn btn-sm btn-danger" href="<?php echo base_url('parameter/deleteParameter/'.$t->id) ?>">Delete</a>
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