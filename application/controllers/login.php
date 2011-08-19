<?php
/**
 * Possui funções de autenticação e validação de login.
 */
class Login extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('database');
		$this->_validate_user();
	}
		
	/**
	 * Exibe formulário de login
	 */
	public function index()
	{
		//$this->load->library('database');
		
		$data['title'] = 'Login - Área Restrita';
		$data['action'] = base_url() . 'login/submit';
		$data['message'] = 'Bem vindo';
		
		$this->load->view('header_view', $data);
		// $this->load->view('menu_view');
		$this->load->view('login/index', $data);
		$this->load->view('footer_view');
				
	}
	
	// Verifica se o usuário tem autorização para entrar no sistema.
	public function validate_credentials() {
		
		$this->load->model('Usuario_model');
		$query = $this->Usuario_model->validate();
		
		if($query) {
			$data = array(
				'username' => $this->input->post('username'),
				'is_logged_in' => true
			);
			
			$this->session->set_userdata($data);
			redirect('admin/inicio');
		} else {
			$this->index();
		}
	}	
	
	public function logout()
	{
		$this->session->sess_destroy();
		$this->index();		
	}
	
}
