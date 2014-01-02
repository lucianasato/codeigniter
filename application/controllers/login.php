<?php

class Login extends CI_Controller {
    
    function index() {
        $data['content'] = 'login_form';
        $this->load->view('includes/template', $data);
    }
    
    function valida_usuario () {
        $this->load->model('usuario_model');
        $row = $this->usuario_model->valida();
        
        if ($row) {
           $data = array(
               'id' => $row->id,
               'nome' => $row->nome
           );
           $this->session->set_userdata($data);
           redirect('restrito');
        } else {
            redirect('login?erro=2');
        }
    }
}