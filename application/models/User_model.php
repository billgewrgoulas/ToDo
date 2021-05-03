<?php
	class User_model extends CI_Model{
		public function register($enc_password){
			// User data array
			$data = array(
				'name' => $this->input->post('name'),
                'lastName' => $this->input->post('lastName'),
				'email' => $this->input->post('email'),
                'password' => $enc_password,
                'role' => 'customer'
			);

			// Insert user
			return $this->db->insert('users', $data);
		}

		public function login($email, $password){
			$this->db->where('email', $email);
			$this->db->where('password', $password);

			$result = $this->db->get('users');

			if($result->num_rows() == 1){
				return $result->row(0);
			} else {
				return false;
			}
		}

		public function get_user($id){
			$this->db->where('id', $id);
			return $this->db->get('users')->row(0);
		}
        
		public function get_users(){
			$query = $this->db->get_where('users', array('role'=>'customer'));
        	return $query->result_array();
		}

        public function update_info($id){
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'lastName' => $this->input->post('lastName'),
            );

			$pswd = $this->input->post('password');
			if($pswd){
				$enc_password = md5($pswd);
				$data['password'] = $enc_password;
			}
			
            $this->db->where('id', $id);
            return $this->db->update('users', $data);
        }

		public function delete_user($id){
			$this->db->where('id', $id);
			$this->db->delete('users');
			$this->db->where('userId', $id);
			$this->db->delete('comments');
			return TRUE;
		}
	}