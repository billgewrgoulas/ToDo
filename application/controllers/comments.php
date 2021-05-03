<?php
    class Comments extends CI_Controller{

		//get all for users
        public function index(){ //default will be index.php
            $data['title'] = 'My Comments'; //$page -> name of the view that is going to be displayed

            if(!$this->session->userdata('logged_in')){
				redirect('http://localhost:8080/todo/users/login/');
			}

            $role = $this->session->userdata('role');
            $userId = $this->session->userdata('user_id');

            $data['comments'] = $this->comment_model->get_comments($role, $userId);

            $this->load->view($this->getHeader($role));
            $this->load->view('comments/index', $data);
            $this->load->view('templates/footer');
        }

		//get by id
		public function get($userId){
			
			if(!$this->session->userdata('logged_in')){
				redirect('http://localhost:8080/todo/users/login/');
			}

			if($this->session->userdata('role') === 'customer'){
				return show_404();
			}

			$data['comments'] = $this->comment_model->get_comments('customer', $userId);
			$data['name'] = $this->user_model->get_user($userId)->name;

            $this->load->view($this->getHeader('administrator'));
            $this->load->view('comments/index', $data);
            $this->load->view('templates/footer');
			
		}

		//get for admins
		public function view(){
			if(!$this->session->userdata('logged_in')){
				redirect('http://localhost:8080/todo/users/login/');
			}

			if($this->session->userdata('role') === 'customer'){
				return show_404();
			}

			$data['comments'] = $this->comment_model->get_admin();

            $this->load->view($this->getHeader('administrator'));
            $this->load->view('comments/view', $data);
            $this->load->view('templates/footer');

		}

        public function create(){

			$data['title'] = 'New Comment';

            if(!$this->session->userdata('logged_in')){
				redirect('http://localhost:8080/todo/users/login/');
			}

			//only customers can create comments
			if($this->session->userdata('role') === 'administrator'){
				return show_404();
			}

			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('body', 'Body', 'required');
			$role = $this->session->userdata('role');

			if($this->form_validation->run() === FALSE){
				$this->load->view($this->getHeader($role));
				$this->load->view('comments/create', $data);
				$this->load->view('templates/footer');
			} else {
				$this->comment_model->create_comment($this->session->userdata('user_id'));
				// Set message
				redirect('http://localhost:8080/todo/comments/');
			}
        }

		public function delete($id){
			
			if(!$this->session->userdata('logged_in')){
				redirect('http://localhost:8080/todo/users/login/');
			}

			$result = $this->comment_model->delete_comment($id, $this->session->userdata('role'));
			if($result){
				$this->session->set_flashdata('comment_deleted', 'comment deleted');
			}else{
				$this->session->set_flashdata('comment_deleted', 'comment could not be deleted');
			}

			if($this->session->userdata('role') == 'customer'){
				redirect('http://localhost:8080/todo/comments/');
			}
			redirect('http://localhost:8080/todo/comments/view');
		}

		private function getHeader($role){
			if($role == 'administrator'){
				return 'templates/adminHeader';
			}
			return 'templates/header';
		}
    }