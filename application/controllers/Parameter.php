<?php

class Parameter extends CI_Controller{
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
        $data['title']              = 'Parameter';
        $username                   = $this->session->userdata('username');

        $data['t_Parameter']   = $this->db->query("SELECT * FROM parameter WHERE username = '$username'")->result();

        $this->load->view('user/template/header',$data);
        $this->load->view('user/template/sidebar');
        $this->load->view('user/parameter',$data);
        $this->load->view('user/template/footer');
    }
    public function tambahParameter(){
        $data['title']              = 'Tambah Parameter';

        $this->load->view('user/template/header',$data);
        $this->load->view('user/template/sidebar');
        $this->load->view('user/tambahParameter',$data);
        $this->load->view('user/template/footer');
    }
    public function tambahParameterAksi(){
        $this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->tambahParameter();
		}else{
			
            $Q 		            = $this->input->post('Q');
            $Tij 		        = $this->input->post('Tij');
            $a 		            = $this->input->post('a');
            $B 		            = $this->input->post('B');
            $p 		            = $this->input->post('p');
            $username           = $this->session->userdata('username');

            $data = array(
              'Q' 				        => $Q,
              'Tij' 				    => $Tij,
              'a' 				        => $a,
              'B' 				        => $B,
              'p' 				        => $p,
              'username'                => $username,
            );

            $this->ColonyModel->insert_data($data,'parameter');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Data berhasil ditambahkan!</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');

            redirect('parameter');
        }
      
    }
    public function editParameter($id){
        $data['title']              = 'Edit Parameter';
        $data['e_Parameter']         = $this->db->query("SELECT * FROM parameter WHERE id = '$id'")->result();

        $this->load->view('user/template/header',$data);
        $this->load->view('user/template/sidebar');
        $this->load->view('user/editParameter',$data);
        $this->load->view('user/template/footer');
    }
    public function editParameterAksi(){
        $this->_rules();

      $id             = $this->input->post('id');

      if($this->form_validation->run() == FALSE){
        $this->editParameter($id);
      }else{
        $Q 		            = $this->input->post('Q');
        $Tij 		        = $this->input->post('Tij');
        $a 		            = $this->input->post('a');
        $B 		            = $this->input->post('B');
        $p 		            = $this->input->post('p');
        $username           = $this->session->userdata('username');

        $data = array(
            'Q' 				        => $Q,
            'Tij' 				        => $Tij,
            'a' 				        => $a,
            'B' 				        => $B,
            'p' 				        => $p,
            'username'                  => $username,
        );

        $this->ColonyModel->update_data('parameter',$data,$where);
        $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Data berhasil diupdate!</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>');

        redirect('parameter');
          
        }
    }
    public function deleteParameter($id){
        $username = $this->session->userdata('username');
        $where = array(
            'id'            => $id,
            'username'      => $username,
        );
        $this->ColonyModel->delete_data($where,'parameter');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Dihapus!</strong>
        </div>');

        redirect('parameter');
    }
    public function _rules(){
        $this->form_validation->set_rules('Q','Q','required');
        $this->form_validation->set_rules('Tij','Tij','required');
        $this->form_validation->set_rules('a','a','required');
        $this->form_validation->set_rules('B','B','required');
        $this->form_validation->set_rules('p','p','required');
    }
}

?>