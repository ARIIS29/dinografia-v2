<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeria extends CI_Controller
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

	public function galeriab()
	{
		$galeriasb_lista = $this->galeria_model->obtener_imagen_usuario($this->session->userdata('identificador'), 'b')->result();
		$data['galeriasb_lista'] = $galeriasb_lista;

		$this->load->view('layout/header_galeriab');
		$this->load->view('galeriab/index', $data);
		$this->load->view('layout/footer');
	}

	public function galeriad()
	{
		$galeriasd_lista = $this->galeria_model->obtener_imagen_usuario($this->session->userdata('identificador'), 'd')->result();
		$data['galeriasd_lista'] = $galeriasd_lista;

		$this->load->view('layout/header_galeriad');
		$this->load->view('galeriad/index', $data);
		$this->load->view('layout/footer');
	}

	public function galeriap()
	{
		$galeriasp_lista = $this->galeria_model->obtener_imagen_usuario($this->session->userdata('identificador'), 'p')->result();
		$data['galeriasp_lista'] = $galeriasp_lista;

		$this->load->view('layout/header_galeriap');
		$this->load->view('galeriap/index', $data);
		$this->load->view('layout/footer');
	}

	public function galeriaq()
	{
		$galerias_lista = $this->galeria_model->obtener_imagen_usuario($this->session->userdata('identificador'), 'q')->result();
		$data['galerias_lista'] = $galerias_lista;

		$this->load->view('layout/header_galeriaq');
		$this->load->view('galeriaq/index', $data);
		$this->load->view('layout/footer');
	}

	public function galeriag()
	{
		$galeriasg_lista = $this->galeria_model->obtener_imagen_usuario($this->session->userdata('identificador'), 'g')->result();
		$data['galeriasg_lista'] = $galeriasg_lista;

		$this->load->view('layout/header_galeriag');
		$this->load->view('galeriag/index', $data);
		$this->load->view('layout/footer');
	}
	public function galeriat()
	{
		$galeriast_lista = $this->galeria_model->obtener_imagen_usuario($this->session->userdata('identificador'), 't')->result();
		$data['galeriast_lista'] = $galeriast_lista;

		$this->load->view('layout/header_galeriat');
		$this->load->view('galeriat/index', $data);
		$this->load->view('layout/footer');
	}

	public function guardar_bueno($imagen_identificador)
	{
		$imagen_identificador = $imagen_identificador;
		$letra = $this->galeria_model->obtener_letra_de_imagen($imagen_identificador)->row();

		$data = array(
			'evaluacion' => 'bueno',
			'evaluado' => 'si'
		);

		$this->galeria_model->insertar_evaluacion($data, $imagen_identificador);
		redirect('galeria/galeria'.$letra->galeria_letra);
	}

	public function guardar_regular($imagen_identificador)
	{
		$imagen_identificador = $imagen_identificador;
		$letra = $this->galeria_model->obtener_letra_de_imagen($imagen_identificador)->row();

		$data = array(
			'evaluacion' => 'regular',
			'evaluado' => 'si'
		);

		$this->galeria_model->insertar_evaluacion($data, $imagen_identificador);
		redirect('galeria/galeria'.$letra->galeria_letra);
	}


	public function guardar_malo($imagen_identificador)
	{
		$imagen_identificador = $imagen_identificador;
		$letra = $this->galeria_model->obtener_letra_de_imagen($imagen_identificador)->row();

		$data = array(
			'evaluacion' => 'malo',
			'evaluado' => 'si'
		);

		$this->galeria_model->insertar_evaluacion($data, $imagen_identificador);
		redirect('galeria/galeria'.$letra->galeria_letra);
	}
}





// public function guardar_bueno($imagen_identificador)
	// {
	// 	$imagen_identificador = $imagen_identificador;
	// 	$letra = $this->galeria_model->obtener_letra_de_imagen($imagen_identificador)->row();

	// 	$letra = $letra->galeria_letra;
	// 	$data = array(
	// 		'evaluacion' => 'bueno',
	// 		'evaluado' => 'si'
	// 	);

	// 	$this->galeria_model->insertar_evaluacion($data, $imagen_identificador);
	// 	redirect('galeria/galeria'.$letra);
	// }