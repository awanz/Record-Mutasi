<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Model {

  function addUsers($dataPost)
  {
    $this->db->insert('users', $dataPost);
    $result = $this->db->insert_id();
    return  $result;
  }

  function getAllUsers()
  {
    return $this->db->get('users');
  }

  function getUsersById($user_id)
  {
    $this->db->select('*');
    $this->db->where('user_id', $user_id);
    $result = $this->db->get('users')->row_array();
    return $result; 
  }

  function updateUsers($id, $dataPost)
  {
    $this->db->where('user_id', $id);
    $result = $this->db->update('users', $dataPost);
    return $result; 
  }

  function deleteUsers($id)
  {
    $this->db->where('user_id', $id);
    $result = $this->db->delete('users');
    return $result; 
  }
}