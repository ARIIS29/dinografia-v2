<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registro extends CI_Controller
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
		$this->load->view('layout/header_registro');
		$this->load->view('registro/index');
		$this->load->view('layout/footer');
	}

	public function registrar_usuario()
	{
		$username = $this->input->post('usuario');

		if ($this->usuarios_model->existe_usuario($username)) {
			// Usuario ya existe, establecer mensaje y redirigir al registro
			$this->session->set_flashdata('usuario_existente', 'Usuario ya registrado. Prueba con otro usuario');
			redirect('registro'); // Redirige al formulario de registro
		}

		$hashed_password = password_hash($this->input->post('contrasenia'), PASSWORD_DEFAULT);
		$fecha_registro = date("Y-m-d H:i:s");
		$key_1 = "usuarios-" . date("Y-m-d-H-i-s", strtotime($fecha_registro));
		$identificador_1 = hash("crc32b", $key_1);

		$data = array(
			'identificador' => $identificador_1,
			'usuario' => $username,
			'contrasenia' => $hashed_password,
			'fecha_registro' => date("Y-m-d H:i:s")
		);

		if ($this->usuarios_model->insertar_usuario($data)) {
			// Mensaje de registro exitoso y redirección al login
			$this->session->set_flashdata('exito', 'Usuario registrado con éxito. Puedes iniciar sesión.');
			redirect('login');
		} else {
			echo "Error en el registro.";
		}
	}
}
