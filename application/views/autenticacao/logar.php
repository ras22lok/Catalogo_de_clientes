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
        </style>
    </head>
    <body class="fundo">

        <?php if($this->session->userdata("usuario_logado")) : ?>
            <?php redirect('clientes/catalogo'); ?>
        <?php endif ?>


        <div class="box">
            <form action="<?= base_url('index.php/login/autenticar');?>" method="post">

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

                <h1 class="titulo font-degrade borda-bottom-degrade">LOGAR</h1>
                <br>
                <span class="span-descricao">Nome de usuário:</span>
                <input type="text" class="form-control input-cadastro" name="username">
                <br>
                <span class="span-descricao">Senha:</span>
                <input type="password" class="form-control input-cadastro" name="password">
                <br>            
                <input type="submit" value="LOGAR" class="btn btn-success btn-lg">
            </form>        
        </div>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>

