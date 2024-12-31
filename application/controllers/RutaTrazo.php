<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RutaTrazo extends CI_Controller {

	public function index()
	{
		$this->load->view('layout/header_rutaTrazo');
		$this->load->view('rutaTrazo/index');
		$this->load->view('layout/footer');
	}
}