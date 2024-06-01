<?php

class Laporan extends CI_Controller{
    public function __construct(){
		parent::__construct();
		if($this->session->userdata('hak_akses') != 'user'){

			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  <strong>Anda belum login</strong>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>');
				redirect('welcome');
        } else {
            $username   = $this->session->userdata('username');
            $cek        = $this->db->query("SELECT * FROM perjalanan_terbentuk WHERE username = '$username'")->result();
            if(count($cek) <= 5){
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  <strong>Silahkan Input Min 5 Data</strong>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>');
				redirect('perjalananTerbentuk');
            }
        }
	}
    public function index(){
        $data['title']              = 'Laporan & Hasil';
        $username                   = $this->session->userdata('username');
        $data['username']           = $this->session->userdata('username');
        $data['t_penentuanJalur']   = $this->db->query("SELECT * FROM penentuan_jalur WHERE username = '$username'")->result();


        //<!--Proses Perhitungan-->
        $perubahanIntensitas        = 0; 
        $nilai_Q                    = 0;
        $p_terbentuk                = $this->db->query("SELECT * FROM perjalanan_terbentuk WHERE username = '$username'")->result();
        $data['j_PTerbentuk']       = count($p_terbentuk);    
        $parameter                  = $this->db->query("SELECT * FROM parameter WHERE username = '$username'")->result();
        foreach($parameter as $para) :
            $nilai_Q                = $para->Q;
            $nilai_Tij              = $para->Tij;
            $nilai_p                = $para->p;
            $nilai_a                = $para->a;
            $data['nilai_a']        = $para->a;
            $nilai_B                = $para->B;
            $data['nilai_B']        = $para->B;
        endforeach;
        foreach($p_terbentuk as $p) : 
            $perubahanIntensitas    = $perubahanIntensitas + ($nilai_Q/$p->jarak);
        endforeach;
        $nilaiKunjungan             = ($nilai_p*$nilai_Tij)+$perubahanIntensitas;
        //<!-- End Proses Perhitungan -->

        $data['perubahanIntensitas']= $perubahanIntensitas;
        $data['nilaiTij']           = $nilai_Tij;
        $data['nilaiKunjungan']     = ($nilai_p*$nilai_Tij)+$perubahanIntensitas;
        //$data['nilaiProbabilitas']  = ($nilaiKunjungan^$nilai_a)*($visibilitas^$nilai_B);

        $data['hasil_rute']         = $this->db->query("SELECT * FROM hasil WHERE username = '$username'")->result();
        $hasil_rute                 = $this->db->query("SELECT * FROM hasil WHERE username = '$username'")->result();
        $jalur='';
        foreach($hasil_rute as $hr) :
            $data['h_rute']         = $hr->hasil_rute;
            $hasil2 = str_replace("-",",",$hr->hasil_rute);
            $hasil3 = explode(",",$hasil2);
            for ($i=0; $i < count($hasil3); $i++) { 
                $cek_jalur = $this->db->query("SELECT * FROM penentuan_jalur WHERE simbol = '$hasil3[$i]' && username = '$username'")->result();
                
                foreach($cek_jalur as $cj) :
                    $jalur  .= $cj->latitude.',+'.$cj->longitude.'/';
                    
                endforeach;
                
            }
        endforeach;
        $data['url'] = 'https://www.google.com/maps/dir/'.$jalur.'data=!3m1!4b1!4m10!4m9!1m3!2m2!1d119.4088598!2d-5.1237902!1m3!2m2!1d119.4101876!2d-5.1217673!3e0?entry=ttu';
        
        $data['e_hasil'] = $this->db->query("SELECT * FROM hasil WHERE username = '$username'")->result();

        $this->load->view('user/template/header',$data);
        $this->load->view('user/template/sidebar');
        $this->load->view('user/laporan',$data);
        $this->load->view('user/template/footer');
    }
    public function hasilPerjalananAksi(){

        $hasil 				= $this->input->post('hasil');

		if(empty($hasil)){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Input Hasil tidak boleh Kosong!</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

      redirect('laporan');
			
            
      } else {

            $username       = $this->session->userdata('username');

            $data = array(
              'hasil_rute' 						    => $hasil,
              'username'                        => $username,
            );

            $cek_hasil = $this->db->query("SELECT * FROM hasil WHERE username = '$username'")->result();
            if (!empty($cek_hasil)) {
                $where = array(
                    'username'      => $username,
                );
                $this->ColonyModel->delete_data($where,'hasil');
            }

            $this->ColonyModel->insert_data($data,'hasil');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Data berhasil ditambahkan!</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');

            redirect('laporan');
        }
    }
}

?>