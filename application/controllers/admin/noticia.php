<?php

class Noticia extends CI_Controller {

    function index() {
       
        $this->load->library('pagination');
        $this->load->library('table');
        
        
        
        $config['base_url'] = base_url().'admin/noticia/index/';
        $config['uri_segment'] = 4;
        $config['use_page_numbers'] = FALSE;
        $config['total_rows'] = $this->db->get('noticia')->num_rows();
        $config['per_page'] = 5;
        
        $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
        $config['full_tag_close'] = '</ul></div><!--pagination-->';
       
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        
        $this->db->select('id, titulo, chamada, foto, data_publicacao, status');
        $this->db->order_by("id", "desc"); 
        
        $data['records'] = $this->db->get('noticia', $config['per_page'], $this->uri->segment(4));
        $data['links'] = $this->pagination->create_links();
        $data['total_rows'] = $config['total_rows'];
        //$tmpl = array ( 'table_open'  => '<table class="table table-hover">' );

        //$this->table->set_template($tmpl);

        $data['content'] = 'noticia_table';
        $this->load->view('includes/template', $data);
        
    }
    
    function add () {
        $data['action'] = 'admin/noticia/cadastrar';
        $data['label'] = 'Cadastrar';
        $data['content'] = 'noticia_form';
        $this->load->view('includes/template', $data);
    }
    
    function cadastrar () {
        
        $this->load->model('noticia_model');
        $valida = $this->noticia_model->valida();
        
        if (!$valida) { 
            $this->noticia_model->upload_image();
            $this->noticia_model->novo();
            redirect('admin/noticia?msg=1');
        }
        
    }
    
    function atualizar () {
        
        $this->load->model('noticia_model');
        
        $this->noticia_model->atualizar();
        redirect('admin/noticia?msg=2');
        
    }
    
    function edit() {
        
        $this->load->model('noticia_model');
        $id = $this->uri->segment(4);
        $data['row'] = $this->noticia_model->get_noticia($id);
        
        $data['action'] = 'admin/noticia/atualizar';
        $data['label'] = 'Atualizar';
        
        $data['content'] = 'noticia_form';
        $this->load->view('includes/template', $data);
        
    }
    
    function delete() {
        
        $this->load->model('noticia_model');
        $this->noticia_model->excluir();
        redirect('admin/noticia?msg=3');
        
    }
}