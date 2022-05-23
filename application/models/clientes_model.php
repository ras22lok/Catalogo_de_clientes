<?php
    class Clientes_model extends CI_Model{
        public function buscaClientes(){
            return $this->db->get("usuarios")->result_array();
        }

        public function listarClientes(){
            return $this->db->get("clientes")->result_array();
        }
        
        public function cadastrarCliente($foto, $empresa, $telefone){
            $dados = array(
                "nome" => $empresa,
                "telefone" => $telefone,
                "foto" => $foto
            );
            $this->db->insert("clientes", $dados);
        }

        public function pesquisarCliente($pesquisa,$tipo){
            //echo "Pesquisa: $pesquisa<br/>Tipo: $tipo";
            if($tipo == "telefone"){
                if($pesquisa != ""){
                    $this->db->select('*');
                    $this->db->like('telefone', $pesquisa);
                    return $this->db->get('clientes')->result_array();
                }else{
                    return $this->db->get("clientes")->result_array();
                }                
            }else{
                if($pesquisa != ""){
                    $this->db->select('*');
                    $this->db->like('nome', $pesquisa);
                    return $this->db->get('clientes')->result_array();
                }else{
                    return $this->db->get("clientes")->result_array();
                }          
            }                       
        }

        public function editarCliente($id, $empresa, $telefone, $foto){
            
            
            if($foto == ""){
                $this->db->where('id', $id);
                $this->db->select('foto');
                $q = $this->db->get('clientes');
                $data = $q->result_array();
                $foto = $data[0]['foto'];
                            
                $dados = array(
                    "nome" => $empresa,
                    "telefone" => $telefone,
                    "foto" => $foto
                );
                $this->db->where('id', $id);
                $this->db->update("clientes", $dados);

                $msg = "Alteração realizada com sucesso!";
                $this->session->set_flashdata('success', $msg);

            }else{

                $this->db->where('id', $id);
                $this->db->select('foto');
                $q = $this->db->get('clientes');
                $data = $q->result_array();
                $foto_bd = $data[0]['foto'];


                if($foto_bd == $foto){                                
                    $dados = array(
                        "nome" => $empresa,
                        "telefone" => $telefone,
                        "foto" => $foto
                    );
                    $this->db->where('id', $id);
                    $this->db->update("clientes", $dados);
                    
                }else{
                    $config['upload_path'] = "media/img/";
                    $config['max_size'] = 2048;
                    $config['allowed_types'] = "jpg|png|jpeg";
                    
                    $this->load->library('upload', $config);

                    if(! $this->upload->do_upload('foto')){                
                        $msg = $this->upload->display_errors();
                        $this->session->set_flashdata('danger', $msg);
                        //echo $msg;
                    }else{                        
                        $this->session->set_flashdata('success', $msg);
                        $dados = array(
                            "nome" => $empresa,
                            "telefone" => $telefone,
                            "foto" => $foto
                        );
                        $this->db->where('id', $id);
                        $this->db->update("clientes", $dados);

                        $msg = "Alteração realizada com sucesso!";
                        $this->session->set_flashdata('success', $msg);
                    }
                }                
            }            
        }

        public function excluirCliente($id){
            $this->db->where('id', $id);
            if($this->db->delete('clientes')){
                $msg = "Cliente removido com sucesso!";
                $this->session->set_flashdata('success', $msg);
            }else{
                $msg = "Não foi possivel remover o cliente!";
                $this->session->set_flashdata('danger', $msg);
            }
            redirect('clientes/catalogo');
        }
    }