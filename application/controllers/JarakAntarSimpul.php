<?php

class jarakAntarSimpul extends CI_Controller{
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
        $cek        = $this->db->query("SELECT * FROM penentuan_jalur WHERE username = '$username'")->result();
        if(count($cek) < 5){
          $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Silahkan Input Pentuan Jalur Min 5 Titik!!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>');
      redirect('penentuanJalur');
        }
      }
  }
  public function index(){
    $data['title']              = 'Jarak Antar Simpul';
    $username                   = $this->session->userdata('username');

    $data['t_penentuanJalur']   = $this->db->query("SELECT * FROM penentuan_jalur WHERE username = '$username'")->result();

    $data['t_jarakAntarSimpul']   = $this->db->query("SELECT * FROM jarak_antar_simpul WHERE username = '$username'")->result();

    $this->load->view('user/template/header',$data);
    $this->load->view('user/template/sidebar');
    $this->load->view('user/jarakAntarSimpul',$data);
    $this->load->view('user/template/footer');
  }
  public function tambahJarakAntarSimpul(){
    $data['title']              = 'Tambah Jarak Antar Simpul';
    $username                   = $this->session->userdata('username');

    $data['t_penentuanJalur']   = $this->db->query("SELECT * FROM penentuan_jalur WHERE username = '$username'")->result();

    $this->load->view('user/template/header',$data);
    $this->load->view('user/template/sidebar');
    $this->load->view('user/tambahjarakAntarSimpul',$data);
    $this->load->view('user/template/footer');
  }
  public function tambahJarakAntarSimpulAksi(){
    $username                   = $this->session->userdata('username');
    $pJalur                     = $this->db->query("SELECT * FROM penentuan_jalur WHERE username = '$username'")->result();

    $this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->tambahJarakAntarSimpul();
		}else{
      for ($i=1; $i <= count($pJalur)*count($pJalur) ; $i++) { 
        $titik1 				= $this->input->post('titik1'.$i);
        $titik2 		    = $this->input->post('titik2'.$i);
        $jarak 		      = $this->input->post('jarak'.$i);
        $data = array(
          'titik1' 						    => $titik1,
          'titik2' 				        => $titik2,
          'jarak' 				        => $jarak,
          'username'              => $username,
        );

        $this->ColonyModel->insert_data($data,'jarak_antar_simpul');
      }
			

      $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil ditambahkan!</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

      redirect('jarakAntarSimpul');
      
    }
  }
  public function deleteJarakAntarSimpul(){
    $username = $this->session->userdata('username');
      $where = array(
          'username'      => $username,
      );
      $this->ColonyModel->delete_data($where,'jarak_antar_simpul');
      $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Data Berhasil Dihapus!</strong>
      </div>');

      redirect('jarakAntarSimpul');
  }
  public function _rules(){
    $username                   = $this->session->userdata('username');
    $pJalur                     = $this->db->query("SELECT * FROM penentuan_jalur WHERE username = '$username'")->result();
    
    for ($i=1; $i <= count($pJalur)*count($pJalur); $i++) { 
      $this->form_validation->set_rules('jarak'.$i,'Jarak','required');
    }
  }
}

?>