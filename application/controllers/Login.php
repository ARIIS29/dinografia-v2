<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		// Cargar la biblioteca de formularios y la biblioteca de validación
		parent::__construct();
		// Cargar la biblioteca de formularios y la biblioteca de validación
		$this->load->library('form_validation');
		$this->load->helper('security');
		$this->load->model('usuarios_model'); //modelo para manejar la sesion
	}

	public function index()
	{
		$usuarios_list = $this->usuarios_model->obtener_usuarios()->result();
		$data['usuarios_list'] = $usuarios_list;

		$this->load->view('layout/header_login');
		$this->load->view('login/index', $data);
		$this->load->view('layout/footer');
	}

	public function autenticacion()
	{
		// Reglas de validación de formularios
		$this->form_validation->set_rules('usuario', 'usuario', 'required');
		$this->form_validation->set_rules('contrasenia', 'contrasenia', 'required');



		if ($this->form_validation->run() == FALSE) {
			// Si la validación falla, recargar la vista del formulario
			echo "entra if 1";
			$this->load->view('login/index');
		} else {
			// Capturar los datos del formulario
			// $password = do_hash($contrasenia, 'md5'); // Cifrar la contraseña ingresada por el usuario

			$usuario_row = $this->usuarios_model->obtener_usuario($this->input->post('usuario'))->row();

			if (!$usuario_row) {
				$this->session->set_flashdata('error1', 'Usuario incorrecto. Inténtalo de nuevo.');
				redirect('login'); // Redirige al formulario de inicio de sesión
			}

			// $this->session->set_flashdata('usuario', $this->input->post('usuario'));

			if (!password_verify($this->input->post('contrasenia'), $usuario_row->contrasenia)) {
				// Contraseña incorrecta
				$this->session->set_flashdata('error2', 'Contraseña incorrecta. Inténtalo de nuevo.');
				redirect('login'); // Redirige al formulario de inicio de sesión
			}

			$this->_preparar_datos_sesion(
				$usuario_row->usuario,
				$usuario_row->correo_tutor,
				$usuario_row->identificador,
				//$relacion_usuario_rol_row->rol_id
				null
			);

			redirect('dinografia');
		}
	}

	public function cerrar_sesion()
	{
		$this->session->sess_destroy();
		redirect('login/index');
	}

	/**
	 * Función privada que prepara los datos que el usuario que recién inicia sesión va a requerir
	 * mientras se encuentre en ella.
	 *
	 * @param string $usuario
	 * @param string $correo_tutor
	 * @param string $identificador
	 * @return void
	 */
	private function _preparar_datos_sesion($usuario, $correo_tutor, $identificador)
	{
		$sesion_data = array(
			'usuario' => $usuario,
			'correo_tutor' => $correo_tutor,
			'identificador' => $identificador,
			'en_sesion' => true,
		);

		$this->session->set_userdata($sesion_data);
	}
}
