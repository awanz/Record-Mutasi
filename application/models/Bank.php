<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Bank extends CI_Model {

    function addMasterBank($dataPost)
    {
      $this->db->insert('master_bank', $dataPost);
      $result = $this->db->insert_id();
      return  $result;
    }

    function getAllMasterBank()
    {
		  return $this->db->get('master_bank');
    }

    function getMasterBankById($id)
    {
		  return $this->db->get_where('master_bank', array('master_bank_id'=>$id));
    }
    
    function getMasterBankStatusAktif()
    {
		  return $this->db->get_where('master_bank', array('status' => 1));
    }

    function updateMasterBank($id, $dataPost)
    {
		  $this->db->where('master_bank_id', $id);
      $result = $this->db->update('master_bank', $dataPost);
      return $result; 
    }

    function deleteMasterBank($id)
    {
			$this->db->where('master_bank_id', $id);
			$result = $this->db->delete('master_bank');
      return $result; 
    }
    
    function updateScrapeBank($id, $status)
    {
      $date = new DateTime();
      $this->db->where('master_bank_id', $id);
      $this->db->set('last_scrape', 'NOW()', FALSE);
      $this->db->set('last_scrape_status', $status);
      $result = $this->db->update('master_bank');
      return $result; 
    }
}