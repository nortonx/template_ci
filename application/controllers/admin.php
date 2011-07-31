<?php
class Admin extends CI_Controller {
	
	/**
	 * Página inicial do admin (depois de ter sido autenticado)
	 */
	 
	function index()
	{
		$data['title'] = 'Área Restrita - Index';
		$data['action'] = 'admin/actionName';
		$data['message'] = 'Ok!';
		
		$this->load->view('header_view', $data);
	//	$this->load->view('menu_view');
		$this->load->view('admin/index', $data);
		$this->load->view('footer_view');
		
	}
	
	function inicio()
	{
		
		$data['title'] = 'Área restrita';
		
	}
}
