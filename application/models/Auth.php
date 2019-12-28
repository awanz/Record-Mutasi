<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Model {

	function login($dataPost)
	{
        $login = $this->db->get_where('users', $dataPost);
        
        if($login->row_array() > 0){
            $this->db->select('user_id, jabatan, profile_picture, role, status, full_name');
            $this->db->where('username', $dataPost['username']);
            $this->db->where('password', $dataPost['password']);
            $query = $this->db->get('users')->row_array();
			return $query; 
		}else{
			return 0;
		}
    }

    function updateLogin($user_id)
	{
        $date = new DateTime();
        $this->db->where('user_id', $user_id);
        $this->db->set('last_login', 'NOW()', FALSE);
        $result = $this->db->update('users');
        return $result; 
    }
    
}