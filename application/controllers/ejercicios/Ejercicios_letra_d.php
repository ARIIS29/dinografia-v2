<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ejercicios_letra_d extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ejercicios_model');
	}

	public function index()
	{
		$this->load->view('layout/header_ejercicios/header_letrad/header_menu_desierto');
		$this->load->view('ejercicios/ejercicios_letra_d/index');
		$this->load->view('layout/footer');
	}

	public function descubriendo_palabras_d()
	{
		$this->load->view('layout/header_ejercicios/header_letrad/header_descubriendo_palabras_d');
		$this->load->view('ejercicios/ejercicios_letra_d/descubriendo_palabras_d');
		$this->load->view('layout/footer');
	}

	public function enviarEvaluacionDescubriendoPalabrasD()
	{

		$arreloPalbras = [];
		$fecha_registro = date("Y-m-d H:i:s");
		$key_1 = "progreso-" . date("Y-m-d-H-i-s", strtotime($fecha_registro));
		$identificador_1 = hash("crc32b", $key_1);
		$identificador_usuario = $this->session->userdata('identificador');
		$tiempo = $this->input->post('tiempoFinal');
		$correctas = $this->input->post('palabrasCorrectas');
		$incorrectas = $this->input->post('palabrasIncorrectascont');
		$estrellas = $this->input->post('totalEstrellas');
		$array_palabras = json_decode($this->input->post('arrayPalabras'));

		if ($estrellas <= 200) {

			$evaluacion = '¡A seguir practicando!';
			$observacion = "<b>Descubriendo Palabras - letra d 🔍</b><br>¡A seguir practicando explorador!💪<br><i><b>Sugerencia:</b> Observa con más detalle la imagen de referencia e intenta organizar<br>las letras de otra forma, a veces mover una o dos letras puede hacer que la palabra encaje.</i><br> Palabras descubiertas: $correctas de 5 palabras <br> Errores cometidos: $incorrectas<br>";
		} else if ($estrellas > 200 && $estrellas <= 900) {
			$evaluacion = '¡Casi lo logras!';
			$observacion = "<b>Descubriendo Palabras - letra d 🔍</b><br>¡Casi lo logras explorador!🌟<br><i><b>Sugerencia:</b> Observa bien la imagen de referencia y prueba reorganizar las letras con calma.<br> A veces, pequeños ajustes en el orden pueden hacer que la palabra encaje mejor.</i><br> Palabras descubiertas: $correctas de 5 palabras <br> Errores cometidos: $incorrectas<br>";
		} else if ($estrellas == 1000) {
			$evaluacion = '¡Super asombroso!';
			$observacion = "<b>Descubriendo Palabras - letra d 🔍</b><br>¡Super asombroso explorador!🎉<br>Lograste descubrir todas las palabras. <br> Tu habilidad para descurbir es impresionante. ¡Sigue así explorador! <br> Palabras descubiertas: $correctas de 5 palabras <br> Errores cometidos: $incorrectas<br>";
		}

		foreach ($array_palabras as $key => $value) {
			$indice = $key + 1;
			$observacion .= $indice . '.- ' . $value . '<br>';
			# code...
		}
		$data = array(
			'identificador' => $identificador_1,
			'identificador_usuario' => $identificador_usuario,
			'nombre' => '<b>Nombre :</b> Descubriendo Palabras - Letra d.' . "<br>" . '<b>Objetivo :</b> Descubrir las 5 palabras que se forman con la letra d.' . "<br>" . '<b>Estrellas a ganar :</b> 1000 estrellas.' . "<br>" . '<b>Recompensa de estrellas :</b> 200 estrellas por palabra descubierta.' . "<br>" . '<b>Total de palabras a descubrir :</b> 5 palabras.' . "<br>" . '<b>Intentos disponibles :</b> 3 intentos.',
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

	public function descubriendo_mensajes_secretos_d()
	{
		$this->load->view('layout/header_ejercicios/header_letrad/header_descubriendo_mensajes_secretos_d');
		$this->load->view('ejercicios/ejercicios_letra_d/descubriendo_mensajes_secretos_d');
		$this->load->view('layout/footer');
	}

	public function enviarEvaluacionMensajesSecretosd()
	{
		$fecha_registro = date("Y-m-d H:i:s");
		$key_1 = "progreso-" . date("Y-m-d-H-i-s", strtotime($fecha_registro));
		$identificador_1 = hash("crc32b", $key_1);
		$identificador_usuario = $this->session->userdata('identificador');
		$tiempo = $this->input->post('tiempoFinal');
		$correctas = $this->input->post('palabrasCorrectas');
		$incorrectas = $this->input->post('palabrasIncorrectas');
		$estrellas = $this->input->post('totalEstrellas');
		$array_palabras = json_decode($this->input->post('arrayPalabras'));


		if ($estrellas <= 200) {
			$evaluacion = '¡A seguir practicando!';
			$observacion = "<b>Mensajes Secretos - letra d📜</b><br>¡A seguir practicando explorador!💪<br><i><b>Sugerencia:</b> Tómate tu tiempo para reorganizar las palabras con calma.<br> Recuerda visitar más seguido el portal de <b>Exploremos</b>, ¡te ayudará a descubrir los mensajes secretos de la letra d con facilidad!</i><br>Palabras descubiertas: $correctas de 5 mensajes secretos <br> Errores cometidos: $incorrectas<br>";
		} else if ($estrellas > 200 && $estrellas <= 900) {
			$evaluacion = '¡Casi lo logras!';
			$observacion = "<b>Mensajes Secretos - letra d📜</b><br>¡Casi lo logras explorador!🌟<br><i><b>Sugerencia:</b> Sigue reorganizando las palabras con calma y piensa en las características de la letra d.<br>No olvides usar el portal de <b>Exploremos</b> con más frecuencia, ¡te ayudará a descubrir los secretos más rápido!</i><br>Palabras descubiertas: $correctas de 5 mensajes secreto <br> Errores cometidos: $incorrectas<br>";
		} else if ($estrellas == 1000) {
			$evaluacion = '¡Super asombroso!';
			$observacion = "<b>Mensajes Secretos - letra d📜</b><br>¡Super asombroso explorador!🎉<br>Lograste descifrar todos los mensajes secretos de la letra d.<br>Tu habilidad para descubrir los mensajes secretos es increíble. ¡Sigue así explorador!<br>Palabras descubiertas: $correctas de 5 mensajes secreto <br> Errores cometidos: $incorrectas<br>";
		}

		foreach ($array_palabras as $key => $value) {
			$indice = $key + 1;
			$observacion .= $indice . '.- ' . $value . '<br>';
			# code...
		}

		$data = array(
			'identificador' => $identificador_1,
			'identificador_usuario' => $identificador_usuario,
			'nombre' => '<b>Nombre :</b> Mensajes secretos - Letra d.' . "<br>" . '<b>Objetivo :</b> Descubrir los 5 mensajes secretos.' . "<br>" . '<b>Estrellas a ganar :</b> 1000 estrellas.' . "<br>" . '<b>Recompensa de estrellas :</b> 200 estrellas por mensaje descubierto.' . "<br>" . '<b>Total de mensajes secretos a descubrir :</b> 5 mensajes.' . "<br>" . '<b>Intentos disponibles :</b> 3 intentos.',
			'cronometro' => $tiempo,
			'correctas' => $correctas,
			'incorrectas' => $incorrectas,
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

	public function explorador_hojas_d()
	{
		$this->load->view('layout/header_ejercicios/header_letrad/header_explorador_hojas_d');
		$this->load->view('ejercicios/ejercicios_letra_d/explorador_hojas_d');
		$this->load->view('layout/footer');
	}

	public function enviarEvaluacionexploradorHojasD()
	{
		$fecha_registro = date("Y-m-d H:i:s");
		$key_1 = "progreso-" . date("Y-m-d-H-i-s", strtotime($fecha_registro));
		$identificador_1 = hash("crc32b", $key_1);
		$identificador_usuario = $this->session->userdata('identificador');
		$tiempo = $this->input->post('tiempoFinal');
		$puntaje = $this->input->post('hojasAtrapadas');
		$hojasNoAtrapadas = $this->input->post('hojasIncorrectas');
		$estrellas = $this->input->post('totalEstrellas');

		if ($estrellas <= 25) {
			$evaluacion = '¡A seguir practicando!';
			$observacion = "<b>Explorador de hojas - letra d🌿</b><br>¡A seguir practicando explorador!💪<br><i><b>Sugerencia:</b> Para atrapar más hojas, enfócate en reaccionar más rápido <br>y observa cada movimiento con atención. ¡Tus reflejos son clave para mejorar! <br>Lograste atrapar $puntaje hojas de 40 hojas <br>";
		} else if ($estrellas > 25 && $estrellas <= 975) {
			$evaluacion = '¡Casi lo logras!';
			$observacion = "<b>Explorador de hojas - letra d🌿</b><br>¡Casi lo logras explorador!🌟<br><i><b>Sugerencia:</b> Para atrapar más hojas, trata de mejorar la velocidad de tu reacción<br> y observa con más detalle cada movimiento. ¡Estás cerca de lograrlo! <br>Lograste atrapar $puntaje hojas de 40 hojas <br>";
		} else if ($estrellas == 1000) {
			$evaluacion = '¡Super asombroso!';
			$observacion = "<b>Explorador de hojas - letra d🌿</b><br>¡Super asombroso explorador!🎉<br>Lograste atrapar todas las hojas sin que se te escapara ninguna. <br> Tu destreza en los reflejos es asombrosa. ¡Sigue así y atraparás todas las hojas! <br>Lograste atrapar $puntaje hojas de 40 hojas <br>";
		}
		$data = array(
			'identificador' => $identificador_1,
			'identificador_usuario' => $identificador_usuario,
			'nombre' => '<b>Nombre :</b> Explorador de hojas - Letra d.' . "<br>" . '<b>Objetivo :</b> Atrapar las hojas que aparecen en pantalla.' . "<br>" . '<b>Estrellas a ganar :</b> 1000 estrellas.' . "<br>" . '<b>Recompensa de estrellas :</b> 25 estrellas por hoja atrapada.' . "<br>" . '<b>Total de hojas a atrapar :</b> 40 hojas.',
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

	public function dino_dice()
	{
		$this->load->view('layout/header_ejercicios/header_letrad/header_dino_dice');
		$this->load->view('ejercicios/ejercicios_letra_d/dino_dice');
		$this->load->view('layout/footer');
	}

	public function enviarEvaluacionDinoDiceD()
	{
		$fecha_registro = date("Y-m-d H:i:s");
		$key_1 = "progreso-" . date("Y-m-d-H-i-s", strtotime($fecha_registro));
		$identificador_1 = hash("crc32b", $key_1);
		$identificador_usuario = $this->session->userdata('identificador');
		$tiempo = $this->input->post('tiempoFinal');
		$contadorCorrectos = $this->input->post('objetosCorrectos');
		$contadorIncorrectas = $this->input->post('intentosInocrrectos');
		$estrellas = $this->input->post('totalEstrellas');
		$arrayObjetosIncorrectos = json_decode($this->input->post('arrayObjetosIncorrectos'), true);

		// $arrayObjetosIncorrectos = json_decode($this->input->post('objetosIncorrectos'));


		if ($estrellas <= 100) {
			$evaluacion = '¡A seguir practicando!';
			$observacion = "<b>¡Hazle caso al Dino! - letra d🦖</b><br>¡A seguir practicando explorador!💪<br><i>Sugerencia: Tómate tu tiempo para leer bien las instrucciones.<br> Observa cada elemento con detalle y compáralo cuidadosamente con lo que se te pide antes de seleccionarlo.</i><br> Elementoos recolectados: $contadorCorrectos de 10 elementos <br> Errores cometidos: $contadorIncorrectas <br>";
		} else if ($estrellas > 100 && $estrellas <= 900) {
			$evaluacion = '¡Casi lo logras!';
			$observacion = "<b>¡Hazle caso al Dino! - letra d🦖</b><br>¡Casi lo logras explorador!🌟<br><i>Sugerencia:  Asegúrate de leer bien las instrucciones y observar cada elemento con más detalle.<br> Intenta comparar los elementos con calma antes de seleccionarlos.</i><br> Elementos recolectados: $contadorCorrectos de 10 elementos <br> Errores cometidos: $contadorIncorrectas <br>";
		} else if ($estrellas == 1000) {
			$evaluacion = '¡Super asombroso!';
			$observacion = "<b>¡Hazle caso al Dino! - letra d🦖</b><br>¡Super asombroso explorador!🎉<br>Encontraste todos los elementos sin cometer ningún error. ¡Sigue así explorador! <br> Tu capacidad para seguir instrucciones y tu atención a los detalles son impresionantes.<br>Elementos recolectados: $contadorCorrectos de 10 elementos <br> Errores cometidos: $contadorIncorrectas <br>";
		}

		foreach ($arrayObjetosIncorrectos as $key => $value) {
			$indice = $key + 1;
			$observacion .= $indice . ". 🔴 <b>Elemento seleccionado:</b> " . $value['seleccionado'] . " - 🟢 <b>Elemento correcto:</b> " . $value['correcto'] . "<br>";
		}

		$data = array(
			'identificador' => $identificador_1,
			'identificador_usuario' => $identificador_usuario,
			'nombre' => '<b>Nombre :</b> Hazle Caso al Dino - Letra d.' . "<br>" . '<b>Objetivo :</b> Recolectar los elementos que el Dino indique.' . "<br>" . '<b>Estrellas a ganar :</b> 1000 estrellas.' . "<br>" . '<b>Recompensa de estrellas :</b> 100 estrellas por elemento recolectado.' . "<br>" . '<b>Total de elementos a recolectar :</b> 10 elementos.' . "<br>" . '<b>Intentos disponibles :</b> 3 intentos.',
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


	public function encontrando_objetos_d()
	{
		$this->load->view('layout/header_ejercicios/header_letrad/header_encontrando_objetos_d');
		$this->load->view('ejercicios/ejercicios_letra_d/encontrando_objetos_d');
		$this->load->view('layout/footer');
	}

	public function enviarEvaluacionEncontrandoObjetosD()
	{
		$fecha_registro = date("Y-m-d H:i:s");
		$key_1 = "progreso-" . date("Y-m-d-H-i-s", strtotime($fecha_registro));
		$identificador_1 = hash("crc32b", $key_1);
		$identificador_usuario = $this->session->userdata('identificador');
		$tiempo = $this->input->post('tiempoFinal');
		$objetosCorrectos = $this->input->post('objetosCorrectos');
		$objetosIncorrectos = $this->input->post('objetosIncorrectos');
		$estrellas = $this->input->post('totalEstrellas');
		$noencotrado = $this->input->post('objetosNoEncontrados');
		$arrayObjetosIncorrectos = json_decode($this->input->post('arrayObjetosIncorrectos'), true);


		if ($estrellas <= 100) {
			$evaluacion = '¡A seguir practicando!';
			$observacion = "<b>Elementos perdidos - letra d👀</b><br>¡A seguir practicando explorador!💪<br><i>Sugerencia: Mira bien las características del elemento a buscar.<br> Algunos detalles pueden ser pequeños, pero te ayudarán a encontrar los más parecidos.</i><br> Elementos encontrados: $objetosCorrectos de 77 elementos perdidos <br> Errores cometidos: $objetosIncorrectos<br>";
		} else if ($estrellas > 100 && $estrellas <= 3250) {
			$evaluacion = '¡Casi lo logras!';
			$observacion = "<b>Elementos perdidos - letra d👀</b><br>¡Casi lo logras explorador!🌟<br><i>Sugerencia: Estás cerca. Revisa más detenidamente los elementos y asegúrate de comparar todos los detalles.</i><br>Elementos encontrados: $objetosCorrectos de 77 elementos perdidos <br> Errores cometidos: $objetosIncorrectos<br>";
		} else if ($estrellas == 3850) {
			$evaluacion = '¡Super asombroso!';
			$observacion = "<b>Elementos perdidos - letra d👀</b><br>¡Super asombroso explorador!🎉<br>Encontraste todos los elementos.¡Sigue así explorador!<br> Tienes buena habilidad para distinguir y tu atención a los detalles son impresionantes.<br>Elementos encontrados: $objetosCorrectos de 77 elementos perdidos <br> Errores cometidos: $objetosIncorrectos<br>";
		}

		foreach ($arrayObjetosIncorrectos as $key => $value) {
			$indice = $key + 1;
			$observacion .= $indice . ". 🔴 <b>Elemento seleccionado:</b> " . $value['seleccionado'] . " - 🟢 <b>Elemento correcto:</b> " . $value['correcto'] . "<br>";
		}
		$data = array(
			'identificador' => $identificador_1,
			'identificador_usuario' => $identificador_usuario,
			'nombre' => '<b> Nombre :</b> Elementos perdidos - Letra d' . "<br>" . '<b>Objetivo :</b> Encontrar todos los elementos perdidos en el desierto.' . "<br>" . '<b>Estrellas a ganar :</b> 3850 estrellas .' . "<br>" . '<b>Recompensa de estrellas :</b> 50 estrellas por elemento encontrado.' . "<br>" . '<b>Total de elementos a encontrar :</b> 77 elementos perdidios.' . "<br>" . '<b>Intentos disponibles :</b> 3 intentos.',
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


	
}
