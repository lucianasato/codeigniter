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
    
    function valida_email () {
        $this->load->model('usuario_model');
        if ($this->usuario_model->valida_email()) {
            return true;
        } else {
            return false;
        }
    }
    
    function criar_conta ($erros = false) {
        $data['content'] = 'criar-conta_form';
        if ($erros) {
            $data['erros'] = $erros;
        }
        
        $this->load->view('includes/template', $data);
    }
    
    function criar_usuario() {
        
        // verifica se já existe o email cadastrado
        $valida = $this->valida_email();
        if (!$valida) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
            $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
            $this->form_validation->set_rules('senha', 'Senha', 'trim|required|min_length[4]|max_length[32]');
            $this->form_validation->set_rules('senha2', 'Confirmar Senha', 'trim|required|matches[senha]');

            if ($this->form_validation->run() == FALSE) { 
                $data['erros'] = validation_errors();
                $this->criar_conta(validation_errors());
            } else {
                $this->load->model('usuario_model');

                if ($query = $this->usuario_model->novo()) { 
                    $data['content'] = 'criar-conta_form';
                    $data['message'] = 'Conta criada com sucesso';
                    $this->load->view('includes/template', $data);
                } else {
                    $this->load->view('includes/template');
                }
            }
        } else {
            $this->criar_conta('Este e-mail já está cadastrado');
        }
    }
}