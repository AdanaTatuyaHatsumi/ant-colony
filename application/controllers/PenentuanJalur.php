<?php 

class PenentuanJalur extends CI_Controller{
    public function __construct(){
		parent::__construct();
		if($this->session->userdata('hak_akses') != 'user'){

			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  <strong>Anda belum login</strong>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>');
				redirect('welcome');
        }
	}
    public function index(){
        $data['title']              = 'Penentuan Jalur';
        $username                   = $this->session->userdata('username');

        $data['t_penentuanJalur']   = $this->db->query("SELECT * FROM penentuan_jalur WHERE username = '$username' ORDER BY simbol ASC")->result();

        $this->load->view('user/template/header',$data);
        $this->load->view('user/template/sidebar');
        $this->load->view('user/penentuanJalur',$data);
        $this->load->view('user/template/footer');
    }
    public function tambahPenentuanJalur(){
        $data['title'] = 'Tambah Penentuan Jalur';

        $this->load->view('user/template/header',$data);
        $this->load->view('user/template/sidebar');
        $this->load->view('user/tambahpenentuanJalur');
        $this->load->view('user/template/footer');
    }
    public function tambahPenentuanJalurAksi(){
        $this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->tambahPenentuanJalur();
		}else{
			$simbol 				= $this->input->post('simbol');
      $username       = $this->session->userdata('username');
      $cek            = $this->db->query("SELECT * FROM penentuan_jalur WHERE simbol = '$simbol' && username = '$username'")->result();
      if (!empty($cek)) {
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Data Simbol Sudah Ada Sebelumnya!</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');

            redirect('penentuanJalur/tambahPenentuanJalur');
      } else {
            $keterangan 		= $this->input->post('keterangan');
            $latitude 		  = $this->input->post('latitude');
            $longitude 		  = $this->input->post('longitude');
            

            $data = array(
              'simbol' 						    => $simbol,
              'keterangan' 				    => $keterangan,
              'latitude' 				      => $latitude,
              'longitude' 				    => $longitude,
              'username'              => $username,
            );

            $this->ColonyModel->insert_data($data,'penentuan_jalur');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Data berhasil ditambahkan!</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');

            redirect('penentuanJalur');
        }
      }
    }
    public function editPenentuanJalur($id){
        $data['title']            = 'Edit Penentuan Jalur';

        $data['e_penentuanJalur'] = $this->db->query("SELECT * FROM penentuan_jalur WHERE id = '$id'")->result(); 

        $this->load->view('user/template/header',$data);
        $this->load->view('user/template/sidebar');
        $this->load->view('user/editpenentuanJalur');
        $this->load->view('user/template/footer');
    }
    public function editPenentuanJalurAksi(){
      $this->_rules();

      $id             = $this->input->post('id');

      if($this->form_validation->run() == FALSE){
        $this->editPenentuanJalur($id);
      }else{
        $simbol 				= $this->input->post('simbol');
        $keterangan 		= $this->input->post('keterangan');
        $latitude 		  = $this->input->post('latitude');
        $longitude 		  = $this->input->post('longitude');

        $data = array(
          'simbol' 						    => $simbol,
          'keterangan' 				    => $keterangan,
          'latitude' 				      => $latitude,
          'longitude' 				    => $longitude,
        );

        $where = array(
          'id'                    => $id,
        );

        $this->ColonyModel->update_data('penentuan_jalur',$data,$where);
        $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Data berhasil diupdate!</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>');

        redirect('penentuanJalur');
          
      }
    }
    public function deletePenentuanJalur($id){
      $username = $this->session->userdata('username');
      $where = array(
          'id'            => $id,
          'username'      => $username,
      );
      $this->ColonyModel->delete_data($where,'penentuan_jalur');
      $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Data Berhasil Dihapus!</strong>
      </div>');

      redirect('penentuanJalur');
    }
    public function _rules(){
        $this->form_validation->set_rules('simbol','Simbol','required');
        $this->form_validation->set_rules('keterangan','Keterangan','required');
        $this->form_validation->set_rules('latitude','latitude','required');
        $this->form_validation->set_rules('longitude','Keterangan','required');
    }
}

?>