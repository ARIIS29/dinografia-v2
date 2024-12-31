<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Descubriendo_palabras extends CI_Controller {

	public function index()
	{
		$this->load->view('layout/header_descubriendo_palabras');
		$this->load->view('descubriendo_palabras/index');
		$this->load->view('layout/footer');
	}

	public function enviarEvaluacionDescubriendoPalabrasB(){
		$user_identificador = $this->session->userdata('identificador');
		$tiempo = $this->input->post('tiempoFinal');
		$palabrasCorrectas = $this->input->post('palabrasCorrectas');
		$palabrasIncorrectas = $this->input->post('contadorIncorrectas');

		$fecha_registro = date("Y-m-d H:i:s");
		$key_1 = "evaluacion-" . date("Y-m-d-H-i-s", strtotime($fecha_registro));
		$identificador_1 = hash("crc32b", $key_1);

		


	}
}
