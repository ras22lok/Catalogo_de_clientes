<!doctype html>
<html lang="pt_br">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url('estatico/autenticacao/css/cadastro.css');?>">
        <title>Página de login</title>
        <style>
            font-degrade-nav{
                background-image: linear-gradient(90deg, rgba(255,207,0,1) 0%, rgba(231,71,220,1) 100%);
                background-clip: text;               
                -webkit-background-clip: text;
                color: transparent;
                padding-bottom: 10px;
                font-size: 20px;
                font-weight: bold;
            }
            #sair{
                float: right;
                margin-left: 70%;
            }
            
        </style>
    </head>
    <body class="fundo">

        <?php if(!($this->session->userdata("usuario_logado"))) : ?>
            <?php redirect('login/'); ?>
        <?php endif ?>
        
        <nav class="navbar navbar-light bg-light justify-content-between">
            <a class="navbar-brand">Catalogo de clientes</a>
            <a href="<?= base_url('index.php/clientes/cadastro');?>" class="btn btn-outline-success my-2 my-sm-0">Novo cliente</a>
            <form class="form-inline" action="<?= base_url('index.php/clientes/pesquisaCliente');?>" method="POST">
                <input class="form-control mr-sm-2" type="text" name="pesquisa" placeholder="Buscar clientes" aria-label="Search">
                <select name="tipo_pesq" class="form-control mr-sm-2">
                            <option value="empresa">Empresa</option>
                            <option value="telefone">Telefone</option>                            
                        </select>                       
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
            </form>
            <a href="<?= base_url('index.php/login/logout');?>" class="navbar-brand">Sair</a>
        </nav>
        <!--
        <nav class="nav nav-pills nav-justified">
            <a class="nav-item nav-link active" href="<?= base_url('index.php/clientes/cadastro');?>">Cadastrar empresa</a>
            <a class="nav-item nav-link active" id="sair" href="<?= base_url('index.php/login/logout');?>" style="">Sair</a>  
        </nav>
        -->
        <div class="container">
            <br>
            <br>
            
            <h2 class="titulo">Clientes:</h2>
            
            <?php if($this->session->flashdata("success")) : ?>                    
                <div class="alert alert-success">
                    <?= $this->session->flashdata("success") ?>
                </div>                    
            <?php endif ?>
            <?php if($this->session->flashdata("danger")) : ?>                    
                <div class="alert alert-danger">
                    <?= $this->session->flashdata("danger") ?>
                </div>                    
            <?php endif ?>
            
            <div class="row justify-content-around" style="width: 100%;margin-left: 0%;">
                
                <?php foreach ($clientes as $cliente): ?>
                
                    <div class="col-6 row-card" style="border: solid #f7f7f9;">
                        <div class="card-job">                            
                            <div class="body-job">
                                <br/>
                               <img src="<?= base_url('media/img/');?><?= $cliente['foto'] ?>" style="width: 104px; height:62px"/>
                                <div style="width: 50%;margin: -68px 0px 0 140px;">
                                    Nome da empresa: <?= $cliente['nome'] ?>
                                    <br/>
                                    Telefone: <?= $cliente['telefone'] ?>
                                </div>                                
                                <div style="margin: 40px 0px 0px 0px;">
                                    <button class="btn btn-success" data-toggle="modal" data-target="#modal-<?= $cliente['id'] ?>">Editar</button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target=#modal-excluir-<?= $cliente['id'] ?>>Excluir</button>                                    
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal excluir cliente-->
                    <div class="modal fade" id="modal-excluir-<?= $cliente['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div style="background-color: #333;" class="modal-content">
                                <div class="modal-header">                                    
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div>
                                    <h1 class="titulo font-degrade borda-bottom-degrade">Tem certeza que deseja excluir?</h1>
                                        <form action="<?= base_url('index.php/clientes/excluirCliente');?>" method="POST">
                                            <input type="hidden" name="cod" value="<?= $cliente['id'] ?>"/>
                                            <input type="submit" value="Sim " class="btn btn-success btn-lg">                                    
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal editar cliente-->
                    <div class="modal fade" id="modal-<?= $cliente['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div style="background-color: #333;" class="modal-content">
                                <div class="modal-header">                                    
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        <form action="<?= base_url('index.php/clientes/editarCliente');?>" method="POST" enctype="multipart/form-data">
                                            <h1 class="titulo font-degrade borda-bottom-degrade">Editar empresa</h1>
                                            <br>
                                            <span class="span-descricao">Nome da empresa:</span>
                                            <input type="text" class="form-control input-cadastro" name="nome_empresa" value="<?= $cliente['nome'] ?>">
                                            <br>
                                            <span class="span-descricao">Telefone:</span>
                                            <input type="text" class="form-control input-cadastro" name="telefone" value="<?= $cliente['telefone'] ?>">
                                            <br>
                                            <span class="span-descricao">Foto da empresa:</span>
                                            <input type="file" class="form-control input-cadastro" name="foto"/>
                                            <br>
                                            <input type="hidden" name="cod" value="<?= $cliente['id'] ?>"/>
                                            <input type="submit" value="editar" class="btn btn-success btn-lg">                                    
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                <?php endforeach ?>
                
                
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>