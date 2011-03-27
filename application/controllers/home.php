<?php
class Home extends CI_Controller {



    function index()
    {
        $this->load->library('user_agent');

        $data['title'] = 'Página/Controller inicial';
        $data['action'] = 'none';
        $data['userdata'] = $this->agent->browser();

        $this->load->view('header_view', $data);
        $this->load->view('menu_view');
        $this->load->view('home/index', $data);
        $this->load->view('footer_view');

    }



}
