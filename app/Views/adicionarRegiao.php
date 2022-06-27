<?php echo $this->include('header2'); ?>

<!-- content -->
<div class="content">
    <div class="cardAdd">
        <h2 class="welcomeUser mb-3" ><?php echo $title ?> Região</h2>
        <form class="formAdd" method="POST">
            <input type="hidden" name="id" value="<?php echo (isset($regiao) ? $regiao->id : '') ?>">
            <div class="form-group m-5">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" required minlength="2" value="<?php echo (isset($regiao) ? $regiao->nome : '') ?>" name="nome" placeholder="Nome da região...">
            </div>
            <?php if ($msg === 'Erro ao inserir região' or $msg === 'Erro ao Atualizar região') { ?>
                <?php if ($errors != '') { ?>
                    <div class="error m-5">
                        <ul class="m-4">
                            <?php foreach ($errors as $erro) { ?>
                                <li>&nbsp;&nbsp;<?php echo $erro ?></li>
                            <?php } ?>
                            <small>&nbsp;&nbsp; <b>Por favor verifique os campos acima...</b></small>
                        </ul>
                    </div>
                <?php } ?>
            <?php } ?>

            <div class="m-5 row">
                <div class="col-4 alignLeftArrow">
                    <a href="<?php echo base_url('/regioes') ?>" class="mr-4"><img src="<?php echo base_url('public/imgs/left-arrow.png') ?>" width="40px"></a>
                </div>
                <div class="col-4 alignBtn">
                    <button type="submit" class="btn btn-success w-50">Enviar</button>
                </div>
                <div class="col-4"></div>
            </div>
        </form>
    </div>
</div>
<!-- end content -->

<?php echo $this->include('footer'); ?>