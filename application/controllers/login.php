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
	function index()
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
	
	function submit()
	{
		// carrega 'model' do usuário
		$this->load->model('Usuario_model');

		$this->form_validation->set_rules('username', 'Usuário', 'required');
		$this->form_validation->set_rules('password', 'Senha', 'required');
		
		
		if( $this->form_validation->run() == FALSE ) {
			
			$this->index();
			
		} else {
			
			$query = $this->Usuario_model->login();

			if( $query ) {

				$session_data = array(
					'username' => $this->input->post('username'),
					'logged_in' => true
				);

				$this->session->set_userdata($session_data);
				redirect('admin/index', $session_data);
				
			} else {
				// redirecionar para área restrita
				$this->index();
			}				
		}
	}


    function signup()
    {
        $data['title'] = 'Cadastro';
        $data['action'] = 'login/do_signup';

        $this->load->view('header_view', $data);
        $this->load->view('login/signup', $data);
        $this->load->view('footer_view');


    }
	/**
	 * Valida o usuário de acordo com o nível de acesso.
	 * admin = super
	 * user = user
	 */
	private function _validate_user()
	{
		$logged = $this->session->userdata('logged_in');
		
		if( !isset($logged) || $logged != true ) {
			return false;
		} else {
			return $logged; // or true?
		}	
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		$this->index();		
	}
	
}
