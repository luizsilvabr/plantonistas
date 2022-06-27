<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <link rel="stylesheet" href="<?php echo base_url('public/css/style.css') ?>">
    <title>Plantonistas - Plantonistas</title>
</head>

<body>
    <!-- navbar -->
    <div class="navbar">
        <div class="logo"><img src="<?php echo base_url('public/imgs/logo.png') ?>" width="130px"></div>
        <div class="itens">
            <a href="<?php echo base_url('/login') ?>"><span>Login</span><img src="<?php echo base_url('public/imgs/enter.png') ?>" width="40px"></a>
            <a class="menuImg" href="#"><span>Menu</span><img src="<?php echo base_url('public/imgs/menu.png') ?>" width="40px"></a>
        </div>
    </div>
    <!-- end navbar -->
    <!-- content -->
    <div class="content">
        <h2 class="welcomeList">Escala de Plantonistas</h2><br>
        <div class="cards">
            <?php if ($plantoes) { ?>
                <?php foreach ($plantoes as $plantao) {  ?>
                    <div class="cardHome">
                        <div class="cardHead">
                            <div class="circleImg mt-2 mb-2"><img src="<?php echo base_url('public/imgs/city.png') ?>"></div>
                            <div class="text-center text-white w-100 mb-2">
                                <span class="titleCard">
                                    <?php
                                    $siglacom = $plantao->siglas;
                                    $siglasem = str_replace(',', '/', $siglacom);
                                    echo $siglasem
                                    ?>
                                </span>
                            </div>
                        </div>
                        <div class="cardContent p-3">
                            <p class="mb-8"><b>Nome:&nbsp;</b> <?php echo $plantao->nomePlantonista ?></p>
                            <p class="mb-8"><b>Telefone:&nbsp;</b> <?php echo $plantao->telefone_pessoal ?></p>
                            <p class="mb-8"><b>Telefone Pessoal:&nbsp;</b> <?php echo $plantao->telefone_empresa ?></p>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div class="noData">
                    <h5>Não há Plantões Cadastrados.</h5>
                </div>
            <?php } ?>
        </div>

    </div>
    <!-- end content -->

    <!-- footer -->
    <div class="footer">
        Desenvolvido por: &nbsp;<a href="https://intranet.lpnet.com.br/social/perfil/827" target="blank">Luíz
            Felipe</a>&nbsp; - &nbsp;<a target="blank" href="https://intranet.lpnet.com.br/social/perfil/439/sobre">Rodrigo
            Felix</a>
    </div>
    <!-- end footer -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    <script>
        var description = '<?php print $msgLogin ?>'
        if (description == '') {
            pass
        } else {
            iziToast.success({
                id: 'success',
                title: description,
                position: 'bottomRight',
                timeout: 2000
            });
        }
    </script>
</body>

</html>