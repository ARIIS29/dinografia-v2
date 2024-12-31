<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TerminosCondiciones extends CI_Controller {

	public function index()
	{
		$this->load->view('layout/header_terminos');
		$this->load->view('terminos-condiciones/index');
		$this->load->view('layout/footer');
	}
}
