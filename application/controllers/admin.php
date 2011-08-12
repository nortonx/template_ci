<?php
class Admin extends CI_Controller {
	
	/**
	 * Página inicial do admin (depois de ter sido autenticado)
	 */
	 
	function __construct() {
		parent::__construct();
	}
	
	function index()
	{
		$data['title'] = 'Área Restrita - Index';
		$data['action'] = 'admin/actionName';
		$data['message'] = 'Ok!';
		
		if(!empty($data['session_data'])) {
			$this->load->view('header_view', $data);
			//	$this->load->view('menu_view');
			$this->load->view('admin/index', $data);
			$this->load->view('footer_view');	
		} else {
			$this->load->view('header_view', $data);
			$this->load->view('admin/index');
			$this->load->view('footer_view');
		}
		
	}
	
	function inicio()
	{
		$this->load->model('Usuario_model');
		$data['title'] = 'Área restrita';
		
	}
}
