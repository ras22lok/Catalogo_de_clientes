<!doctype html>
<html lang="pt_br">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url('estatico/autenticacao/css/cadastro.css');?>">
        <title>Página de cadastro</title>
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
        </style>
    </head>
    <body class="fundo">

        <?php if(!($this->session->userdata("usuario_logado"))) : ?>
            <?php redirect('login/'); ?>
        <?php endif ?>
        <div class="box">
            <form action="<?= base_url('index.php/clientes/cadastraCliente');?>" method="POST" enctype="multipart/form-data">

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

                <h1 class="titulo font-degrade borda-bottom-degrade">Cadastrar cliente</h1>
                <br>
                <span class="span-descricao">Nome da empresa:</span>
                <input type="text" class="form-control input-cadastro" name="nome_empresa">
                <br>
                <span class="span-descricao">Telefone:</span>
                <input type="text" class="form-control input-cadastro" name="telefone">
                <br>
                <span class="span-descricao">Foto da empresa:</span>
                <input type="file" class="form-control input-cadastro" name="foto">
                <br>
                <input type="submit" value="CADASTRAR" class="btn btn-success btn-lg">
                <a href="<?= base_url('index.php/clientes/catalogo');?>" class="btn btn-primary btn-lg">Voltar</a>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>