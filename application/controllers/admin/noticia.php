<?php

class Noticia extends CI_Controller {

    function index() {
        $data['content'] = 'noticia_table';
        $this->load->view('includes/template', $data);
    }
    
    
    function add () {
        $data['content'] = 'noticia_form';
        $this->load->view('includes/template', $data);
    }
    
    function cadastrar () {
        
        $this->load->model('noticia_model');
        $valida = $this->noticia_model->valida();
        
        if (!$valida) {
            $this->noticia_model->novo();
            
            redirect('admin/noticia?msg=1');
        }
        
    }
}