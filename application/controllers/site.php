<?php

class Site extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
    }
    
    function area_restrita() {
        $this->load->view('area-restrita');
    }
}
