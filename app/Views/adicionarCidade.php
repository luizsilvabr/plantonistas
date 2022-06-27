<?php echo $this->include('header2'); ?>

<!-- content -->
<div class="content">
    <div class="cardAdd">
        <h2 class="welcomeUser mb-3 mt-3"><?php echo $title ?> Cidade</h2>
        <form class="formAdd" method="POST">
            <input type="hidden" name="id" value="<?php echo (isset($cidade) ? $cidade->id : '') ?>">
            <div class="form-group m-5">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" required minlength="2" value="<?php echo (isset($cidade) ? $cidade->nome : '') ?>" name="nome" placeholder="Nome da Cidade...">
            </div>
            <div class="form-group m-5">
                <label for="nome">Sigla</label>
                <input type="text" class="form-control" required minlength="2" maxlength="5" value="<?php echo (isset($cidade) ? $cidade->sigla : '') ?>" name="sigla" placeholder="Sigla...">
            </div>

            <div class="form-group m-5">
                <label for="nome">Região</label>
                <select required name="regioes_id" class="form-control">
                <?php 
                    if(isset($cidade)){ 
                        $connect = mysqli_connect("189.1.145.102", "root", "185101rf", "plantao");
                        $idRegiao = $cidade->regioes_id;
                        $query = mysqli_query($connect,"SELECT nome FROM regioes WHERE id = $idRegiao");
                        $nomeRegiao = mysqli_fetch_array($query);
                    } 
                ?>
                    <option value="" selected><?php echo (isset($nomeRegiao['nome']) ? $nomeRegiao['nome'] : '')?></option>
                    <?php foreach ($selectRegioes as $selectR) { ?>
                        <option value="<?php echo $selectR->id ?>"><?php echo $selectR->nome ?></option>
                    <?php } ?>
                </select>
                <small class="form-text text-muted">Selecione uma região para a cidade.</small>
            </div>
            <?php if ($msg === 'Erro ao inserir cidade' or $msg === 'Erro ao Atualizar cidade') { ?>
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
                    <a href="<?php echo base_url('/cidades') ?>" class="mr-4"><img src="<?php echo base_url('public/imgs/left-arrow.png') ?>" width="40px"></a>
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