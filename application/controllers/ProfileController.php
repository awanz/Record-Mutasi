<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileController extends CI_Controller {

	public function index()
	{
		// data Session
		$userdata = $this->session->userdata('users');

		$dataProfile = $this->Profile->getProfileById($userdata['user_id']);
		
		if(isset($userdata)){
			$data['userdata'] = $userdata;
			$data['breadcrumb'] = "My Profile";
			$data['dataProfile'] = $dataProfile;
			return view('profile.index', $data);
        }else{
			redirect('auth/login','refresh');
		}
	}
	
	public function update()
	{
		// data Session
		$userdata = $this->session->userdata('users');

		// data Post
		$dataPost = $this->input->post();
		
		if(isset($userdata)){
			$updateProfile = $this->Profile->updateProfile($userdata['user_id'], $dataPost);
			if($updateProfile > 0){
				$this->session->set_flashdata('alert_status', TRUE);
				$this->session->set_flashdata('alert_message', 'Profile Berhasil di Update!');	
			}else{
				$this->session->set_flashdata('alert_status', FALSE);
				$this->session->set_flashdata('alert_message', 'Profile Gagal di Update!');
			}
			redirect('profile','refresh');
        }else{
			redirect('auth/login','refresh');
		}
    }
    
    public function change_password()
	{
		// data Session
		$userdata = $this->session->userdata('users');
    
		if(isset($userdata)){
			$data['userdata'] = $userdata;
			$data['breadcrumb'] = "Change Password";
			return view('profile.change_password', $data);
        }else{
			redirect('auth/login','refresh');
		}
	}

	
    public function change_password_post()
	{
		// data Session
		$userdata = $this->session->userdata('users');

		// data Post
		$dataPost = $this->input->post();
		
		if(isset($userdata)){
			$cekPassword = $this->Profile->cekPassword($userdata['user_id'], md5($dataPost['password_old']));
			
			if($dataPost['password_new'] != $dataPost['password_new_verif']){
				$this->session->set_flashdata('alert_status', FALSE);
				$this->session->set_flashdata('alert_message', 'Password baru yang dimasukan tidak sesuai!');
			}elseif($dataPost['password_old'] == $dataPost['password_new']){
				$this->session->set_flashdata('alert_status', FALSE);
				$this->session->set_flashdata('alert_message', 'Password baru tidak boleh sama dengan password lama!');
			}elseif(!$cekPassword){
				$this->session->set_flashdata('alert_status', FALSE);
				$this->session->set_flashdata('alert_message', 'Password lama salah!');
			}else{
				$updatePassword = $this->Profile->updatePassword($userdata['user_id'], md5($dataPost['password_new']));
				if($updatePassword){
					$this->session->set_flashdata('alert_status', TRUE);
					$this->session->set_flashdata('alert_message', 'Password berhasil diubah!');
				}else{
					$this->session->set_flashdata('alert_status', FALSE);
					$this->session->set_flashdata('alert_message', 'Password gagal diubah!');
				}
			}
			redirect('profile/change_password','refresh');
        }else{
			redirect('auth/login','refresh');
		}
	}

    public function change_photo_post()
	{
		// data Session
		$userdata = $this->session->userdata('users');

		if(isset($userdata)){
			$config['upload_path'] = './gambar/profile/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size']	= '1500';
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload()) {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('alert_status', FALSE);
				$this->session->set_flashdata('alert_message', $error);
			}
			else {
				$dataUpload = $this->upload->data();

				//insert to database
				$insert = $this->Profile->updatePhoto($userdata['user_id'], $dataUpload['file_name']);

				if($insert > 0){
					$this->session->set_flashdata('alert_status', TRUE);
					$this->session->set_flashdata('alert_message', "Upload Gambar Berhasil");
				}else{
					$this->session->set_flashdata('alert_status', FALSE);
					$this->session->set_flashdata('alert_message', "Upload Gambar Gagal");
				}				
			}
			redirect('profile','refresh');
        }else{
			redirect('auth/login','refresh');
		}
	}


}