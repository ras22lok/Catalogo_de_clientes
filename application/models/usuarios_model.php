<?php
    class Usuarios_model extends CI_Model{

        public function logarUsuario($usuario, $senha){
            $this->db->where("usuario", $usuario);
            $this->db->where("senha", $senha);
            $user = $this->db->get("usuarios")->row_array();
            return $user;

        }
    }