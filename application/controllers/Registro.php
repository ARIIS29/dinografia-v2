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

		$email = $this->input->post('correo_tutor');
		$username = $this->input->post('usuario');
		// $password = do_hash($this->input->post('contrasenia'), 'md5');
		$hashed_password = password_hash($this->input->post('contrasenia'), PASSWORD_DEFAULT);
		$fecha_registro = date("Y-m-d H:i:s");
		$key_1 = "usuarios-" . date("Y-m-d-H-i-s", strtotime($fecha_registro));
		$identificador_1 = hash("crc32b", $key_1);

		$data = array(
			'identificador' =>$identificador_1,
			'usuario' => $username,
			'contrasenia' => $hashed_password,
			'fecha_registro' => date("Y-m-d H:i:s")
		);

		if ($this->usuarios_model->insertar_usuario($data)) {
			// $this->session->set_flashdata('registro_exitoso', 'Usuario registrado exitosamente.');
		} else {
			echo "Error en el registro.";
		}

		$key_2 = "exploremos-" . date("Y-m-d-H-i-s", strtotime($fecha_registro));
		$identificador_2 = hash("crc32b", $key_2);

		$data1 = array(
			'identificador' =>$identificador_2,
			'identificador_usuario' => $identificador_1,
			'fecha_registro' => date("Y-m-d H:i:s")
		);

		if ($this->exploremos_model->insertar_exploremos($data1)) {
			// $this->session->set_flashdata('registro_exitoso', 'Usuario registrado exitosamente.');
		} else {
			echo "Error en el registro.";
		}

		$key_3 = "galeria-" . date("Y-m-d-H-i-s", strtotime($fecha_registro));
		$identificador_3 = hash("crc32b", $key_3);

		$data3 = array(
			'identificador' =>$identificador_3,
			'identificador_usuario' => $identificador_1,
			'fecha_registro' => date("Y-m-d H:i:s")
		);

		if ($this->galeria_model->insertar_galeria($data3)) {
			// $this->session->set_flashdata('registro_exitoso', 'Usuario registrado exitosamente.');
		} else {
			echo "Error en el registro.";
		}

		$key_4 = "rutaTrazo-" . date("Y-m-d-H-i-s", strtotime($fecha_registro));
		$identificador_4 = hash("crc32b", $key_4);

		$data4 = array(
			'identificador' =>$identificador_4,
			'identificador_usuario' => $identificador_1,
			'fecha_registro' => date("Y-m-d H:i:s")
		);

		if ($this->rutaTrazo_model->insertar_rutaTrazo($data4)) {
			$this->session->set_flashdata('registro_exitoso', 'Usuario registrado exitosamente.');
            redirect('login');
		} else {
			echo "Error en el registro.";
		}
	}
}
