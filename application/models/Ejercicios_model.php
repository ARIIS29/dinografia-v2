<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ejercicios_model extends CI_Model
{
    public function obtener_evaluacion_ejercicios_por_usuario($usuario_identificador)
    {
        $query = $this->db
            ->where('identificador_usuario', $usuario_identificador)
            ->select('t1.*')
            ->from('ejercicios t1')
            // ->order_by('t1.evaluado', 'ASC')
            ->order_by('t1.id', 'DESC')
            ->get();

        return $query;
    }

    public function obtener_evaluacion_ejercicios_por_usuario_b($usuario_identificador)
    {
        $query = $this->db

            ->where('letra', 'b')
            ->select('t1.*')
            ->from('ejercicios t1')
            // ->order_by('t1.evaluado', 'ASC')
            ->order_by('t1.id', 'DESC')
            ->get();

        return $query;
    }
    public function guardar_progreso($data)
    {

        $query = $this->db
            ->insert('ejercicios', $data);

        return $query;
    }

    public function obtener_evaluacion_ejercicios_por_usuario_b_actualizado(){
        $query = $this ->db
        ->select('t1.id, t1.identificador, t1.identificador_usuario, t1.letra')
        ->from('ejercicios t1')
        ->order_by('id', 'desc')
        ->limit(1)
        ->get();
        return $query;
    }
}
