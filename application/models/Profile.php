<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends CI_Model {

	function getProfileById($user_id)
	{
        $this->db->select('user_id, username, role, full_name, gender, email, phone, profile_picture, jabatan');
        $this->db->where('user_id', $user_id);
        $result = $this->db->get('users')->row_array();
        return $result; 
    }
    
	function updateProfile($user_id, $dataPost)
	{
        $this->db->where('user_id', $user_id);
        $result = $this->db->update('users', $dataPost);
        return $result; 
    }

	function updatePhoto($user_id, $dataUpload)
	{
        $this->db->where('user_id', $user_id);
        $result = $this->db->update('users', array('profile_picture' => $dataUpload));
        return $result; 
    }

	function cekPassword($user_id, $password)
	{
        $this->db->select('user_id, username');
        $this->db->where('user_id', $user_id);
        $this->db->where('password', $password);
        $result = $this->db->get('users')->row_array();
        return $result; 
    }

	function updatePassword($user_id, $password)
	{
        $this->db->where('user_id', $user_id);
        $result = $this->db->update('users', array('password' => $password));
        return $result;
    }



    
}