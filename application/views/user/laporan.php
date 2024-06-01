<!-- Begin Page Content Jarak Antar Simpul -->
<div class="container-fluid">

<?php echo $this->session->flashdata('pesan') ?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Jarak Antar Simpul</h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Dari Ke</th>
                        <?php foreach($t_penentuanJalur as $t) : ?>
                        <th><?php echo $t->simbol ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                
                <tbody>
                <?php foreach($t_penentuanJalur as $tp) : ?>
                    <?php $jas = $this->db->query("SELECT * FROM jarak_antar_simpul WHERE titik1 = '$tp->simbol' && username = '$username'")->result() ?>
                    <tr>
                        <td><?php echo $tp->simbol ?></td>
                        <?php foreach($jas as $j) : ?>
                            <td><?php echo $j->jarak ?></td>
                            <?php endforeach; ?>
                   </tr>
                   <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

<!-- Begin Page Content Visibilitas Antar Simpul-->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Visibilitas Antar Simpul</h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Dari Ke</th>
                        <?php foreach($t_penentuanJalur as $t) : ?>
                        <th><?php echo $t->simbol ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                
                <tbody>
                <?php foreach($t_penentuanJalur as $tp) : ?>
                    <?php $jas = $this->db->query("SELECT * FROM jarak_antar_simpul WHERE titik1 = '$tp->simbol' && username = '$username'")->result() ?>
                    <tr>
                        <td><?php echo $tp->simbol ?></td>
                        <?php foreach($jas as $j) : ?>
                            <td><?php echo round(@(1/$j->jarak),3) ?></td>
                            <?php endforeach; ?>
                   </tr>
                   <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

<!-- Begin Page Content Perubahan Intensitas Jejak Semut-->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Perubahan Intensitas Jejak Semut</h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Dari Ke</th>
                        <?php foreach($t_penentuanJalur as $t) : ?>
                        <th><?php echo $t->simbol ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($t_penentuanJalur as $tp) : ?>
                    <?php $jas = $this->db->query("SELECT * FROM jarak_antar_simpul WHERE titik1 = '$tp->simbol' && username = '$username'")->result() ?>
                    <tr>
                        <td><?php echo $tp->simbol ?></td>
                        <?php foreach($jas as $j) : ?>
                            <?php if ($j->titik1 == $j->titik2) {
                                $nilai = 0;
                            } else {
                                $nilai = 1;
                            } ?>
                            <td><?php echo round($perubahanIntensitas*$nilai,3) ?></td>
                        <?php endforeach; ?>
                   </tr>
                   <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

<!-- Begin Page Content Intensitas Jejak Kaki Semut Awal-->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Intensitas Jejak Kaki Semut Awal</h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Dari Ke</th>
                        <?php foreach($t_penentuanJalur as $t) : ?>
                        <th><?php echo $t->simbol ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($t_penentuanJalur as $tp) : ?>
                    <?php $jas = $this->db->query("SELECT * FROM jarak_antar_simpul WHERE titik1 = '$tp->simbol' && username = '$username'")->result() ?>
                    <tr>
                        <td><?php echo $tp->simbol ?></td>
                        <?php foreach($jas as $j) : ?>
                            <?php if ($j->titik1 == $j->titik2) {
                                $nilai = 0;
                            } else {
                                $nilai = 1;
                            } ?>
                            <td><?php echo round($nilaiTij*$nilai,3) ?></td>
                        <?php endforeach; ?>
                   </tr>
                   <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

<!-- Begin Page Content Intensitas Jejak Kaki(Tij) Rute Kunjungan-->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Intensitas Jejak Kaki(Tij) Rute Kunjungan</h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Dari Ke</th>
                        <?php foreach($t_penentuanJalur as $t) : ?>
                        <th><?php echo $t->simbol ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($t_penentuanJalur as $tp) : ?>
                    <?php $jas = $this->db->query("SELECT * FROM jarak_antar_simpul WHERE titik1 = '$tp->simbol' && username = '$username'")->result() ?>
                    <tr>
                        <td><?php echo $tp->simbol ?></td>
                        <?php foreach($jas as $j) : ?>
                            <?php if ($j->titik1 == $j->titik2) {
                                $nilai = 0;
                            } else {
                                $nilai = 1;
                            } ?>
                            <td><?php echo round($nilaiKunjungan*$nilai,3) ?></td>
                        <?php endforeach; ?>
                   </tr>
                   <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

