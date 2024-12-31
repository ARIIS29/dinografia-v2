<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Evaluacion_lecciones extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('usuarios_model');
		$this->load->model('exploremos_model');
		$this->load->model('galeria_model');
		$this->load->model('rutaTrazo_model');
		$this->load->library('session');  // Cargar la librería de sesión

	}

	public function index()
	{
		$this->load->view('layout/header_evaluacion_lecciones');
		$this->load->view('evaluacion_lecciones/index');
		$this->load->view('layout/footer');
	}

	public function obtener_evaluacion_lecciones_por_usuario()
	{
		$draw = $this->input->post('draw');
		$start = $this->input->post('start');
		$length = $this->input->post('length');
		$order = $this->input->post('order');

		$prgreso_list = $this->galeria_model->obtener_imagenes_usuario($this->session->userdata('identificador'));

		$data = [];
		$evaluaciuon = '';

		foreach ($prgreso_list->result() as $key => $value) {

			$opciones = '
                    <a href="' . site_url("clientes/editar/") . $value->identificador . '">Editar</a>    
                    |
                    <a href="#" onclick="suspender(' . $value->identificador . ');return false;">Eliminar</a>
                ';


			if ($value->evaluacion == 'bueno') {
				$evaluacion = '¡Super asombroso! 🎉 <br>
								¡Increíble! Tu trazo es muy preciso. La curva y la línea vertical están en el lugar perfecto. Sigue así, ¡lo estás haciendo genial!';
			} else if ($value->evaluacion == 'regular') {
				$evaluacion = '¡Casi lo logras! 🌟 <br>
								¡Buen intento! El trazo está muy bien, solo falta un pequeño ajuste en la curva o línea. Con un poco más de práctica, ¡será perfecto! Sigue practicando, ¡estás muy cerca!';
			} else if ($value->evaluacion == 'malo') {
				$evaluacion = '¡A seguir practicando! 💪 <br> No pasa nada, lo importante es que sigas intentándolo. El trazo necesita más precisión, pero cada vez que lo intentas, mejoras. ¡No te rindas, lo estás haciendo cada vez mejor! ';
			} 

			$data[] = array(
				'id' => $value->id,
				'leccion' => $value->nombre,
				'fecha' => $value->fecha_registro,
				'evaluacion' => $evaluacion,
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
