<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bosque_bambu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->model('ejercicios_model');
	}

	public function index()
	{
		$this->load->view('layout/header_letras/header_letraB/header_bosque_bambu');
		$this->load->view('aventuras_del_trazo/bosque_bambu/index');
		$this->load->view('layout/footer');
	}

	public function explorando_letrab()
	{
		$this->load->view('layout/header_letras/header_letraB/header_explorando_letrab');
		$this->load->view('aventuras_del_trazo/bosque_bambu/explorando_letrab.php');
		$this->load->view('layout/footer');
	}
	public function leccion_letrab()
	{
		$this->load->view('layout/header_letras/header_letraB/header_leccion_letrab');
		$this->load->view('aventuras_del_trazo/bosque_bambu/leccion_letrab.php');
		$this->load->view('layout/footer');
	}
}
