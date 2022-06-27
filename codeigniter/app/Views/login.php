<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('public/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('public/css/style.css')?>">
    <title>Login</title>
</head>

<body>
    <div class="wrapper">
        <div class="titleSection">
            <div class="text-center">
                <img src="<?php echo base_url('public/imgs/lpnet-logo.png')?>" width="300px">
                <span class="titleLogin">Plantonistas</span>
            </div>
        </div>
        <div class="inputSection">
            <form action="<?php echo base_url('usuarios/signIn') ?>" method="post">
                <h1 class="welcomeLogin mb-5"><b>Bem Vindo!</b></h1>
                <input type="text" name="nome" required class="form-controlP mb-5" placeholder="Username:">
                <input type="password" name="senha" required class="form-controlP mb-5" placeholder="Senha:">
                <input type="checkbox">
                <label for="manterLogado"><b>Manter Logado</b></label>
                <?php $msg = session()->getFlashData('msg') ?>
                <?php if ($msg != '') { ?>
                    <div class="errorLogin">
                        <ul>
                            <p><b><?php echo $msg ?></b></p>
                        </ul>
                    </div>
                <?php } ?>
                <div class="centerButton">
                    <button type="submit" class="btn btn-personLogin mt-4">Entrar</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>