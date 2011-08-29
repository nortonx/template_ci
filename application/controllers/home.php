<?php
class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}
	
    public function index()
    {
        $this->load->library('user_agent');

        $data['title'] = 'Initial Controller';
        $data['action'] = 'none';
        $data['userdata'] = $this->agent->browser();
		$data['main_content'] = 'home/index';

		$this->load->view('includes/template', $data);

    }
}
