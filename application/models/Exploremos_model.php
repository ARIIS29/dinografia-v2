<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Exploremos_model extends CI_Model
{

    public function obtener_usuarios()
    {
        $query = $this->db
            ->select('t1.*')
            ->from('exploremos t1')
            ->get();
        return $query;
    }
    public function insertar_exploremos($data)
    {
        return $this->db->insert('exploremos', $data);
    }

    public function obtener_usuario($usuario)
    {
        $query = $this->db
            ->where('usuario', $usuario)
            ->select('t1.*')
            ->get("exploremos t1");
        return $query;
    }

    public function login($usuario, $contrasenia) {
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
}
