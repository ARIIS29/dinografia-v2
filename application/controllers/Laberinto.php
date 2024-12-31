<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laberinto extends CI_Controller {

	public function index()
	{
		$this->load->view('layout/header_laberinto');
		$this->load->view('laberinto/index');
		$this->load->view('layout/footer');
	}
}
