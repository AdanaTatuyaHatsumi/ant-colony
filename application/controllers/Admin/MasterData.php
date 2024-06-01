<?php

class MasterData extends CI_Controller{
    public function __construct(){
		parent::__construct();
		if($this->session->userdata('hak_akses') != 'admin'){

			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  <strong>Anda belum login</strong>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>');
				redirect('welcome');
        }
	}
    public function index(){
        $data['title']      = 'Admin - Master Data';
        $data['t_master']   = $this->db->query("SELECT * FROM user")->result();

        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/masterData',$data);
        $this->load->view('admin/template/footer');
    }
    public function editMasterData(){
        
    }
}

?>