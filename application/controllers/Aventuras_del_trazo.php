<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aventuras_del_trazo extends CI_Controller {

	public function index()
	{
		$this->load->view('layout/header_aventuras_del_trazo');
		$this->load->view('aventuras_del_trazo/index');
		$this->load->view('layout/footer');
	}
}