<?php
class Admin extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->_validate_admin();
		$this->load->library('form_validation');
	}

	/**
	 *  Display Login Form
	 */
	public function index() {
		
		// Validate user input data
		$this->form_validation->set_rules('username', 'Uername', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		$data['title'] = 'Restricted Area';
		$data['action'] = base_url() . 'admin/login';
		
		if( $this->form_validation->run() == FALSE ) {
			$data['main_content'] = 'admin/index';
			$this->load->view('includes/template', $data);
		} else {
			$data['main_content'] = 'admin/home';
			$this->load->view('includes/template', $data);
		}
	}
	
	public function login()	{
		
		$this->load->model('User_model');
		
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);
		
		$query = $this->Usuario_model->login( $data );
		
		if( $query ) {
			
			$session_data = array(
				'username' => $this->input->post('username'),
				'logged_in' => true
			);
			
			$this->session->set_userdata($session_data);
			redirect('admin/home');
			
		} else {
			$this->index();
		}
	}
		
	/**
	 * validates user (check if login/password is valid and on database)
	 */
	private function _validate_admin() {
		
		$logged = $this->session->userdata('logged_in');
		
		if( !isset($logged) || $logged != true ) {
			return false;
			
		} else {
			return $logged;
		}
	}
	
	public function home() {
		
		$this->load->model('Usuario_model');
		
		$data['title'] = 'Restricted Area';
		$data['action'] = '';
		
		$logged = $this->_validate_admin();
		
		if( $logged ) {
			$data['inicio'] = 'Login worked!';
			
			$data['action'] = '';
			$data['main_content'] = 'admin/home';
			
			$this->load->view('includes/template', $data);
			
		} else {
			// test it
			$this->index();
		}
	}
		
	/**
	 * Logout user
	 */
	public function logout() {
		$this->session->sess_destroy();
		$this->index();	
	}
	
	public function lista()	{
		
		$logged = $this->_validate_admin();
		
		$data['title'] = 'Área restrita: ' . $this->session->userdata('username');
		$data['action'] = 'none';
		$data['inicio'] = '';
		
		if( $logged ) {
			$this->load->view('header_view', $data);
			$this->load->view('menu_view');
			$this->load->view('admin/inicio', $data);
			$this->load->view('footer_view');
		} else {
			redirect('admin/login_error');
		}
	}
	
	/**
	 * @todo save all form data via post
	 */
	public function save() {
		$data['title'] = 'Salvando...';
		$data['action'] = '';
		$data['userdata'] = $this->agent->browser() . " - " . $this->agent->version();
		
		$logged = $this->_validate_admin();
		
		if( $logged ) {
			
			$data['imovel_title'] = $this->input->post('imovel_title');
			$data['desc'] = $this->input->post('imovel');
			
			$this->load->view('header_view', $data);
			$this->load->view('menu_view');
			$this->load->view('');
			$this->load->view('footer_view');
			
		} else {
			$this->index();
		}
		
	}	
}