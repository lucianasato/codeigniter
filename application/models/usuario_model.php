<?php

class Usuario_model extends CI_Model {
    
    function valida () {
        
        $sql = "SELECT id, nome FROM usuario WHERE email = ? AND senha = ?";
        $result = $this->db->query($sql, array($this->input->post('email'), md5($this->input->post('senha'))));
        
        if ($result->num_rows == 1) {
            return $result->row();
        }
    }
    
}