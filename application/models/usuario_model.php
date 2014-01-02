<?php

class Usuario_model extends CI_Model {
    
    function valida () {
        
        $sql = "SELECT id, nome FROM usuario WHERE email = ? AND senha = ?";
        $result = $this->db->query($sql, array($this->input->post('email'), md5($this->input->post('senha'))));
        
        if ($result->num_rows == 1) {
            return $result->row();
        }
    }
    
    function novo () {
        
        $insert_data = array(
           'nome' => $this->input->post('nome'),
           'email'  => $this->input->post('email'),
           'senha'  => md5($this->input->post('senha')),
       );
        
       $insert = $this->db->insert('usuario', $insert_data);
       return $insert;
    }
    
    function valida_email () {
        $sql = "SELECT * FROM usuario WHERE email = ?";
        $result = $this->db->query($sql, array($this->input->post('email')));
        
        if ($result->num_rows != 0) {
            
            return true;
        }
    }
    
}