<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Evaluacion_ejercicios extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('usuarios_model');
		$this->load->model('exploremos_model');
		$this->load->model('galeria_model');
		$this->load->model('rutaTrazo_model');
		$this->load->model('ejercicios_model');
		$this->load->library('session');  // Cargar la librería de sesión

	}

	public function index()
	{
		$this->load->view('layout/header_evaluacion_ejercicios');
		$this->load->view('evaluacion_ejercicios/index');
		$this->load->view('layout/footer');
	}

	public function obtener_evaluacion_ejercicios_por_usuario()
	{
		$draw = $this->input->post('draw');
		$start = $this->input->post('start');
		$length = $this->input->post('length');
		$order = $this->input->post('order');

		$prgreso_list = $this->ejercicios_model->obtener_evaluacion_ejercicios_por_usuario($this->session->userdata('identificador'));

		$data = [];

		foreach ($prgreso_list->result() as $key => $value) {

			$opciones = '
                    <a href="' . site_url("clientes/editar/") . $value->identificador . '">Editar</a>    
                    |
                    <a href="#" onclick="suspender(' . $value->identificador . ');return false;">Eliminar</a>
                ';
			// if ($value->evaluacion == '¡Super asombroso!') {
			// 	$informacion = $value->evaluacion . ' EMKLMC LKM C  F   C ,';
			// }
			// if ($value->evaluacion == '¡Casi lo logras!') {
			// 	$informacion = $value->evaluacion . ' Casi, lo logras EMKLMC LKM C  F   C ,';
			// }
			// if ($value->evaluacion == '¡A seguir practicando!') {
			// 	$informacion = $value->evaluacion . ' A seguri practicandp EMKLMC LKM C  F   C ,';
			// }


			$data[] = array(
				'id' => $value->id,
				'nombre' => $value->nombre,
				'fecha' => $value->fecha_registro,
				'cronometro' => $value->cronometro,
				'correctas' => $value->correctas,
				'incorrectas' => $value->incorrectas,
				'estrellas' => $value->estrellas,
				'evaluacion' => $value->evaluacion,
				'observaciones' => $value->observaciones,
				// 'opciones' => $opciones,
			);

		}

		$result = array(
			"draw" => $draw,
			"recordsTotal" => $prgreso_list->num_rows(),
			"recordsFiltered" => $prgreso_list->num_rows(),
			"data" => $data
		);

		echo json_encode($result);
		exit();
	}
}
