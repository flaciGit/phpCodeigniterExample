<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function index()
	{
		
		$this->load->view('common/header');
		$this->load->view('pages/index');
		$this->load->view('common/footer');
	}

}
