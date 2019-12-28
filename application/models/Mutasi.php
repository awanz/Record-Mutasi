<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mutasi extends CI_Model {

    function getAllMutasi()
    {
        return $this->db->get('record_mutasi');
    }

    function addMutasi($dataArray)
    {
        $this->db->insert('record_mutasi', $dataArray);
        $result = $this->db->insert_id();
        return  $result;
    }

    function getMutasiById($id)
    {
        return $this->db->get_where('record_mutasi', array('id'=>$id));
    }

    function cekDuplikatData($arrayData)
    {
        return $this->db->get_where('record_mutasi', $arrayData)->row_array();
    }
    
    function getOlahData($bank_name, $start_date, $end_date)
    {
        if(!empty($start_date)){
            $this->db->where('waktu >=', $start_date);
            $this->db->where('waktu <=', $end_date);
        }

        if($bank_name != 'ALL'){
            $this->db->where('bank_name', $bank_name);
        }
        $result = $this->db->get('record_mutasi');

        return $result;
    }

}