<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bosque_bambu extends CI_Controller
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
			$this->load->view('layout/header_letras/header_letraB/header_bosque_bambu');
			$this->load->view('aventuras_del_trazo/bosque_bambu/index');
			$this->load->view('layout/footer');
		} else {
			echo "Error en el registro.";
			$this->load->view('layout/header_letras/header_letraB/header_bosque_bambu');
			$this->load->view('aventuras_del_trazo/bosque_bambu/index');
			$this->load->view('layout/footer');
		}
	}

	public function trazando_aventuras_b()
	{
		$this->load->view('layout/header_letras/header_letraB/header_trazando_aventuras_b');
		$this->load->view('aventuras_del_trazo/bosque_bambu/trazando_aventuras_b.php');
		$this->load->view('layout/footer');
	}
	public function letrab()
	{
		$this->load->view('layout/header_letras/header_letraB/header_letrab');
		$this->load->view('aventuras_del_trazo/bosque_bambu/letrab.php');
		$this->load->view('layout/footer');
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
				$ruta_guardado = 'almacenamiento/galeria/galeria-letrab/';
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
					'nombre' => 'Letra b',
					'galeria_letra' => 'b',
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

	public function trazos_en_arena_b()
	{
		$this->load->view('layout/header_letras/header_letraB/header_trazos_en_arena_b');
		$this->load->view('aventuras_del_trazo/bosque_bambu/trazos_en_arena_b.php');
		$this->load->view('layout/footer');
	}

	public function guardarImagenTrazosArena()
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
				$ruta_guardado = 'almacenamiento/galeria/galeria_trazos_arena_b/';
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
					'nombre' => 'Trazoz en la Arena - b',
					'galeria_letra' => 't',
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


	public function grafismo_b()
	{
		$this->load->view('layout/header_letras/header_letraB/header_grafismo_b');
		$this->load->view('aventuras_del_trazo/bosque_bambu/grafismo_b.php');
		$this->load->view('layout/footer');
	}

	public function guardarImagenGrafismoB()
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
				$ruta_guardado = 'almacenamiento/galeria/galeria_grafismo_b/';
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
					'nombre' => 'Grafismo - b',
					'galeria_letra' => 'g',
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


	//Inicio de las funciones de los ejercicios 


	public function explora_y_descubre_b()
	{
		$this->load->view('layout/header_letras/header_letraB/header_explora_y_descubre_b');
		$this->load->view('aventuras_del_trazo/bosque_bambu/explora_y_descubre_b.php');
		$this->load->view('layout/footer');
	}

	public function descubriendo_palabras_b()
	{
		$this->load->view('layout/header_letras/header_letraB/header_descubriendo_palabras_b');
		$this->load->view('aventuras_del_trazo/bosque_bambu/descubriendo_palabras_b.php');
		$this->load->view('layout/footer');
	}
	
	public function enviarEvaluacionDescubriendoPalabrasB()
	{
		$fecha_registro = date("Y-m-d H:i:s");
		$key_1 = "progreso-" . date("Y-m-d-H-i-s", strtotime($fecha_registro));
		$identificador_1 = hash("crc32b", $key_1);
		$letra = $this->input->post('letra');

		$data = array(
			'identificador' => $identificador_1,
			'letra' => $letra,
		);

		if ($this->ejercicios_model->guardar_progreso($data)) {
			echo json_encode(['success' => true]);
		} else {
			echo json_encode(['success' => false]);
		}
	}

	public function descubriendo_mensajes_secretos_b()
	{
		$this->load->view('layout/header_letras/header_letraB/header_descubriendo_mensajes_secretos_b');
		$this->load->view('aventuras_del_trazo/bosque_bambu/descubriendo_mensajes_secretos_b');
		$this->load->view('layout/footer');
	}

	public function explorador_hojas_b()
	{
		$this->load->view('layout/header_letras/header_letraB/header_explorador_hojas_b');
		$this->load->view('aventuras_del_trazo/bosque_bambu/explorador_hojas_b');
		$this->load->view('layout/footer');
	}

	public function elementos_perdidos_b()
	{
		$this->load->view('layout/header_letras/header_letraB/header_elementos_perdidos_b');
		$this->load->view('aventuras_del_trazo/bosque_bambu/elementos_perdidos_b');
		$this->load->view('layout/footer');
	}

	public function dino_dice_b()
	{
		$this->load->view('layout/header_letras/header_letraB/header_dino_dice_b');
		$this->load->view('aventuras_del_trazo/bosque_bambu/dino_dice_b');
		$this->load->view('layout/footer');
	}

	public function memorama_b()
	{
		$this->load->view('layout/header_letras/header_letraB/header_memorama_b');
		$this->load->view('aventuras_del_trazo/bosque_bambu/memorama_b');
		$this->load->view('layout/footer');
	}


	public function mi_avance_b()
	{
		$prgreso_list = $this->ejercicios_model->obtener_evaluacion_ejercicios_por_usuario_b($this->session->userdata('identificador'))->result();
		$data['prgreso_list'] = $prgreso_list;

		$this->load->view('layout/header_letras/header_letraB/header_mi_avance_b');
		$this->load->view('aventuras_del_trazo/bosque_bambu/mi_avance_b', $data);
		$this->load->view('layout/footer');
	}
}
