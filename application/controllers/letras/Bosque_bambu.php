<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bosque_bambu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->model('ejercicios_model');
	}

	public function index()
	{
		$this->load->view('layout/header_letras/header_letraB/header_bosque_bambu');
		$this->load->view('aventuras_del_trazo/bosque_bambu/index');
		$this->load->view('layout/footer');
	}

	public function descubriendo_palabras_b()
	{
		$this->load->view('layout/header_descubriendo_palabras_b');
		$this->load->view('ejercicios/ejercicios_letra_b/descubriendo_palabras_b');
		$this->load->view('layout/footer');
	}

	public function enviarEvaluacionDescubriendoPalabrasB()
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
			$observacion = "<b>Descubriendo Palabras - letra b🔍</b><br>¡A seguir practicando explorador!💪<br><i><b>Sugerencia:</b> Observa con más detalle la imagen de referencia e intenta organizar<br>las letras de otra forma, a veces mover una o dos letras puede hacer que la palabra encaje.</i><br> Palabras descubiertas: $correctas de 5 palabras <br> Errores cometidos: $incorrectas<br>";
		} else if ($estrellas > 200 && $estrellas <= 900) {
			$evaluacion = '¡Casi lo logras!';
			$observacion = "<b>Descubriendo Palabras - letra b🔍</b><br>¡Casi lo logras explorador!🌟<br><i><b>Sugerencia:</b> Observa bien la imagen de referencia y prueba reorganizar las letras con calma.<br> A veces, pequeños ajustes en el orden pueden hacer que la palabra encaje mejor.</i><br> Palabras descubiertas: $correctas de 5 palabras <br> Errores cometidos: $incorrectas<br>";
		} else if ($estrellas == 1000) {
			$evaluacion = '¡Super asombroso!';
			$observacion = "<b>Descubriendo Palabras - letra b🔍</b><br>¡Super asombroso explorador!🎉<br>Lograste descubrir todas las palabras. <br> Tu habilidad para descurbir es impresionante. ¡Sigue así explorador! <br> Palabras descubiertas: $correctas de 5 palabras <br> Errores cometidos: $incorrectas<br>";
		}

		foreach ($array_palabras as $key => $value) {
			$indice = $key + 1;
			$observacion .= $indice . '.- ' . $value . '<br>';
			# code...
		}
		$data = array(
			'identificador' => $identificador_1,
			'identificador_usuario' => $identificador_usuario,
			'nombre' => '<b>Nombre :</b> Descubriendo Palabras - Letra b.' . "<br>" . '<b>Objetivo :</b> Descubrir las 5 palabras que se forman con la letra b.' . "<br>" . '<b>Estrellas a ganar :</b> 1000 estrellas.' . "<br>" . '<b>Recompensa de estrellas :</b> 200 estrellas por palabra descubierta.' . "<br>" . '<b>Total de palabras a descubrir :</b> 5 palabras.' . "<br>" . '<b>Intentos disponibles :</b> 3 intentos.',
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

	
}
