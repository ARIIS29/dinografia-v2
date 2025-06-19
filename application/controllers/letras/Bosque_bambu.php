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

	public function obtener_tabla_evaluacion_ejercicios_por_usuario()
	{
		$draw = $this->input->post('draw');
		$start = $this->input->post('start');
		$length = $this->input->post('length');
		$order = $this->input->post('order');

		$prgreso_list = $this->ejercicios_model->obtener_evaluacion_ejercicios_por_usuario_b($this->session->userdata('identificador'));

		$data = [];

		foreach ($prgreso_list->result() as $key => $value) {


			$data[] = array(
				'id' => $key + 1,
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

	// incio de lecciones

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

	
	public function mi_avance_trazando_aventuras_b()
	{

		$this->load->view('layout/header_letras/header_letraB/header_mi_avance_trazando_aventuras_b');
		$this->load->view('aventuras_del_trazo/bosque_bambu/mi_avance_trazando_aventuras_b');
		$this->load->view('layout/footer');
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
		$identificador_usuario = $this->session->userdata('identificador');
		$letra = $this->input->post('letra');
		$tiempo = $this->input->post('tiempoFinal');
		$correctas = $this->input->post('palabrasCorrectas');
		$incorrectas = $this->input->post('palabrasIncorrectascont');
		$estrellas = $this->input->post('totalEstrellas');
		$array_palabras = json_decode($this->input->post('arrayPalabras'));

		$prueba = $this->ejercicios_model->obtener_evaluacion_ejercicios_por_usuario_b_actualizado($this->session->userdata('identificador'), 'b')->row();


		if ($estrellas <= 200) {
			$evaluacion = '¡A seguir practicando!';
			$observacion = "<b>Descubriendo Palabras - letra b🔍</b><br>¡A seguir practicando explorador!💪<br><i><b>Sugerencia:</b> Observa con más detalle la imagen de referencia e intenta organizar<br>las letras de otra forma, a veces mover una o dos letras puede hacer que la palabra encaje.</i><br> Palabras descubiertas: $correctas de 5 palabras <br> Intentos  utilizados: $incorrectas<br>";
		} else if ($estrellas > 200 && $estrellas <= 900) {
			$evaluacion = '¡Casi lo logras!';
			$observacion = "<b>Descubriendo Palabras - letra b🔍</b><br>¡Casi lo logras explorador!🌟<br><i><b>Sugerencia:</b> Observa bien la imagen de referencia y prueba reorganizar las letras con calma.<br> A veces, pequeños ajustes en el orden pueden hacer que la palabra encaje mejor.</i><br> Palabras descubiertas: $correctas de 5 palabras <br> Intentos  utilizados: $incorrectas<br>";
		} else if ($estrellas == 1000) {
			$evaluacion = '¡Super asombroso!';
			$observacion = "<b>Descubriendo Palabras - letra b🔍</b><br>¡Super asombroso explorador!🎉<br>Lograste descubrir todas las palabras. <br> Tu habilidad para descurbir es impresionante. ¡Sigue así explorador! <br> Palabras descubiertas: $correctas de 5 palabras <br> Intentos  utilizados: $incorrectas<br>";
		}

		foreach ($array_palabras as $key => $value) {
			$indice = $key + 1;
			$observacion .= $indice . '.- ' . $value . '<br>';
			# code...
		}

		$data = array(
			'identificador' => $identificador_1,
			'letra' => $letra,
			'identificador_usuario' => $identificador_usuario,
			'nombre' => '<b>Nombre :</b> Descubriendo Palabras - Letra b.' . "<br>" . '<b>Objetivo :</b> Descubrir las 5 palabras que se forman con la letra b.' . "<br>" . '<b>Estrellas a ganar :</b> 1000 estrellas.' . "<br>" . '<b>Recompensa de estrellas :</b> 200 estrellas por palabra descubierta.' . "<br>" . '<b>Intentos disponibles :</b> 3 intentos.',
			'cronometro' => $tiempo,
			'correctas' => $correctas,
			'incorrectas' => $incorrectas,
			'estrellas' => $estrellas,
			'evaluacion' => $evaluacion,
			'observaciones' => $observacion,
			// 'observaciones' => json_encode($array_palabras),
			'fecha_registro' => $fecha_registro,

		);

		if ($identificador_usuario == $prueba->identificador_usuario) {
			if ($this->ejercicios_model->guardar_progreso_actualizado($data, $prueba->identificador)) {

				echo json_encode(['success' => true]);
			} else {
				echo json_encode(['success' => false]);
			}
		} else {
			if ($this->ejercicios_model->guardar_progreso($data)) {

				echo json_encode(['success' => true]);
			} else {
				echo json_encode(['success' => false]);
			}
		}
	}

	public function guardarRegistroDescubriendoPalbrasB()
	{

		$fecha_registro = date("Y-m-d H:i:s");
		$key_1 = "progreso-" . date("Y-m-d-H-i-s", strtotime($fecha_registro));
		$identificador_1 = hash("crc32b", $key_1);
		$identificador_usuario = $this->session->userdata('identificador');
		$letra = $this->input->post('letra');
		$tiempo = $this->input->post('tiempoFinal');
		$correctas = $this->input->post('palabrasCorrectas');
		$incorrectas = $this->input->post('palabrasIncorrectascont');
		$estrellas = $this->input->post('totalEstrellas');
		$array_palabras = json_decode($this->input->post('arrayPalabras'));

		if ($estrellas <= 200) {
			$evaluacion = '¡A seguir practicando!';
			$observacion = "<b>Descubriendo Palabras - letra b🔍</b><br>¡A seguir practicando explorador!💪<br><i><b>Sugerencia:</b> Observa con más detalle la imagen de referencia e intenta organizar<br>las letras de otra forma, a veces mover una o dos letras puede hacer que la palabra encaje.</i><br> Palabras descubiertas: $correctas de 5 palabras <br> Intentos  utilizados: $incorrectas<br>";
		} else if ($estrellas > 200 && $estrellas <= 900) {
			$evaluacion = '¡Casi lo logras!';
			$observacion = "<b>Descubriendo Palabras - letra b🔍</b><br>¡Casi lo logras explorador!🌟<br><i><b>Sugerencia:</b> Observa bien la imagen de referencia y prueba reorganizar las letras con calma.<br> A veces, pequeños ajustes en el orden pueden hacer que la palabra encaje mejor.</i><br> Palabras descubiertas: $correctas de 5 palabras <br> Intentos  utilizados: $incorrectas<br>";
		} else if ($estrellas == 1000) {
			$evaluacion = '¡Super asombroso!';
			$observacion = "<b>Descubriendo Palabras - letra b🔍</b><br>¡Super asombroso explorador!🎉<br>Lograste descubrir todas las palabras. <br> Tu habilidad para descurbir es impresionante. ¡Sigue así explorador! <br> Palabras descubiertas: $correctas de 5 palabras <br> Intentos  utilizados: $incorrectas<br>";
		}

		foreach ($array_palabras as $key => $value) {
			$indice = $key + 1;
			$observacion .= $indice . '.- ' . $value . '<br>';
			# code...
		}

		$data = array(
			'identificador' => $identificador_1,
			'letra' => $letra,
			'identificador_usuario' => $identificador_usuario,
			'nombre' => '<b>Nombre :</b> Descubriendo Palabras - Letra b.' . "<br>" . '<b>Objetivo :</b> Descubrir las 5 palabras que se forman con la letra b.' . "<br>" . '<b>Estrellas a ganar :</b> 1000 estrellas.' . "<br>" . '<b>Recompensa de estrellas :</b> 200 estrellas por palabra descubierta.' . "<br>" . '<b>Intentos disponibles :</b> 3 intentos.',
			'cronometro' => $tiempo,
			'correctas' => $correctas,
			'incorrectas' => $incorrectas,
			'estrellas' => $estrellas,
			'evaluacion' => $evaluacion,
			'observaciones' => $observacion,
			// 'observaciones' => json_encode($array_palabras),
			'fecha_registro' => $fecha_registro,

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

	public function enviarEvaluacionDescubriendoMensajesSecretosB()
	{

		$fecha_registro = date("Y-m-d H:i:s");
		$key_1 = "progreso-" . date("Y-m-d-H-i-s", strtotime($fecha_registro));
		$identificador_1 = hash("crc32b", $key_1);
		$identificador_usuario = $this->session->userdata('identificador');
		$letra = $this->input->post('letra');
		$tiempo = $this->input->post('tiempoFinal');
		$correctas = $this->input->post('palabrasCorrectas');
		$incorrectas = $this->input->post('palabrasIncorrectascont');
		$estrellas = $this->input->post('totalEstrellas');
		$array_palabras = json_decode($this->input->post('arrayPalabras'));

		$prueba = $this->ejercicios_model->obtener_evaluacion_ejercicios_por_usuario_b_actualizado($this->session->userdata('identificador'), 'b')->row();


		if ($estrellas <= 200) {
			$evaluacion = '¡A seguir practicando!';
			$observacion = "<b>Mensajes Secretos - letra b📜</b><br>¡A seguir practicando explorador!💪<br><i><b>Sugerencia:</b> Tómate tu tiempo para reorganizar las palabras con calma.<br> Recuerda visitar más seguido el portal de <b>Exploremos</b>, ¡te ayudará a descubrir los mensajes secretos de la letra b con facilidad!</i><br>Palabras descubiertas: $correctas de 5 mensajes secretos <br> Errores cometidos: $incorrectas<br>";
		} else if ($estrellas > 200 && $estrellas <= 900) {
			$evaluacion = '¡Casi lo logras!';
			$observacion = "<b>Mensajes Secretos - letra b📜</b><br>¡Casi lo logras explorador!🌟<br><i><b>Sugerencia:</b> Sigue reorganizando las palabras con calma y piensa en las características de la letra b.<br>No olvides usar el portal de <b>Exploremos</b> con más frecuencia, ¡te ayudará a descubrir los secretos más rápido!</i><br>Palabras descubiertas: $correctas de 5 mensajes secreto <br> Errores cometidos: $incorrectas<br>";
		} else if ($estrellas == 1000) {
			$evaluacion = '¡Super asombroso!';
			$observacion = "<b>Mensajes Secretos - letra b📜</b><br>¡Super asombroso explorador!🎉<br>Lograste descifrar todos los mensajes secretos.<br>Tu habilidad para descubrir los mensajes secretos de la letra b. ¡Sigue así explorador!<br>Palabras descubiertas: $correctas de 5 mensajes secreto <br> Errores cometidos: $incorrectas<br>";
		}

		foreach ($array_palabras as $key => $value) {
			$indice = $key + 1;
			$observacion .= $indice . '.- ' . $value . '<br>';
			# code...
		}

		$data = array(
			'identificador' => $identificador_1,
			'letra' => $letra,
			'identificador_usuario' => $identificador_usuario,
			'nombre' => '<b>Nombre :</b> Mensajes secretos - Letra b.' . "<br>" . '<b>Objetivo :</b> Descubrir los 5 mensajes secretos.' . "<br>" . '<b>Estrellas a ganar :</b> 1000 estrellas.' . "<br>" . '<b>Recompensa de estrellas :</b> 200 estrellas por mensaje descubierto.' . "<br>" . '<b>Total de mensajes secretos a descubrir :</b> 5 mensajes.' . "<br>" . '<b>Intentos disponibles :</b> 3 intentos.',
			'cronometro' => $tiempo,
			'correctas' => $correctas,
			'incorrectas' => $incorrectas,
			'estrellas' => $estrellas,
			'evaluacion' => $evaluacion,
			'observaciones' => $observacion,
			// 'observaciones' => json_encode($array_palabras),
			'fecha_registro' => $fecha_registro,

		);

		if ($identificador_usuario == $prueba->identificador_usuario) {
			if ($this->ejercicios_model->guardar_progreso_actualizado($data, $prueba->identificador)) {

				echo json_encode(['success' => true]);
			} else {
				echo json_encode(['success' => false]);
			}
		} else {
			if ($this->ejercicios_model->guardar_progreso($data)) {

				echo json_encode(['success' => true]);
			} else {
				echo json_encode(['success' => false]);
			}
		}
	}

	public function guardarRegistroDescubriendoMensajesSecretosB()
	{

		$fecha_registro = date("Y-m-d H:i:s");
		$key_1 = "progreso-" . date("Y-m-d-H-i-s", strtotime($fecha_registro));
		$identificador_1 = hash("crc32b", $key_1);
		$identificador_usuario = $this->session->userdata('identificador');
		$letra = $this->input->post('letra');
		$tiempo = $this->input->post('tiempoFinal');
		$correctas = $this->input->post('palabrasCorrectas');
		$incorrectas = $this->input->post('palabrasIncorrectascont');
		$estrellas = $this->input->post('totalEstrellas');
		$array_palabras = json_decode($this->input->post('arrayPalabras'));

		if ($estrellas <= 200) {
			$evaluacion = '¡A seguir practicando!';
			$observacion = "<b>Mensajes Secretos - letra b📜</b><br>¡A seguir practicando explorador!💪<br><i><b>Sugerencia:</b> Tómate tu tiempo para reorganizar las palabras con calma.<br> Recuerda visitar más seguido el portal de <b>Exploremos</b>, ¡te ayudará a descubrir los mensajes secretos de la letra b con facilidad!</i><br>Palabras descubiertas: $correctas de 5 mensajes secretos <br> Errores cometidos: $incorrectas<br>";
		} else if ($estrellas > 200 && $estrellas <= 900) {
			$evaluacion = '¡Casi lo logras!';
			$observacion = "<b>Mensajes Secretos - letra b📜</b><br>¡Casi lo logras explorador!🌟<br><i><b>Sugerencia:</b> Sigue reorganizando las palabras con calma y piensa en las características de la letra b.<br>No olvides usar el portal de <b>Exploremos</b> con más frecuencia, ¡te ayudará a descubrir los secretos más rápido!</i><br>Palabras descubiertas: $correctas de 5 mensajes secreto <br> Errores cometidos: $incorrectas<br>";
		} else if ($estrellas == 1000) {
			$evaluacion = '¡Super asombroso!';
			$observacion = "<b>Mensajes Secretos - letra b📜</b><br>¡Super asombroso explorador!🎉<br>Lograste descifrar todos los mensajes secretos.<br>Tu habilidad para descubrir los mensajes secretos de la letra b. ¡Sigue así explorador!<br>Palabras descubiertas: $correctas de 5 mensajes secreto <br> Errores cometidos: $incorrectas<br>";
		}

		foreach ($array_palabras as $key => $value) {
			$indice = $key + 1;
			$observacion .= $indice . '.- ' . $value . '<br>';
			# code...
		}

		$data = array(
			'identificador' => $identificador_1,
			'letra' => $letra,
			'identificador_usuario' => $identificador_usuario,
			'nombre' => '<b>Nombre :</b> Mensajes secretos - Letra b.' . "<br>" . '<b>Objetivo :</b> Descubrir los 5 mensajes secretos.' . "<br>" . '<b>Estrellas a ganar :</b> 1000 estrellas.' . "<br>" . '<b>Recompensa de estrellas :</b> 200 estrellas por mensaje descubierto.' . "<br>" . '<b>Total de mensajes secretos a descubrir :</b> 5 mensajes.' . "<br>" . '<b>Intentos disponibles :</b> 3 intentos.',
			'cronometro' => $tiempo,
			'correctas' => $correctas,
			'incorrectas' => $incorrectas,
			'estrellas' => $estrellas,
			'evaluacion' => $evaluacion,
			'observaciones' => $observacion,
			// 'observaciones' => json_encode($array_palabras),
			'fecha_registro' => $fecha_registro,

		);


		if ($this->ejercicios_model->guardar_progreso($data)) {

			echo json_encode(['success' => true]);
		} else {
			echo json_encode(['success' => false]);
		}
	}



	public function explorador_hojas_b()
	{

		$this->load->view('layout/header_letras/header_letraB/header_explorador_hojas_b');
		$this->load->view('aventuras_del_trazo/bosque_bambu/explorador_hojas_b');
		$this->load->view('layout/footer');
	}

	public function enviarEvaluacionExploradorHojasB()
	{

		$fecha_registro = date("Y-m-d H:i:s");
		$key_1 = "progreso-" . date("Y-m-d-H-i-s", strtotime($fecha_registro));
		$identificador_1 = hash("crc32b", $key_1);
		$identificador_usuario = $this->session->userdata('identificador');
		$letra = $this->input->post('letra');
		$tiempo = $this->input->post('tiempoFinal');
		$puntaje = $this->input->post('hojasAtrapadas');
		$hojasNoAtrapadas = $this->input->post('hojasIncorrectas');
		$estrellas = $this->input->post('totalEstrellas');

		$prueba = $this->ejercicios_model->obtener_evaluacion_ejercicios_por_usuario_b_actualizado($this->session->userdata('identificador'), 'b')->row();

		if ($estrellas <= 100) {
			$evaluacion = '¡A seguir practicando!';
			$observacion = "<b>Explorador de hojas - letra b🌿</b><br>¡A seguir practicando explorador!💪<br><i><b>Sugerencia:</b> Para atrapar más hojas, enfócate en reaccionar más rápido <br>y observa cada movimiento con atención. ¡Tus reflejos son clave para mejorar! <br>Lograste atrapar $puntaje hojas de 10 hojas <br>";
		} else if ($estrellas > 100 && $estrellas <= 900) {
			$evaluacion = '¡Casi lo logras!';
			$observacion = "<b>Explorador de hojas - letra b🌿</b><br>¡Casi lo logras explorador!🌟<br><i><b>Sugerencia:</b> Para atrapar más hojas, trata de mejorar la velocidad de tu reacción<br> y observa con más detalle cada movimiento. ¡Estás cerca de lograrlo! <br>Lograste atrapar $puntaje hojas de 10 hojas <br>";
		} else if ($estrellas == 1000) {
			$evaluacion = '¡Super asombroso!';
			$observacion = "<b>Explorador de hojas - letra b🌿</b><br>¡Super asombroso explorador!🎉<br>Lograste atrapar todas las hojas sin que se te escapara ninguna. <br> Tu destreza en los reflejos es asombrosa. ¡Sigue así y atraparás todas las hojas! <br>Lograste atrapar $puntaje hojas de 10 hojas <br>";
		}
		$data = array(
			'identificador' => $identificador_1,
			'letra' => $letra,
			'identificador_usuario' => $identificador_usuario,
			'nombre' => '<b>Nombre :</b> Explorador de hojas - Letra b.' . "<br>" . '<b>Objetivo :</b> Atrapar las hojas que aparecen en pantalla.' . "<br>" . '<b>Estrellas a ganar :</b> 1000 estrellas.' . "<br>" . '<b>Recompensa de estrellas :</b> 100 estrellas por hoja atrapada.' . "<br>" . '<b>Total de hojas a atrapar :</b> 10 hojas.',
			'cronometro' => $tiempo,
			'correctas' => $puntaje,
			'incorrectas' => $hojasNoAtrapadas,
			'estrellas' => $estrellas,
			'evaluacion' => $evaluacion,
			'observaciones' => $observacion,
			'fecha_registro' => $fecha_registro,
		);
		if (($identificador_usuario == $prueba->identificador_usuario)) {
			if ($this->ejercicios_model->guardar_progreso_actualizado($data, $prueba->identificador)) {

				echo json_encode(['success' => true]);
			} else {
				echo json_encode(['success' => false]);
			}
		} else {
			if ($this->ejercicios_model->guardar_progreso($data)) {

				echo json_encode(['success' => true]);
			} else {
				echo json_encode(['success' => false]);
			}
		}
	}

	public function guardarRegistroEvaluacionExploradorHojasB()
	{
		$fecha_registro = date("Y-m-d H:i:s");
		$key_1 = "progreso-" . date("Y-m-d-H-i-s", strtotime($fecha_registro));
		$identificador_1 = hash("crc32b", $key_1);
		$identificador_usuario = $this->session->userdata('identificador');
		$letra = $this->input->post('letra');
		$tiempo = $this->input->post('tiempoFinal');
		$puntaje = $this->input->post('hojasAtrapadas');
		$hojasNoAtrapadas = $this->input->post('hojasIncorrectas');
		$estrellas = $this->input->post('totalEstrellas');

		if ($estrellas <= 100) {
			$evaluacion = '¡A seguir practicando!';
			$observacion = "<b>Explorador de hojas - letra b🌿</b><br>¡A seguir practicando explorador!💪<br><i><b>Sugerencia:</b> Para atrapar más hojas, enfócate en reaccionar más rápido <br>y observa cada movimiento con atención. ¡Tus reflejos son clave para mejorar! <br>Lograste atrapar $puntaje hojas de 10 hojas <br>";
		} else if ($estrellas > 100 && $estrellas <= 900) {
			$evaluacion = '¡Casi lo logras!';
			$observacion = "<b>Explorador de hojas - letra b🌿</b><br>¡Casi lo logras explorador!🌟<br><i><b>Sugerencia:</b> Para atrapar más hojas, trata de mejorar la velocidad de tu reacción<br> y observa con más detalle cada movimiento. ¡Estás cerca de lograrlo! <br>Lograste atrapar $puntaje hojas de 10 hojas <br>";
		} else if ($estrellas == 1000) {
			$evaluacion = '¡Super asombroso!';
			$observacion = "<b>Explorador de hojas - letra b🌿</b><br>¡Super asombroso explorador!🎉<br>Lograste atrapar todas las hojas sin que se te escapara ninguna. <br> Tu destreza en los reflejos es asombrosa. ¡Sigue así y atraparás todas las hojas! <br>Lograste atrapar $puntaje hojas de 10 hojas <br>";
		}
		$data = array(
			'identificador' => $identificador_1,
			'letra' => $letra,
			'identificador_usuario' => $identificador_usuario,
			'nombre' => '<b>Nombre :</b> Explorador de hojas - Letra b.' . "<br>" . '<b>Objetivo :</b> Atrapar las hojas que aparecen en pantalla.' . "<br>" . '<b>Estrellas a ganar :</b> 1000 estrellas.' . "<br>" . '<b>Recompensa de estrellas :</b> 100 estrellas por hoja atrapada.' . "<br>" . '<b>Total de hojas a atrapar :</b> 10 hojas.',
			'cronometro' => $tiempo,
			'correctas' => $puntaje,
			'incorrectas' => $hojasNoAtrapadas,
			'estrellas' => $estrellas,
			'evaluacion' => $evaluacion,
			'observaciones' => $observacion,
			'fecha_registro' => $fecha_registro,
		);
		if ($this->ejercicios_model->guardar_progreso($data)) {
			echo json_encode(['success' => true]);
		} else {
			echo json_encode(['success' => false]);
		}
	}

	public function elementos_perdidos_b()
	{
		$this->load->view('layout/header_letras/header_letraB/header_elementos_perdidos_b');
		$this->load->view('aventuras_del_trazo/bosque_bambu/elementos_perdidos_b');
		$this->load->view('layout/footer');
	}
	public function enviarEvaluacionElementosPerdidosB()
	{

		$fecha_registro = date("Y-m-d H:i:s");
		$key_1 = "progreso-" . date("Y-m-d-H-i-s", strtotime($fecha_registro));
		$identificador_1 = hash("crc32b", $key_1);
		$identificador_usuario = $this->session->userdata('identificador');
		$letra = $this->input->post('letra');
		$tiempo = $this->input->post('tiempoFinal');
		$objetosCorrectos = $this->input->post('objetosCorrectos');
		$objetosIncorrectos = $this->input->post('objetosIncorrectos');
		$estrellas = $this->input->post('totalEstrellas');
		$arrayObjetosIncorrectos = json_decode($this->input->post('arrayObjetosIncorrectos'), true);

		$prueba = $this->ejercicios_model->obtener_evaluacion_ejercicios_por_usuario_b_actualizado($this->session->userdata('identificador'), 'b')->row();

		if ($estrellas <= 50) {
			$evaluacion = '¡A seguir practicando!';
			$observacion = "<b>Elementos perdidos - letra b👀</b><br>¡A seguir practicando explorador!💪<br><i>Sugerencia: Mira bien las características del elemento a buscar.<br> Algunos detalles pueden ser pequeños, pero te ayudarán a encontrar los más parecidos.</i><br> Elementos encontrados: $objetosCorrectos de 20 elementos perdidos <br> Errores cometidos: $objetosIncorrectos<br>";
		} else if ($estrellas > 50 && $estrellas <= 950) {
			$evaluacion = '¡Casi lo logras!';
			$observacion = "<b>Elementos perdidos - letra b👀</b><br>¡Casi lo logras explorador!🌟<br><i>Sugerencia: Estás cerca. Revisa más detenidamente los elementos y asegúrate de comparar todos los detalles.</i><br>Elementos encontrados: $objetosCorrectos de 20 elementos perdidos <br> Errores cometidos: $objetosIncorrectos<br>";
		} else if ($estrellas == 1000) {
			$evaluacion = '¡Super asombroso!';
			$observacion = "<b>Elementos perdidos - letra b👀</b><br>¡Super asombroso explorador!🎉<br>Encontraste todos los elementos.¡Sigue así explorador!<br> Tienes buena habilidad para distinguir y tu atención a los detalles son impresionantes.<br>Elementos encontrados: $objetosCorrectos de 20 elementos perdidos <br> Errores cometidos: $objetosIncorrectos<br>";
		}

		foreach ($arrayObjetosIncorrectos as $key => $value) {
			$indice = $key + 1;
			$observacion .= $indice . ". 🔴 <b>Elemento seleccionado:</b> " . $value['seleccionado'] . " - 🟢 <b>Elemento correcto:</b> " . $value['correcto'] . "<br>";
		}
		$data = array(
			'identificador' => $identificador_1,
			'letra' => $letra,
			'identificador_usuario' => $identificador_usuario,
			'nombre' => '<b> Nombre :</b> Elementos perdidos - Letra b' . "<br>" . '<b>Objetivo :</b> Encontrar todos los elementos perdidos en el bosque de bambú.' . "<br>" . '<b>Estrellas a ganar :</b> 1000 estrellas .' . "<br>" . '<b>Recompensa de estrellas :</b> 50 estrellas por elementos encontrado.' . "<br>" . '<b>Total de elementos a encontrar :</b> 20 elementos perdidios.' . "<br>" . '<b>Intentos disponibles :</b> 3 intentos.',
			'cronometro' => $tiempo,
			'correctas' => $objetosCorrectos,
			'incorrectas' => $objetosIncorrectos,
			'estrellas' => $estrellas,
			'evaluacion' => $evaluacion,
			'observaciones' => $observacion,
			'fecha_registro' => $fecha_registro,
		);
		if (($identificador_usuario == $prueba->identificador_usuario)) {
			if ($this->ejercicios_model->guardar_progreso_actualizado($data, $prueba->identificador)) {

				echo json_encode(['success' => true]);
			} else {
				echo json_encode(['success' => false]);
			}
		} else {
			if ($this->ejercicios_model->guardar_progreso($data)) {

				echo json_encode(['success' => true]);
			} else {
				echo json_encode(['success' => false]);
			}
		}
	}

	public function guardarRegistroElementosPerdidos()
	{
		$fecha_registro = date("Y-m-d H:i:s");
		$key_1 = "progreso-" . date("Y-m-d-H-i-s", strtotime($fecha_registro));
		$identificador_1 = hash("crc32b", $key_1);
		$identificador_usuario = $this->session->userdata('identificador');
		$letra = $this->input->post('letra');
		$tiempo = $this->input->post('tiempoFinal');
		$objetosCorrectos = $this->input->post('objetosCorrectos');
		$objetosIncorrectos = $this->input->post('objetosIncorrectos');
		$estrellas = $this->input->post('totalEstrellas');
		$arrayObjetosIncorrectos = json_decode($this->input->post('arrayObjetosIncorrectos'), true);

		if ($estrellas <= 50) {
			$evaluacion = '¡A seguir practicando!';
			$observacion = "<b>Elementos perdidos - letra b👀</b><br>¡A seguir practicando explorador!💪<br><i>Sugerencia: Mira bien las características del elemento a buscar.<br> Algunos detalles pueden ser pequeños, pero te ayudarán a encontrar los más parecidos.</i><br> Elementos encontrados: $objetosCorrectos de 20 elementos perdidos <br> Errores cometidos: $objetosIncorrectos<br>";
		} else if ($estrellas > 50 && $estrellas <= 950) {
			$evaluacion = '¡Casi lo logras!';
			$observacion = "<b>Elementos perdidos - letra b👀</b><br>¡Casi lo logras explorador!🌟<br><i>Sugerencia: Estás cerca. Revisa más detenidamente los elementos y asegúrate de comparar todos los detalles.</i><br>Elementos encontrados: $objetosCorrectos de 20 elementos perdidos <br> Errores cometidos: $objetosIncorrectos<br>";
		} else if ($estrellas == 1000) {
			$evaluacion = '¡Super asombroso!';
			$observacion = "<b>Elementos perdidos - letra b👀</b><br>¡Super asombroso explorador!🎉<br>Encontraste todos los elementos.¡Sigue así explorador!<br> Tienes buena habilidad para distinguir y tu atención a los detalles son impresionantes.<br>Elementos encontrados: $objetosCorrectos de 20 elementos perdidos <br> Errores cometidos: $objetosIncorrectos<br>";
		}

		foreach ($arrayObjetosIncorrectos as $key => $value) {
			$indice = $key + 1;
			$observacion .= $indice . ". 🔴 <b>Elemento seleccionado:</b> " . $value['seleccionado'] . " - 🟢 <b>Elemento correcto:</b> " . $value['correcto'] . "<br>";
		}
		$data = array(
			'identificador' => $identificador_1,
			'letra' => $letra,
			'identificador_usuario' => $identificador_usuario,
			'nombre' => '<b> Nombre :</b> Elementos perdidos - Letra b' . "<br>" . '<b>Objetivo :</b> Encontrar todos los elementos perdidos en el bosque de bambú.' . "<br>" . '<b>Estrellas a ganar :</b> 1000 estrellas .' . "<br>" . '<b>Recompensa de estrellas :</b> 50 estrellas por elementos encontrado.' . "<br>" . '<b>Total de elementos a encontrar :</b> 20 elementos perdidios.' . "<br>" . '<b>Intentos disponibles :</b> 3 intentos.',
			'cronometro' => $tiempo,
			'correctas' => $objetosCorrectos,
			'incorrectas' => $objetosIncorrectos,
			'estrellas' => $estrellas,
			'evaluacion' => $evaluacion,
			'observaciones' => $observacion,
			'fecha_registro' => $fecha_registro,
		);
		if ($this->ejercicios_model->guardar_progreso($data)) {
			echo json_encode(['success' => true]);
		} else {
			echo json_encode(['success' => false]);
		}
	}

	public function dino_dice_b()
	{
		$this->load->view('layout/header_letras/header_letraB/header_dino_dice_b');
		$this->load->view('aventuras_del_trazo/bosque_bambu/dino_dice_b');
		$this->load->view('layout/footer');
	}
	public function enviarEvaluacionDinoDiceB()
	{
		$fecha_registro = date("Y-m-d H:i:s");
		$key_1 = "progreso-" . date("Y-m-d-H-i-s", strtotime($fecha_registro));
		$identificador_1 = hash("crc32b", $key_1);
		$letra = $this->input->post('letra');
		$identificador_usuario = $this->session->userdata('identificador');
		$tiempo = $this->input->post('tiempoFinal');
		$contadorCorrectos = $this->input->post('objetosCorrectos');
		$contadorIncorrectas = $this->input->post('intentosInocrrectos');
		$estrellas = $this->input->post('totalEstrellas');
		$arrayObjetosIncorrectos = json_decode($this->input->post('arrayObjetosIncorrectos'), true);

		// $arrayObjetosIncorrectos = json_decode($this->input->post('objetosIncorrectos'));
		$prueba = $this->ejercicios_model->obtener_evaluacion_ejercicios_por_usuario_b_actualizado($this->session->userdata('identificador'), 'b')->row();


		if ($estrellas <= 100) {
			$evaluacion = '¡A seguir practicando!';
			$observacion = "<b>¡Hazle caso al Dino! - letra b🦖</b><br>¡A seguir practicando explorador!💪<br><i>Sugerencia: Tómate tu tiempo para leer bien las instrucciones.<br> Observa cada objeto con detalle y compáralo cuidadosamente con lo que se te pide antes de seleccionarlo.</i><br> Objetos recolectados: $contadorCorrectos de 10 objetos <br> Errores cometidos: $contadorIncorrectas <br>";
		} else if ($estrellas > 100 && $estrellas <= 900) {
			$evaluacion = '¡Casi lo logras!';
			$observacion = "<b>¡Hazle caso al Dino! - letra b🦖</b><br>¡Casi lo logras explorador!🌟<br><i>Sugerencia:  Asegúrate de leer bien las instrucciones y observar cada objeto con más detalle.<br> Intenta comparar los objetos con calma antes de seleccionarlos.</i><br> Objetos recolectados: $contadorCorrectos de 10 objetos <br> Errores cometidos: $contadorIncorrectas <br>";
		} else if ($estrellas == 1000) {
			$evaluacion = '¡Super asombroso!';
			$observacion = "<b>¡Hazle caso al Dino! - letra b🦖</b><br>¡Super asombroso explorador!🎉<br>Encontraste todos los objetos sin cometer ningún error. ¡Sigue así explorador! <br> Tu capacidad para seguir instrucciones y tu atención a los detalles son impresionantes.<br>Objetos recolectados: $contadorCorrectos de 10 objetos <br> Errores cometidos: $contadorIncorrectas <br>";
		}

		foreach ($arrayObjetosIncorrectos as $key => $value) {
			$indice = $key + 1;
			$observacion .= $indice . ". 🔴 <b>Elemento seleccionado:</b> " . $value['seleccionado'] . " - 🟢 <b>Elemento correcto:</b> " . $value['correcto'] . "<br>";
		}



		$data = array(
			'identificador' => $identificador_1,
			'letra' => $letra,
			'identificador_usuario' => $identificador_usuario,
			'nombre' => '<b>Nombre :</b> Hazle Caso al Dino - Letra b.' . "<br>" . '<b>Objetivo :</b> Recolectar los objetos que el Dino indique.' . "<br>" . '<b>Estrellas a ganar :</b> 1000 estrellas.' . "<br>" . '<b>Recompensa de estrellas :</b> 100 estrellas por objeto recolectado.' . "<br>" . '<b>Total de objetos a recolectar :</b> 10 objetos.' . "<br>" . '<b>Intentos disponibles :</b> 3 intentos.',
			'cronometro' => $tiempo,
			'correctas' => $contadorCorrectos,
			'incorrectas' => $contadorIncorrectas,
			'estrellas' => $estrellas,
			'evaluacion' => $evaluacion,
			'observaciones' => $observacion,
			'fecha_registro' => $fecha_registro,
		);
		if (($identificador_usuario == $prueba->identificador_usuario)) {
			if ($this->ejercicios_model->guardar_progreso_actualizado($data, $prueba->identificador)) {

				echo json_encode(['success' => true]);
			} else {
				echo json_encode(['success' => false]);
			}
		} else {
			if ($this->ejercicios_model->guardar_progreso($data)) {

				echo json_encode(['success' => true]);
			} else {
				echo json_encode(['success' => false]);
			}
		}
	}

	public function guardarRegistroEvaluacionDinoDiceB()
	{
		$fecha_registro = date("Y-m-d H:i:s");
		$key_1 = "progreso-" . date("Y-m-d-H-i-s", strtotime($fecha_registro));
		$identificador_1 = hash("crc32b", $key_1);
		$letra = $this->input->post('letra');
		$identificador_usuario = $this->session->userdata('identificador');
		$tiempo = $this->input->post('tiempoFinal');
		$contadorCorrectos = $this->input->post('objetosCorrectos');
		$contadorIncorrectas = $this->input->post('intentosInocrrectos');
		$estrellas = $this->input->post('totalEstrellas');
		$arrayObjetosIncorrectos = json_decode($this->input->post('arrayObjetosIncorrectos'), true);

		// $arrayObjetosIncorrectos = json_decode($this->input->post('objetosIncorrectos'));


		if ($estrellas <= 100) {
			$evaluacion = '¡A seguir practicando!';
			$observacion = "<b>¡Hazle caso al Dino! - letra b🦖</b><br>¡A seguir practicando explorador!💪<br><i>Sugerencia: Tómate tu tiempo para leer bien las instrucciones.<br> Observa cada objeto con detalle y compáralo cuidadosamente con lo que se te pide antes de seleccionarlo.</i><br> Objetos recolectados: $contadorCorrectos de 10 objetos <br> Errores cometidos: $contadorIncorrectas <br>";
		} else if ($estrellas > 100 && $estrellas <= 900) {
			$evaluacion = '¡Casi lo logras!';
			$observacion = "<b>¡Hazle caso al Dino! - letra b🦖</b><br>¡Casi lo logras explorador!🌟<br><i>Sugerencia:  Asegúrate de leer bien las instrucciones y observar cada objeto con más detalle.<br> Intenta comparar los objetos con calma antes de seleccionarlos.</i><br> Objetos recolectados: $contadorCorrectos de 10 objetos <br> Errores cometidos: $contadorIncorrectas <br>";
		} else if ($estrellas == 1000) {
			$evaluacion = '¡Super asombroso!';
			$observacion = "<b>¡Hazle caso al Dino! - letra b🦖</b><br>¡Super asombroso explorador!🎉<br>Encontraste todos los objetos sin cometer ningún error. ¡Sigue así explorador! <br> Tu capacidad para seguir instrucciones y tu atención a los detalles son impresionantes.<br>Objetos recolectados: $contadorCorrectos de 10 objetos <br> Errores cometidos: $contadorIncorrectas <br>";
		}

		foreach ($arrayObjetosIncorrectos as $key => $value) {
			$indice = $key + 1;
			$observacion .= $indice . ". 🔴 <b>Elemento seleccionado:</b> " . $value['seleccionado'] . " - 🟢 <b>Elemento correcto:</b> " . $value['correcto'] . "<br>";
		}

		$data = array(
			'identificador' => $identificador_1,
			'letra' => $letra,
			'identificador_usuario' => $identificador_usuario,
			'nombre' => '<b>Nombre :</b> Hazle Caso al Dino - Letra b.' . "<br>" . '<b>Objetivo :</b> Recolectar los objetos que el Dino indique.' . "<br>" . '<b>Estrellas a ganar :</b> 1200 estrellas.' . "<br>" . '<b>Recompensa de estrellas :</b> 100 estrellas por objeto recolectado.' . "<br>" . '<b>Total de objetos a recolectar :</b> 10 objetos.' . "<br>" . '<b>Intentos disponibles :</b> 3 intentos.',
			'cronometro' => $tiempo,
			'correctas' => $contadorCorrectos,
			'incorrectas' => $contadorIncorrectas,
			'estrellas' => $estrellas,
			'evaluacion' => $evaluacion,
			'observaciones' => $observacion,
			'fecha_registro' => $fecha_registro,
		);
		if ($this->ejercicios_model->guardar_progreso($data)) {
			echo json_encode(['success' => true]);
		} else {
			echo json_encode(['success' => false]);
		}
	}

	public function memorama_b()
	{
		$this->load->view('layout/header_letras/header_letraB/header_memorama_b');
		$this->load->view('aventuras_del_trazo/bosque_bambu/memorama_b');
		$this->load->view('layout/footer');
	}
	public function enviarEvaluacionMemorama()
	{
		$fecha_registro = date("Y-m-d H:i:s");
		$key_1 = "progreso-" . date("Y-m-d-H-i-s", strtotime($fecha_registro));
		$identificador_1 = hash("crc32b", $key_1);
		$letra = $this->input->post('letra');
		$identificador_usuario = $this->session->userdata('identificador');
		$tiempo = $this->input->post('tiempoFinal');
		$paresTotalesEncontrados = $this->input->post('paresCorrectos');
		$contadorIncorrectas = $this->input->post('intentosInocrrectos');
		$estrellas = $this->input->post('totalEstrellas');

		// $arrayObjetosIncorrectos = json_decode($this->input->post('objetosIncorrectos'));
		$prueba = $this->ejercicios_model->obtener_evaluacion_ejercicios_por_usuario_b_actualizado($this->session->userdata('identificador'), 'b')->row();


		if ($estrellas <= 100) {
			$evaluacion = '¡A seguir practicando!';
			$observacion = "<b>¡Encuentra y Descubre! - letra b🦖</b><br>¡A seguir practicando explorador!💪<br><i>Sugerencia: Tómate tu tiempo para observar bien cada emoji y leer con atención las palabras.<br> Busca detalles que te ayuden a relacionar el emoji con la palabra que más se le parezca.</i><br> Parejas encontradas: $paresTotalesEncontrados de 12 parejas <br> Intentos fallidos: $contadorIncorrectas <br>";
		} else if ($estrellas > 100 && $estrellas <= 1100) {
			$evaluacion = '¡Casi lo logras!';
			$observacion = "<b>¡Encuentra y Descubre! - letra b🦖</b><br>¡Casi lo logras explorador!🌟<br><i>Sugerencia:  Fíjate bien en el emoji. ¿Qué palabra lo describe mejor? No te apresures, tómate tu tiempo y observa con atención. ¡Tú puedes!</i><br> Parejas encontradas: $paresTotalesEncontrados de 12 parejas <br> Intentos fallidos: $contadorIncorrectas <br>";
		} else if ($estrellas == 1200) {
			$evaluacion = '¡Super asombroso!';
			$observacion = "<b>¡Encuentra y Descubre! - letra b🦖</b><br>¡Super asombroso explorador!🎉<br>Encontraste todas las parejas. ¡Sigue así explorador! <br> Tu capacidad para encontrar y tu atención a los detalles para descubrir son impresionantes.<br>Parejas encontradas: $paresTotalesEncontrados de 12 parejas <br> Intentos fallidos: $contadorIncorrectas <br>";
		}




		$data = array(
			'identificador' => $identificador_1,
			'letra' => $letra,
			'identificador_usuario' => $identificador_usuario,
			'nombre' => '<b>Nombre :</b> Memorama - Letra b.' . "<br>" . '<b>Objetivo :</b> Encontrar las parejas correctas.' . "<br>" . '<b>Estrellas a ganar :</b> 1200 estrellas.' . "<br>" . '<b>Recompensa de estrellas :</b> 100 estrellas por pareja encontrada.' . "<br>" . '<b>Total de parejas a encontra :</b> 12 parejas.' . "<br>",
			'cronometro' => $tiempo,
			'correctas' => $paresTotalesEncontrados,
			'incorrectas' => $contadorIncorrectas,
			'estrellas' => $estrellas,
			'evaluacion' => $evaluacion,
			'observaciones' => $observacion,
			'fecha_registro' => $fecha_registro,
		);
		if (($identificador_usuario == $prueba->identificador_usuario)) {
			if ($this->ejercicios_model->guardar_progreso_actualizado($data, $prueba->identificador)) {

				echo json_encode(['success' => true]);
			} else {
				echo json_encode(['success' => false]);
			}
		} else {
			if ($this->ejercicios_model->guardar_progreso($data)) {

				echo json_encode(['success' => true]);
			} else {
				echo json_encode(['success' => false]);
			}
		}
	}

	public function guardarRegistroMemorama()
	{
		$fecha_registro = date("Y-m-d H:i:s");
		$key_1 = "progreso-" . date("Y-m-d-H-i-s", strtotime($fecha_registro));
		$identificador_1 = hash("crc32b", $key_1);
		$letra = $this->input->post('letra');
		$identificador_usuario = $this->session->userdata('identificador');
		$tiempo = $this->input->post('tiempoFinal');
		$paresTotalesEncontrados = $this->input->post('paresCorrectos');
		$contadorIncorrectas = $this->input->post('intentosInocrrectos');
		$estrellas = $this->input->post('totalEstrellas');

		if ($estrellas <= 100) {
			$evaluacion = '¡A seguir practicando!';
			$observacion = "<b>¡Encuentra y Descubre! - letra b🦖</b><br>¡A seguir practicando explorador!💪<br><i>Sugerencia: Tómate tu tiempo para observar bien cada emoji y leer con atención las palabras.<br> Busca detalles que te ayuden a relacionar el emoji con la palabra que más se le parezca.</i><br> Parejas encontradas: $paresTotalesEncontrados de 12 parejas <br> Intentos usados: $contadorIncorrectas <br>";
		} else if ($estrellas > 100 && $estrellas <= 1100) {
			$evaluacion = '¡Casi lo logras!';
			$observacion = "<b>¡Encuentra y Descubre! - letra b🦖</b><br>¡Casi lo logras explorador!🌟<br><i>Sugerencia:  Fíjate bien en el emoji. ¿Qué palabra lo describe mejor? No te apresures, tómate tu tiempo y observa con atención. ¡Tú puedes!</i><br> Parejas encontradas: $paresTotalesEncontrados de 12 parejas <br> Intentos usados: $contadorIncorrectas <br>";
		} else if ($estrellas == 1200) {
			$evaluacion = '¡Super asombroso!';
			$observacion = "<b>¡Encuentra y Descubre! - letra b🦖</b><br>¡Super asombroso explorador!🎉<br>Encontraste todas las parejas. ¡Sigue así explorador! <br> Tu capacidad para encontrar y tu atención a los detalles para descubrir son impresionantes.<br>Parejas encontradas: $paresTotalesEncontrados de 12 parejas <br> Intentos usados: $contadorIncorrectas <br>";
		}

		$data = array(
			'identificador' => $identificador_1,
			'letra' => $letra,
			'identificador_usuario' => $identificador_usuario,
			'nombre' => '<b>Nombre :</b> Memorama - Letra b.' . "<br>" . '<b>Objetivo :</b> Encontrar las parejas correctas.' . "<br>" . '<b>Estrellas a ganar :</b> 1000 estrellas.' . "<br>" . '<b>Recompensa de estrellas :</b> 100 estrellas por pareja encontrada.' . "<br>" . '<b>Total de parejas a encontra :</b> 12 parejas.' . "<br>",
			'cronometro' => $tiempo,
			'correctas' => $paresTotalesEncontrados,
			'incorrectas' => $contadorIncorrectas,
			'estrellas' => $estrellas,
			'evaluacion' => $evaluacion,
			'observaciones' => $observacion,
			'fecha_registro' => $fecha_registro,
		);
		if ($this->ejercicios_model->guardar_progreso($data)) {
			echo json_encode(['success' => true]);
		} else {
			echo json_encode(['success' => false]);
		}
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
