<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Trazos_arena extends CI_Controller
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
			'leccion' => 'b',
			'visita' => 'si',
			'fecha_registro' => date("Y-m-d H:i:s")
		);

		if ($this->rutaTrazo_model->insertar_rutaTrazo($data4)) {
			$this->load->view('layout/header_trazos_arena');
			$this->load->view('trazos_arena/index');
			$this->load->view('layout/footer');
		} else {
			echo "Error en el registro.";
			$this->load->view('layout/trazos_arena');
			$this->load->view('trazos_arena/index');
			$this->load->view('layout/footer');
		}
	}
	public function guardarImagen()
	{
		// Obtener el contenido de la solicitud
		$input = json_decode(trim(file_get_contents("php://input")), true);

		if (isset($input['imagen'])) {
			$imagenData = $input['imagen'];

			// Validar el formato de la imagen
			if (preg_match('/^data:image\/(png|jpeg|jpg);base64,/', $imagenData)) {
				$imagen_decodificada = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imagenData));

				if ($imagen_decodificada === false) {
					echo json_encode(['status' => 'error', 'message' => 'Error al decodificar la imagen']);
					return;
				}

				$nombre_archivo = time() . '.jpg';
				$ruta_guardado = 'almacenamiento/galeria/galeria-trazos_arena/';
				$identificador_usuario = $this->session->userdata('identificador');

				// Verificar si el directorio existe, si no, crearlo
				if (!is_dir($ruta_guardado)) {
					mkdir($ruta_guardado, 0777, true);
				}

				$ruta_completa = $ruta_guardado . $nombre_archivo;

				// Generar identificador único
				$fecha_registro = date("Y-m-d H:i:s");
				$key_1 = "usuarios-" . date("Y-m-d-H-i-s", strtotime($fecha_registro));
				$identificador_1 = hash("crc32b", $key_1);
				$data = array(
					'identificador' => $identificador_1,
					'identificador_usuario' => $identificador_usuario,
					'nombre' => 'Trazos en la arena',
					'galeria_letra' => 't',
					'url_imagen' => $ruta_completa,
					'tipo' => 'ejercicio',
					'fecha_registro' => $fecha_registro
				);

				// Guardar en la base de datos
				$this->load->model('galeria_model');
				$this->galeria_model->insertar_galeria($data);

				// Guardar la imagen en el directorio
				if (file_put_contents($ruta_completa, $imagen_decodificada)) {
					echo json_encode(['status' => 'success', 'message' => 'Imagen guardada con éxito']);
				} else {
					echo json_encode(['status' => 'error', 'message' => 'No se pudo guardar la imagen']);
				}
			} else {
				echo json_encode(['status' => 'error', 'message' => 'Formato de imagen inválido']);
			}
		} else {
			echo json_encode(['status' => 'error', 'message' => 'No se recibió ninguna imagen']);
		}
	}
}


// $this->galeria_model->insertar_galeria($data);