<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dinografia extends CI_Controller {

	public function index()
	{
		$this->load->view('layout/header_dinografia');
		$this->load->view('dinografia/index');
		$this->load->view('layout/footer');
	}
}