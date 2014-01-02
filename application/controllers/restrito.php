<?php

class Restrito extends CI_Controller {
    
    function index() {
       
        $data['content'] = 'area-restrita';
        $this->load->view('includes/template', $data);
    
    }
}