<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

	public function index()
	{
		// data Session
		$userdata = $this->session->userdata('users');
    
		if(isset($userdata)){
			$data['userdata'] = $userdata;
			$data['breadcrumb'] = "Dashboard";
			// return view('dashboard.index', $data);
			redirect('profile','refresh');
        }else{
			redirect('auth/login','refresh');
		}
	}
}