<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('public/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('/public/css/izitoast.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('/public/css/style.css') ?>">
    <title>Plantonistas - Área Admin</title>
</head>

<body>
    <!-- navbar -->
    <div class="navbar">
        <div class="logo2"><img src="<?php echo base_url('/public/imgs/logo.png') ?>" width="165px"></div>
        <div class="itens2">
            <a href="<?php echo base_url('/plantoes') ?>"><span>Plantões</span><img src="<?php echo base_url('public/imgs/control-panel.png') ?>" width="40px"></a>
            <a href="<?php echo base_url('/plantonistas') ?>"><span>Plantonistas</span><img src="<?php echo base_url('public/imgs/worker.png') ?>" width="40px"></a>
            <a href="<?php echo base_url('/regioes') ?>"><span>Regiões</span><img src="<?php echo base_url('public/imgs/location.png') ?>" width="40px"></a>
            <a href="<?php echo base_url('/cidades') ?>"><span>Cidades</span><img src="<?php echo base_url('public/imgs/citys.png') ?>" width="40px"></a>
            <a href="<?php echo base_url('/home') ?>"><span>Home</span><img src="<?php echo base_url('public/imgs/home.png') ?>" width="40px"></a>
            <a href="<?php echo base_url('usuarios/signOut') ?>"><span>Logout</span><img src="<?php echo base_url('public/imgs/logout.png') ?>" width="40px"></a>
            <a class="menuImg" href="#"><span>Menu</span><img src="<?php echo base_url('public/imgs/menu.png') ?>" width="40px"></a>
        </div>
    </div>
    <!-- end navbar -->