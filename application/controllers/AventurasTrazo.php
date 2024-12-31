<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AventurasTrazo extends CI_Controller {

	public function index()
	{
		$this->load->view('layout/header_aventurasTrazo');
		$this->load->view('aventurasTrazo/index');
		$this->load->view('layout/footer');
	}
}