<?php
    defined('BASEPATH') OR exit('URL inválida.');

    

    Class Clientes extends CI_Controller{
        
        public function catalogo(){
            $this->load->model("clientes_model");
            $lista_clientes = $this->clientes_model->listarClientes();
            $dados = array("clientes" => $lista_clientes);
            $this->load->view('administracao/clientes', $dados);

        }

        public function cadastro(){
            $this->load->view('administracao/cadastro');
        }

        public function cadastraCliente(){
            
            $config['upload_path'] = "media/img/";
            $config['max_size'] = 2048;
            $config['allowed_types'] = "jpg|png|jpeg";
            echo $config['upload_path'];
            $this->load->library('upload', $config);
            $empresa = $this->input->post("nome_empresa");
            $telefone = $this->input->post("telefone");

            if(! $this->upload->do_upload('foto')){
                $msg = $this->upload->display_errors();
                $this->session->set_flashdata('danger', $msg);
                echo $msg;
            }else{
                $foto = $this->upload->data();
                $diretorio = $foto['file_name'];
                $this->load->model('clientes_model');
                $this->clientes_model->cadastrarCliente($diretorio, $empresa, $telefone);

                $msg = "Cadastro realizado com sucesso!";
                $this->session->set_flashdata('success', $msg);
                echo $msg;
            }

            redirect('clientes/catalogo');
        }

        public function pesquisaCliente(){

            $pesquisa = $this->input->post("pesquisa");
            $tipo = $this->input->post("tipo_pesq");

            $this->load->model('clientes_model');
            $listar_pesquisa = $this->clientes_model->pesquisarcliente($pesquisa,$tipo);

            $dados = array("clientes" => $listar_pesquisa);

            $this->load->view('administracao/clientes', $dados);
        }
        
        public function editarCliente(){
            
            $img = $_FILES['foto']['name'];

            $empresa = $this->input->post("nome_empresa");
            $telefone = $this->input->post("telefone");
            $id = $this->input->post("cod");
            
            if($img){

                $this->load->model('clientes_model');            
                $this->clientes_model->editarCliente($id, $empresa, $telefone, $img);
                
            }else{

                $foto = "";
                $this->load->model('clientes_model');
                $this->clientes_model->editarCliente($id, $empresa, $telefone, $foto);

            }

            redirect('clientes/catalogo');
        }

        public function excluirCliente(){
            $id = $this->input->post("cod");

            $this->load->model('clientes_model');
            $this->clientes_model->excluirCliente($id);
            
        }
    }