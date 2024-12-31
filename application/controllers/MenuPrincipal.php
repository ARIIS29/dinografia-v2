<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuPrincipal extends CI_Controller {

	public function index()
	{
		$this->load->view('layout/header_menuPrincipal');
		$this->load->view('menuPrincipal/index');
		$this->load->view('layout/footer');
	}
}