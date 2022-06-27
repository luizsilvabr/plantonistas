<?php echo $this->include('header2'); ?>

<!-- content -->
<div class="content">
    <div class="cardAdd">
        <h2 class="welcomeUser mb-3"><?php echo $title ?> Plantão</h2>
        <form class="m-5" method="POST">
            <input type="hidden" name="id" value="<?php echo (isset($plantao) ? $plantao->id : '') ?>">
            <div class="form-group m-5">
                <label for="nome">Plantonista</label>
                <select required name="plantonistas_id" class="form-control">
                    <option value="" selected>-</option>
                    <?php foreach ($selectPlantonistas as $selectP) { ?>
                        <option value="<?php echo $selectP->id ?>"><?php echo $selectP->nome ?></option>
                    <?php } ?>
                </select>
                <small class="form-text text-muted">Selecione um plantonista para o plantão.</small>
            </div>

            <div class="form-group m-5">
                <label for="nome">Região</label>
                <select required name="regioes_id" class="form-control">
                    <option value="" selected>-</option>
                    <?php foreach ($selectRegioes as $selectR) { ?>
                        <option value="<?php echo $selectR->id ?>"><?php echo $selectR->nome ?></option>
                    <?php } ?>
                </select>
                <small class="form-text text-muted">Selecione uma região para o plantão.</small>
            </div>
            <?php if ($msg === 'Erro ao inserir plantão' or $msg === 'Erro ao Atualizar plantão') { ?>
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
                    <a href="<?php echo base_url('/plantoes') ?>" class="mr-4"><img class="arrowImg" src="<?php echo base_url('public/imgs/left-arrow.png') ?>" width="40px"></a>
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