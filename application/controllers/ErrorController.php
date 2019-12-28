<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ErrorController extends CI_Controller {

	public function index()
	{
		return view('404');
	}
}