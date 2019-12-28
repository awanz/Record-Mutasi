<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

	public function login()
	{
		// data Session
		$userdata = $this->session->userdata('users');
		// print_r($userdata);
		// die();
		if(isset($userdata)){
			redirect('dashboard','refresh');
        }else{
			return view('auth.login');
		}
	}

	public function login_post()
	{
		// data Session
		$userdata = $this->session->userdata('users');
    
		if(isset($userdata)){
			redirect('dashboard','refresh');
        }else{
			// data Post
			$dataPost = $this->input->post();
			$dataPost['password'] = md5($dataPost['password']);

			$login = $this->Auth->login($dataPost);
			
			if($login != 0){
				if($login['status'] == 0){
					$this->session->set_flashdata('alert_status', FALSE);
					$this->session->set_flashdata('alert_message', 'Akun tidak aktif!');
					redirect('auth/login');
				}else{
					$arrayDataSession = array(
						'users' => array(
							'user_id'		=> $login['user_id'], 
							'username'		=> $dataPost['username'],
							'fullname'		=> $login['full_name'],
							'jabatan'		=> $login['jabatan'],
							'foto'			=> $login['profile_picture'],
							'role'			=> $login['role']
						)
					);
					$this->session->set_userdata($arrayDataSession);
					$last_login = $this->Auth->updateLogin($login['user_id']);
					redirect('dashboard');
				}
			}
			else{
				$this->session->set_flashdata('alert_status', FALSE);
				$this->session->set_flashdata('alert_message', 'Login gagal!');
				redirect('auth/login');
			}
        }
	}

	public function logout()
	{
		$this->session->unset_userdata('users');
		$this->session->sess_destroy();
		redirect('auth/login');
	}

}