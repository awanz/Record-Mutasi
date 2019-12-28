<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BankController extends CI_Controller {

	public function index()
	{
		// data Session
		$userdata = $this->session->userdata('users');

		// data Master Bank
		$dataMasterBank = $this->Bank->getAllMasterBank()->result();

		if(isset($userdata)){
			$data['userdata'] = $userdata;
			$data['breadcrumb'] = "Master Bank";
			$data['dataMasterBank'] = $dataMasterBank;
			return view('bank.index', $data);
        }else{
			redirect('auth/login','refresh');
		}
	}
	
	public function add()
	{
		// data Session
		$userdata = $this->session->userdata('users');

		if($userdata['role'] != 1){
			redirect('dashboard','refresh');
		}

		if(isset($userdata)){
			$data['userdata'] = $userdata;
			$data['breadcrumb'] = "Add Master Bank";
			return view('bank.add', $data);
        }else{
			redirect('auth/login','refresh');
		}
	}
	
	public function add_post()
	{
		// data Session
		$userdata = $this->session->userdata('users');

		if($userdata['role'] != 1){
			redirect('dashboard','refresh');
		}

		// data Post
		$dataPost = $this->input->post();
		
		if(isset($userdata)){
			$addMasterBank = $this->Bank->addMasterBank($dataPost);
			if($addMasterBank > 0){
				$this->session->set_flashdata('alert_status', TRUE);
				$this->session->set_flashdata('alert_message', 'Tambah Master Bank Berhasil!');
				redirect('bank','refresh');
			}else{
				$this->session->set_flashdata('alert_status', FALSE);
				$this->session->set_flashdata('alert_message', 'Tambah Master Bank Gagal!');
				redirect('bank/add','refresh');
			}
        }else{
			redirect('auth/login','refresh');
		}
	}

	public function view($id)
	{
		// data Session
		$userdata = $this->session->userdata('users');

		$masterBank = $this->Bank->getMasterBankById($id)->row();

		if(isset($userdata)){
			$data['userdata'] = $userdata;
			$data['breadcrumb'] = "View Bank";
			$data['masterBank'] = $masterBank;
			$data['id'] = $id;
			return view('bank.view', $data);
        }else{
			redirect('auth/login','refresh');
		}
	}

	public function edit($id)
	{
		// data Session
		$userdata = $this->session->userdata('users');
		
		if($userdata['role'] != 1){
			redirect('dashboard','refresh');
		}

		$masterBank = $this->Bank->getMasterBankById($id)->row();

		if(isset($userdata)){
			$data['userdata'] = $userdata;
			$data['breadcrumb'] = "Edit Master Bank";
			$data['masterBank'] = $masterBank;
			$data['id'] = $id;
			return view('bank.edit', $data);
        }else{
			redirect('auth/login','refresh');
		}
	}
	
	public function edit_post($id)
	{
		// data Session
		$userdata = $this->session->userdata('users');
		
		if($userdata['role'] != 1){
			redirect('dashboard','refresh');
		}

		// data Post
		$dataPost = $this->input->post();

		if(isset($userdata)){
			$updateMasterBank = $this->Bank->updateMasterBank($id, $dataPost);
			if($updateMasterBank > 0){
				$this->session->set_flashdata('alert_status', TRUE);
				$this->session->set_flashdata('alert_message', 'Master Bank Berhasil di Update!');	
				redirect('bank','refresh');
			}else{
				$this->session->set_flashdata('alert_status', FALSE);
				$this->session->set_flashdata('alert_message', 'Master Bank Gagal di Update!');
				redirect('bank/'.$id.'/edit','refresh');
			}
        }else{
			redirect('auth/login','refresh');
		}
	}

	public function delete($id)
	{
		// data Session
		$userdata = $this->session->userdata('users');
		
		if($userdata['role'] != 1){
			redirect('dashboard','refresh');
		}

		if(isset($userdata)){
			$deleteMasterBank = $this->Bank->deleteMasterBank($id);
			if($deleteMasterBank > 0){
				$this->session->set_flashdata('alert_status', TRUE);
				$this->session->set_flashdata('alert_message', 'Master Bank Berhasil di Delete!');	
				redirect('bank','refresh');
			}else{
				$this->session->set_flashdata('alert_status', FALSE);
				$this->session->set_flashdata('alert_message', 'Master Bank Gagal di Delete!');
				redirect('bank/'.$id.'/edit','refresh');
			}
        }else{
			redirect('auth/login','refresh');
		}
	}

}