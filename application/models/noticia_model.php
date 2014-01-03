<?php

class Noticia_model extends CI_Model {
    
    function valida() {
        
        $sql = "SELECT id FROM noticia WHERE titulo = ?";
        $result = $this->db->query($sql, array($this->input->post('titulo')));
        
        if ($result->num_rows >= 1) {
            return true;
        }
        
        return false;
    }
    
    function novo() {
        
        
        $insert_data = array(
           'titulo' => $this->input->post('titulo'),
           'chamada'  => $this->input->post('chamada'),
           'conteudo'  => $this->input->post('conteudo'),
           'foto'  => $this->input->post('foto'),
           'data_publicacao'  => $this->input->post('data_publicacao'),
           'status'  => $this->input->post('status'),
       );
        
       $insert = $this->db->insert('noticia', $insert_data);
       return $insert;
       
    }
}