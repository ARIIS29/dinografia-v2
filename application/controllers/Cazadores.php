<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cazadores extends CI_Controller {

	public function index()
	{
		$this->load->view('layout/header_cazadores');
		$this->load->view('cazadores/index');
		$this->load->view('layout/footer');
	}
}
