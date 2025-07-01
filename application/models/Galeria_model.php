<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeria_model extends CI_Model
{

    public function obtener_usuarios()
    {
        $query = $this->db
            ->select('t1.*')
            ->from('galeria t1')
            ->get();
        return $query;
    }
    public function insertar_galeria($data)
    {
        return $this->db->insert('galeria', $data);
    }

    public function obtener_usuario($usuario)
    {
        $query = $this->db
            ->where('usuario', $usuario)
            ->select('t1.*')
            ->get("galeria t1");
        return $query;
    }

    public function obtener_imagenes_usuario($usuario_identificador)
    {
        $query = $this->db
            ->where('identificador_usuario', $usuario_identificador)
            ->where('evaluado !=', '')
            ->where('tipo', 'leccion')
            ->select('t1.*')
            ->from('galeria t1')
            // ->order_by('t1.evaluado', 'ASC')
            ->order_by('t1.id', 'ASC')
            ->get();

        return $query;
    }

    public function obtener_imagen_usuario($usuario_identificador, $letra)
    {
        $query = $this->db
            ->where('identificador_usuario', $usuario_identificador)
            ->where('galeria_letra', $letra)
            ->select('t1.*')
            ->from('galeria t1')
            ->order_by('t1.evaluado', 'ASC')
            ->order_by('t1.id', 'DESC')
            ->get();

        return $query;
    }

    // public function obtener_letra_de_imagen($imagen_identificador)
    // {
    //     $query = $this->db
    //        ->where('identificador', $imagen_identificador)
    //        ->select('t1.galeria_letra')
    //        ->from('galeria t1')
    //        ->get();

    //     return $query;

    // }

    public function login($usuario, $contrasenia)
    {
        // Aquí debes escribir la lógica para verificar las credenciales del usuario en la base de datos
        $this->db->where('usuario', $usuario);
        $this->db->where('contrasenia', md5($contrasenia)); // Suponiendo que las contraseñas están encriptadas con MD5
        $query = $this->db->get('users');

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    // public function guardarImagen($nombreArchivo, $identificador_1)
    // {
    //      Ejemplo de cómo guardar la información de la imagen en la base de datos
    //     $data = [
    //         'identificador' => $identificador_1,
    //         'identificador_usuario' => $this->session->userdata('identificador'),
    //         'url_imagen' => $nombreArchivo,
    //         'fecha_registro' => date("Y-m-d H:i:s")
    //     ];

    //     $this->db->insert('galeria', $data); 
    // }

    public function insertar_evaluacion($data, $imagen_identificador)
    {
        $query = $this->db
            ->where('identificador', $imagen_identificador)
            ->update('galeria', $data);

        return $query;
    }

    public function obtener_letra_de_imagen($imagen_identificador)
    {
        $query = $this->db
            ->where('t1.identificador', $imagen_identificador)
            ->select('t1.galeria_letra')
            ->from('galeria t1')
            ->get();
        return $query;
    }

    public function obtener_imagenes_usuario_por_letras($usuario_identificador, $letras = [])
    {
        $this->db->where('identificador_usuario', $usuario_identificador);
        $this->db->where_in('galeria_letra', $letras); // <- aquí va el arreglo de letras
        $this->db->select('t1.*');
        $this->db->from('galeria t1');
        $this->db->order_by('t1.evaluado', 'ASC');
        $this->db->order_by('t1.id', 'ASC');

        return $this->db->get();
    }
}
