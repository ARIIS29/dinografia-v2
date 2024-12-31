<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuGalerias extends CI_Controller {

	public function index()
	{
		$this->load->view('layout/header_menuGalerias');
		$this->load->view('menuGalerias/index');
		$this->load->view('layout/footer');
	}

}