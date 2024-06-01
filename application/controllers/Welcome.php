<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->load->view('halamanLogin');
		}else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$cek = $this->ColonyModel->cek_login($username, $password);
			if($cek == FALSE){
				$this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Username atau Password salah!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>');
				redirect('welcome');

			}else{
				$this->session->set_userdata('hak_akses',$cek->hak_akses);
				$this->session->set_userdata('username',$cek->username);
				$this->session->set_userdata('id',$cek->id);

				switch ($cek->hak_akses) {
					case 'admin' : redirect('admin/masterdata');						
						break;

					case 'user' : redirect('dashboard');						
						break;
				}
			}
		}
	}
	public function register(){

		$this->_rulesRegister();

		if($this->form_validation->run() == FALSE){
			$this->load->view('halamanRegister');
		}else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$repassword = $this->input->post('repassword');

			$cek = $this->db->query("SELECT * FROM user WHERE username = '$username'")->result();
			if(!empty($cek)){
				$this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Username sudah ada!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>');
				redirect('welcome/register');

			}elseif($password != $repassword){
				$this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Password tidak sama!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>');
				redirect('welcome/register');

			}else{
				$hak_akses 	= 'user';

				$data 	= array(
					'username'		=>	$username,
					'password'		=>	$password,
					'hak_akses'		=>	$hak_akses,
				);
				
				$this->ColonyModel->insert_data($data,'user');
                $this->session->set_flashdata('pesan','<div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Register telah berhasil!</strong>
                </div>');
                redirect('welcome');
			}
		}
	}
	public function _rules(){
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('password','password','required');
	}
	public function _rulesRegister(){
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('password','password','required');
		$this->form_validation->set_rules('repassword','repassword','required');
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('welcome');
	}
}
