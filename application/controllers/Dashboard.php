<?php

class Dashboard extends CI_Controller{
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

        $data['title'] = 'Dashboard';

        $this->load->view('user/template/header',$data);
        $this->load->view('user/template/sidebar');
        $this->load->view('user/dashboard');
        $this->load->view('user/template/footer');
    }
}

?>