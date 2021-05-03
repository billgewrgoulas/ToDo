<?php

class comment_model extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_comments($role, $userId){
        if($role === 'administrator'){
            $query = $this->db->get('comments');
            return $query->result_array();
        }
        $query = $this->db->get_where('comments', array('userId'=>$userId));
        return $query->result_array();
    }

    public function create_comment($id){

        $data = array(
            'title' => $this->input->post('title'),
            'body' => $this->input->post('body'),
            'userId' => $id
        );

        return $this->db->insert('comments', $data);
    }

    public function get_comment($com_id){
        $this->db->where('id', $com_id);
        return $this->db->get('comments')->row(0);
    }

    public function get_admin(){
        $comments = $this->db->select('*') //just grab everything for now
        ->from('users as t1')
        ->where('t1.role', 'customer')
        ->join('comments as t2', 't1.id = t2.userId', 'RIGHT')
        ->get();
        return $comments->result_array();
    }

    public function delete_comment($id, $role){
        $this->db->where('id', $id);
        if($role === 'customer'){
            return $this->customer_delete($this->session->userdata('user_id'));
        }
        return $this->admin_delete();
    }

    //delete by id
    private function admin_delete(){
		return $this->db->delete('comments');
    }

    //delete by (commentid, userid) makes sure that user deletes their own comment
    private function customer_delete($userId){
        $this->db->where('userId', $userId);
		return $this->db->delete('comments');
    }
}