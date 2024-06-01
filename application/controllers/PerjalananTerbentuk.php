<?php

class PerjalananTerbentuk extends CI_Controller{
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
            $cek        = $this->db->query("SELECT * FROM parameter WHERE username = '$username'")->result();
            if(empty($cek)){
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  <strong>Silahkan Input Data Prameter Terlebih Dahulu!</strong>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>');
				redirect('parameter');
            }
        }
	}
    public function index(){
        $data['title']              = 'Perjalanan Terbentuk';
        $username                   = $this->session->userdata('username');

        $data['t_perjalananTerbentuk']   = $this->db->query("SELECT * FROM perjalanan_terbentuk WHERE username = '$username'")->result();

        $this->load->view('user/template/header',$data);
        $this->load->view('user/template/sidebar');
        $this->load->view('user/perjalananTerbentuk',$data);
        $this->load->view('user/template/footer');
    }
    public function tambahPerjalananTerbentuk(){
        $data['title']              = 'Tambah Perjalanan Terbentuk';

        $this->load->view('user/template/header',$data);
        $this->load->view('user/template/sidebar');
        $this->load->view('user/tambahPerjalananTerbentuk',$data);
        $this->load->view('user/template/footer');
    }
    public function tambahPerjalananTerbentukAksi(){
        $this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->tambahPenentuanJalur();
		}else{
            $username       = $this->session->userdata('username');
			$perjalanan 				= $this->input->post('perjalanan');
            $cek                        = $this->db->query("SELECT * FROM perjalanan_terbentuk WHERE perjalanan = '$perjalanan' && username = '$username'")->result();
            if (!empty($cek)) {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Data Perjalanan Sudah Ada Sebelumnya!</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');

                redirect('perjalananTerbantuk/tambahPerjalananTerbentuk');
            } else {
                $jarak 		    = $this->input->post('jarak');

                $data = array(
                'perjalanan' 				=> $perjalanan,
                'jarak' 				    => $jarak,
                'username'                  => $username,
                );

                $this->ColonyModel->insert_data($data,'perjalanan_terbentuk');
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data berhasil ditambahkan!</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');

                redirect('perjalananTerbentuk');
            }
        }
    }
    public function editPerjalananTerbentuk($id){
        $data['title']                  = 'Edit Perjalanan Terbentuk';
        $data['e_perjalananTerbentuk']  = $this->db->query("SELECT * FROM perjalanan_terbentuk WHERE id = '$id'")->result();

        $this->load->view('user/template/header',$data);
        $this->load->view('user/template/sidebar');
        $this->load->view('user/editPerjalananTerbentuk',$data);
        $this->load->view('user/template/footer');
    }
    public function editPerjalananTerbentukAksi(){
        $this->_rules();

        $id 				= $this->input->post('id');

		if($this->form_validation->run() == FALSE){
			$this->tambahPerjalananTerbentu($id);
		}else{
			$perjalanan     = $this->input->post('perjalanan');
            $jarak 		    = $this->input->post('jarak');
            $username       = $this->session->userdata('username');

            $data = array(
                'perjalanan' 				=> $perjalanan,
                'jarak' 				    => $jarak,
                'username'                  => $username,
            );
            $where = array(
                'id'                        => $id,
            );

            $this->ColonyModel->update_data('perjalanan_terbentuk',$data,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Data berhasil diupdate!</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');

            redirect('perjalananTerbentuk');
        }
    }
    public function deletePerjalananTerbentuk($id){
        $username = $this->session->userdata('username');
        $where = array(
            'id'            => $id,
            'username'      => $username,
        );
        $this->ColonyModel->delete_data($where,'perjalanan_terbentuk');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Dihapus!</strong>
        </div>');

        redirect('perjalananTerbentuk');
    }
    public function _rules(){
        $this->form_validation->set_rules('perjalanan','Perjalanan Terbantuk','required');
        $this->form_validation->set_rules('jarak','total jarak','required');
    }
}

?>