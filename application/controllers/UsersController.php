<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersController extends CI_Controller {

	public function index()
	{
		// data Session
		$userdata = $this->session->userdata('users');

		// data Users
		$dataUsers = $this->Users->getAllUsers()->result();

		if($userdata['role'] != 1){
			redirect('dashboard','refresh');
		}
    
		if(isset($userdata)){
			$data['userdata'] = $userdata;
			$data['breadcrumb'] = "List Users";
			$data['dataUsers'] = $dataUsers;
			return view('users.index', $data);
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
			$data['breadcrumb'] = "Add Users";
			return view('users.add', $data);
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
			if($dataPost['password'] == $dataPost['password2']){
				unset($dataPost['password2']);
				$dataPost['password'] = md5($dataPost['password']);
				$addUsers = $this->Users->addUsers($dataPost);
				if($addUsers > 0){
					$this->session->set_flashdata('alert_status', TRUE);
					$this->session->set_flashdata('alert_message', 'Berhasil menambah users baru!');
					redirect('users','refresh');
				}else{
					$this->session->set_flashdata('alert_status', FALSE);
					$this->session->set_flashdata('alert_message', 'Gagal menambah users baru!');
				}
			}else{
				$this->session->set_flashdata('alert_status', FALSE);
				$this->session->set_flashdata('alert_message', 'Password tidak sama dengan Re-Type Password!');
			}
			redirect('users/add','refresh');
        }else{
			redirect('auth/login','refresh');
		}
	}

	public function edit($id)
	{
		// data Session
		$userdata = $this->session->userdata('users');

		$dataUsers = $this->Users->getUsersById($id);

		if($userdata['role'] != 1){
			redirect('dashboard','refresh');
		}
    
		if(isset($userdata)){
			$data['userdata'] = $userdata;
			$data['breadcrumb'] = "Edit Users";
			$data['dataUsers'] = $dataUsers;
			$data['id'] = $id;
			return view('users.edit', $data);
        }else{
			redirect('auth/login','refresh');
		}
	}

	public function edit_post($id)
	{
		// data Session
		$userdata = $this->session->userdata('users');

		// data Post
		$dataPost = $this->input->post();

		if($userdata['role'] != 1){
			redirect('dashboard','refresh');
		}
    
		if(isset($userdata)){
			$updateUsers = $this->Users->updateUsers($id, $dataPost);
			if($updateUsers > 0){
				$this->session->set_flashdata('alert_status', TRUE);
				$this->session->set_flashdata('alert_message', 'Users Berhasil di Update!');
				redirect('users','refresh');
			}else{
				$this->session->set_flashdata('alert_status', FALSE);
				$this->session->set_flashdata('alert_message', 'Users Gagal di Update!');
				redirect('users/'.$id.'/edit','refresh');
			}
			
        }else{
			redirect('auth/login','refresh');
		}
	}

	public function delete($id)
	{
		// data Session
		$userdata = $this->session->userdata('users');
		
		if($userdata['user_id'] == $id){
			$this->session->set_flashdata('alert_status', FALSE);
			$this->session->set_flashdata('alert_message', 'Tidak bisa menghapus akun sendiri!');	
			redirect('users','refresh');
		}
		
		if($userdata['role'] != 1){
			redirect('dashboard','refresh');
		}

		if(isset($userdata)){
			$deleteUsers = $this->Users->deleteUsers($id);
			if($deleteUsers > 0){
				$this->session->set_flashdata('alert_status', TRUE);
				$this->session->set_flashdata('alert_message', 'Users Berhasil di Delete!');	
				redirect('users','refresh');
			}else{
				$this->session->set_flashdata('alert_status', FALSE);
				$this->session->set_flashdata('alert_message', 'Users Bank Gagal di Delete!');
				redirect('users/'.$id.'/edit','refresh');
			}
        }else{
			redirect('auth/login','refresh');
		}
	}
}