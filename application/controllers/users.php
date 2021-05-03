<?php

class Users extends CI_Controller{
    // Register user
    public function register(){
        $data['title'] = 'Sign Up';

        //forward authentication
        if($this->session->userdata('logged_in')){
            redirect('http://localhost:8080/todo/home/');
        }

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('lastName', 'lastName', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

        if($this->form_validation->run() === FALSE){
            $this->load->view('users/register', $data);
        } else {
            
            $enc_password = md5($this->input->post('password'));
            $this->user_model->register($enc_password);
            $email = $this->input->post('email');
            $user = $this->user_model->login($email, $enc_password);

            $this->init_session($user);
            redirect('http://localhost:8080/todo/home/');
        }
    }

    public function login(){
        $data['title'] = 'Sign In';

        //forward authentication
        if($this->session->userdata('logged_in')){
            redirect('http://localhost:8080/todo/home/');
        }

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() === FALSE){
            $this->load->view('users/login', $data);
        } else {

            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            $user = $this->user_model->login($email, $password);
            
            if($user){
                $this->init_session($user);
                redirect('http://localhost:8080/todo/home');
            } else {
                $this->session->set_flashdata('login_failed', 'Login is invalid');
                redirect('http://localhost:8080/todo/users/login/');
            }		
        }
    }

	public function logout(){
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('name');
        $this->session->unset_userdata('role');
		$this->session->unset_userdata('lastName');
		$this->session->unset_userdata('email');
        
		$this->session->set_flashdata('user_loggedout', 'You are now logged out');

		redirect('http://localhost:8080/todo/users/login/');
	}

    public function edit($id){

        //forward authentication
        if(!$this->session->userdata('logged_in')){
            redirect('http://localhost:8080/todo/home/');
        }

        $user = $this->user_model->get_user($id);
        $role = $this->session->userdata('role');

        if(!$user){
            show_404();
        }

        //customers can only edit themselves
        if($role === 'customer'){
            if($this->session->userdata('user_id') !== $id){
                show_404();
            }
        }

        $data = array(
            'title' => 'Edit '.$user->role,
            'name' => $user->name,
            'email' => $user->email,
            'lastName' => $user->lastName,
            'id' => $user->id
        );

        $this->load->view($this->getHeader($role));
        $this->load->view('users/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($id){

        //customers can only edit themselves
        $role = $this->session->userdata('role');
        if($role === 'customer'){
            if($this->session->userdata('user_id') !== $id){
                show_404();
            }
        }

        $data['title'] = 'update info';
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('lastName', 'lastName', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if($this->form_validation->run() === TRUE){
            $this->user_model->update_info($id);
            if($this->session->userdata('user_id') === $id){
                $user = $this->user_model->get_user($id);
                $this->init_session($user);
            }
            $this->session->set_flashdata('info_updated', 'Info_updated');
            redirect('http://localhost:8080/todo/users/edit/'.$id);
        } 
    }

    public function show(){
        $data['title'] = 'all customers';

        if(!$this->session->userdata('logged_in')){
            redirect('http://localhost:8080/todo/users/login/');
        }

        //only admins can see all the customers
        if($this->session->userdata('role') === 'customer'){
            show_404();
        }

        $data['users'] = $this->user_model->get_users();

        $this->load->view('templates/adminHeader');
        $this->load->view('customerPages/show', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id){
        
        if(!$this->session->userdata('logged_in')){
            redirect('http://localhost:8080/todo/users/login/');
        }

        if(!$this->session->userdata('role') === 'customer'){
            show_404();
        }

        $this->user_model->delete_user($id);
        $this->session->set_flashdata('customer_deleted', 'Customer Deleted');
        redirect('http://localhost:8080/todo/users/show/');
    }

    public function recover(){
        $data['title'] = 'My Comments'; 

        if($this->session->userdata('logged_in')){
            redirect('http://localhost:8080/todo/home/');
        }

        $this->load->view('users/recover');
    }

    private function init_session($user){
        $user_data = array(
            'user_id' => $user->id,
            'email' => $user->email,
            'name' => $user->name,
            'lastName' => $user->lastName,
            'role' => $user->role,
            'logged_in' => true
        );

        $this->session->set_userdata($user_data);
        $this->session->set_flashdata('user_registered', 'info updated');
    }

    private function getHeader($role){
        if($role == 'administrator'){
            return 'templates/adminHeader';
        }
        return 'templates/header';
    }

    public function check_email_exists($email){
		$this->form_validation->set_message('check_email_exists', 'email exists');
		if($this->user_model->check_email_exists($email)){
			return true;
		} else {
			return false;
		}
	}
}