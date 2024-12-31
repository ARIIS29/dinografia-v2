<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Leccionp extends CI_Controller
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
		$fecha_registro = date("Y-m-d H:i:s");
		$key_4 = "rutaTrazo-" . date("Y-m-d-H-i-s", strtotime($fecha_registro));
		$identificador_4 = hash("crc32b", $key_4);

		$data4 = array(
			'identificador' => $identificador_4,
			'identificador_usuario' => $this->session->userdata('identificador'),
			'leccion' => 'p',
			'visita' => 'si',
			'fecha_registro' => date("Y-m-d H:i:s")
		);

		if ($this->rutaTrazo_model->insertar_rutaTrazo($data4)) {
			$this->load->view('layout/header_leccionp');
			$this->load->view('leccionp/index');
			$this->load->view('layout/footer');
		} else {
			echo "Error en el registro.";
			$this->load->view('layout/header_leccionp');
			$this->load->view('leccionp/index');
			$this->load->view('layout/footer');
		}
	}

	public function guardarImagen()
	{
		if ($this->input->post('imagen')) {
			$imagenData = $this->input->post('imagen');

			// Validar formato de imagen
			if (preg_match('/^data:image\/(png|jpeg|jpg);base64,/', $imagenData)) {
				$imagen_decodificada = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imagenData));

				if ($imagen_decodificada === false) {
					echo json_encode(['status' => 'error', 'message' => 'Error al decodificar la imagen']);
					return;
				}

				$nombre_archivo = time() . '.jpg';
				$ruta_guardado = 'almacenamiento/galeria/galeria-letrap/';
				$identificador_usuario = $this->session->userdata('identificador');

				// Verificar que el directorio existe
				if (!is_dir($ruta_guardado)) {
					mkdir($ruta_guardado, 0777, true);
				}

				$ruta_completa = $ruta_guardado . $nombre_archivo;

				$fecha_registro = date("Y-m-d H:i:s");
				$key_1 = "usuarios-" . date("Y-m-d-H-i-s", strtotime($fecha_registro));
				$identificador_1 = hash("crc32b", $key_1);
				$data = array(
					'identificador' => $identificador_1,
					'identificador_usuario' => $identificador_usuario,
					'nombre' => 'Letra p',
					'galeria_letra' => 'p',
					'url_imagen' => $ruta_completa,
					'tipo' => 'leccion',
					'fecha_registro' => date("Y-m-d H:i:s")
				);

				$this->galeria_model->insertar_galeria($data);

				if (file_put_contents($ruta_completa, $imagen_decodificada)) {
					echo json_encode(['status' => 'success', 'message' => 'Imagen guardada con éxito(1)']);
				} else {
					echo json_encode(['status' => 'error', 'message' => 'No se pudo guardar la imagen(1)']);
				}
			} else {
				echo json_encode(['status' => 'error', 'message' => 'Formato de imagen inválido(2)']);
			}
		} else {
			echo json_encode(['status' => 'error', 'message' => 'No se recibió ninguna imagen(3)']);
		}
	}
}
