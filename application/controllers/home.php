<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		if(!$this->session->userdata('logged_in')){
			redirect('http://localhost:8080/todo/users/login/');
		}

		$role = $this->session->userdata('role');
		
		$data = array(
            'name' => $this->session->userdata('name'),
            'email' => $this->session->userdata('email'),
        );
		
		$this->load->view($this->getHeader($role));
		$this->load->view('home', $data);
		$this->load->view('templates/footer');
	}

	private function getHeader($role){
		if($role == 'administrator'){
			return 'templates/adminHeader';
		}
		return 'templates/header';
	}
}