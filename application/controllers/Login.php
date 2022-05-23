<?php
    defined('BASEPATH') OR exit('URL inválida.');

    //use CodeIgniter\Controller;

    Class Login extends CI_Controller{
        public function index(){
            $this->load->view('autenticacao/logar');
        }        
        
        public function logout(){
            //echo "Logout";
            $this->session->unset_userdata("usuario_logado");
            $this->session->set_flashdata("success", "Deslogado com sucesso!");

            redirect('login');
        }

        public function autenticar(){
            $this->load->model("usuarios_model");
            $user = $this->input->post("username");
            $senha = md5($this->input->post("password"));
            $usuario = $this->usuarios_model->logarUsuario($user, $senha);

            if($usuario){
                $this->session->set_userdata("usuario_logado", $usuario);
                $this->session->set_flashdata("success", "Logado com sucesso!");
            }
            else{
                $this->session->set_flashdata("danger", "Usuário ou senha inválidos!");
            }

            redirect('login');
        }

    }