<!-- Begin Page Content Nilai Probabilitas Antar Simpul-->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Nilai Probabilitas Antar Simpul</h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Dari Ke</th>
                        <?php foreach($t_penentuanJalur as $t) : ?>
                        <th><?php echo $t->simbol ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                <?php $sm=array(); $nl=array(); foreach($t_penentuanJalur as $tj => $tp) : ?>
                    <?php  $jas = $this->db->query("SELECT * FROM jarak_antar_simpul WHERE titik1 = '$tp->simbol' && username = '$username'")->result() ?>
                    <?php $nVK=0; $nV=0; $nK=0; foreach($jas as $js) :  ?>
                        <?php if ($js->titik1 == $js->titik2) {
                                $ni = 0;
                            } else {
                                $ni = 1;
                            } ?>
                        <?php 
                        
                            if($js->jarak == 0){
                                $nV     += 0;
                            } else {
                                $nV     +=  pow((1/$js->jarak),$nilai_B)*pow(($nilaiKunjungan*$ni),$nilai_a);
                            }
                            
                            //$nK     += (($nilaiKunjungan*$ni));
                            //$nVK    += ($nK*$nV);
                         ?>
                        <?php endforeach; ?>
                    <tr>
                        <td><?php echo $tp->simbol ?></td>
                        <?php $sm[$tj]=0; $nl[$tj]=0; foreach($jas as $j) :?>
                            <?php if ($j->titik1 == $j->titik2) {
                                $nilai = 0;
                            } else {
                                $nilai = 1;
                            } ?>
                            <?php //$n = @(1/$j->jarak) ?>
                            <td><?php echo round(((pow($nilaiKunjungan,$nilai_a))*(pow(@(1/$j->jarak),$nilai_B))/$nV),3) ?></td>
                            <?php $nl[$tj] = ((pow($nilaiKunjungan,$nilai_a))*(pow(@(1/$j->jarak),$nilai_B))/$nV); ?>
                            <?php $sm[$tj] = $j->titik1.$j->titik2; ?>
                            <?php foreach($sm as $nn => $ll) : ?>
                                <?php //print_r(($sm[$nn])) ?>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                   </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<h3>Berdasarkan hasil perhitungan diatas dapat disumpulkan bahwa rute yang terpilih sebegai rute terbaik dari <?php echo $j_PTerbentuk ?> Rute adalah <?php if(empty($hasil_rute)){?> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">Input</button><?php } else { echo $h_rute ?><a href="<?php echo $url ?>" target="_blank"> Cek Map</a> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">Edit</button><?php  } ?></h3>
<!-- Modal -->
<form method="POST" action="<?php echo base_url('laporan/hasilPerjalananAksi') ?>">
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Hasil Perjalanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="modal-body">
                <div class="form-group">
                    <label>Masukan Hasil Perjalanan</label>
                    <input type="text" name="hasil" class="form-control" placeholder="A-B-C-D-E-F-G-H-A"/>                  
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- Menyisipkan library Google Maps -->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZ8w11dYg35csoLlKJBVy12Yfzt_cnGuA&callback=initialize" async defer>
</script>
<script>    
    var marker;
    function initialize() {  
        // Variabel untuk menyimpan informasi (desc)
        var infoWindow = new google.maps.InfoWindow;
        //  Variabel untuk menyimpan peta Roadmap
        var mapOptions = {
            mapTypeId: google.maps.MapTypeId.ROADMAP
        } 
        // Pembuatan petanya
        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);      
        // Variabel untuk menyimpan batas kordinat
        var bounds = new google.maps.LatLngBounds();
        // Pengambilan data dari database
        <?php
            $mapp = $this->db->query("SELECT * FROM penentuan_jalur WHERE username = '$username'")->result();
            foreach($mapp as $m) :
                echo ("addMarker($m->latitude, $m->longitude, '$m->simbol');\n");
            endforeach;
            //while ($data = mysql_fetch_array($query)) {
                //$nama    =$data['nama_provinsi'];
                //$lat    =$data['latitude'];
                //$lon    =$data['longitude'];
                //echo ("addMarker($lat, $lon, '$nama');\n");                        
            //}    
        ?> 
        // Proses membuat marker 
        function addMarker(lat, lng, info) {
            var lokasi = new google.maps.LatLng(lat, lng);
            bounds.extend(lokasi);
            var marker = new google.maps.Marker({
                map: map,
                position: lokasi
            });       
            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow, info);
         }    
        // Menampilkan informasi pada masing-masing marker yang diklik
        function bindInfoWindow(marker, map, infoWindow, html) {
            google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }
        var directionsService = new google.maps.DirectionsService();
        var directionsDisplay = new google.maps.DirectionsRenderer();
        directionsDisplay.setMap(map);
        var start = new google.maps.LatLng(-5.123790205771314, 119.4088597961251); // Ganti dengan koordinat titik awal rute yang diinginkan
        var end = new google.maps.LatLng(-5.121767294484176, 119.41018759331297); // Ganti dengan koordinat titik akhir rute yang diinginkan
        var request = {
            origin: start,
            destination: end,
            travelMode: google.maps.TravelMode.DRIVING // Ganti dengan mode perjalanan yang diinginkan (DRIVING, WALKING, BICYCLING, atau TRANSIT)
        };
        directionsService.route(request, function(result, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(result);
            }
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
<div id="map-canvas" style="width:100%;height:500px;"></div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
