<?php

class Noticia_model extends CI_Model {
    
    var $gallery_path;
    var $gallery_path_url;
    
    function noticia_model() {
        
        parent::__construct();
        $this->gallery_path = realpath(APPPATH.'../images');
        $this->gallery_path_url = base_url().'images/';
    }
    
    function valida() {
        
        $sql = "SELECT id FROM noticia WHERE titulo = ?";
        $result = $this->db->query($sql, array($this->input->post('titulo')));
        
        if ($result->num_rows >= 1) {
            return true;
        }
        
        return false;
    }
    
    function novo() {
        
       
        $upload_data = $this->upload->data(); 
        $insert_data = array(
           'titulo' => $this->input->post('titulo'),
           'chamada'  => $this->input->post('chamada'),
           'conteudo'  => $this->input->post('conteudo'),
           'foto'  => $upload_data['file_name'],
           'data_publicacao'  => $this->input->post('data_publicacao'),
           'status'  => $this->input->post('status'),
       );
        
       $insert = $this->db->insert('noticia', $insert_data);
       return $insert;
       
    }
    
    function upload_image () {
        
        $config = array(
            'allowed_types' => 'jpg|jpeg|gif|png',
            'upload_path' => $this->gallery_path
        );
       
        $this->load->library('upload', $config);
        $this->upload->do_upload('foto');
        
        $image_data = $this->upload->data();
        
        $config2 = array(
            'source_image' => $image_data['full_path'], 
            'new_image' => $this->gallery_path . '/thumbs',
            'maintain_ratio' => true,
            'width' => 80, 
            'height' => 80
        );
        
        $this->load->library('image_lib', $config2);
        $this->image_lib->resize();
    }
    
    
    function atualizar() {
       
        $id = $this->input->post('id');
        $update_data = array(
            'id' => $id,
            'titulo' => $this->input->post('titulo'),
            'chamada'  => $this->input->post('chamada'),
            'conteudo'  => $this->input->post('conteudo'),
            'data_publicacao'  => $this->input->post('data_publicacao'),
            'status'  => $this->input->post('status'),
        );
        
        $this->db->where('id', $id);
        $this->db->update('noticia', $update_data);
        
    }
    
    function get_noticia($id) {
        
        $sql = "SELECT * FROM noticia WHERE id = ?";
        $result = $this->db->query($sql, array($id));
        
        return $result->row_array();
        
        
    }
    
    function excluir () {
        
        $this->db->where('id', $this->uri->segment(4));
        $this->db->delete('noticia');
        
    }
    
    
}