<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Escritura extends CI_Controller {

	public function index()
	{
		$this->load->view('layout/header_escritura');
		$this->load->view('escritura/index');
		$this->load->view('layout/footer');
	}
}
