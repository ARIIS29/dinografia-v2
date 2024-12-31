<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exploremos extends CI_Controller {

	public function index()
	{
		$this->load->view('layout/header_exploremos');
		$this->load->view('exploremos/index');
		$this->load->view('layout/footer');
	}
}