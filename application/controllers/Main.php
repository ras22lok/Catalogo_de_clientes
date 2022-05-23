<?php
    defined('BASEPATH') OR exit('URL inválida.');

    Class Main extends CI_Controller{
        public function index(){            
            $this->load->view('autenticacao/logar');
            //echo 'teste';
            
        }
    }