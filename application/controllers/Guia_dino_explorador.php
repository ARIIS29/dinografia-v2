<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guia_dino_explorador extends CI_Controller {

	public function index()
	{
		$this->load->view('layout/header_guia_dino_explorador');
		$this->load->view('guia_dino_explorador/index');
		$this->load->view('layout/footer');
	}
}