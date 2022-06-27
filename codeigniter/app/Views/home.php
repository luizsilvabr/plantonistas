<?php echo $this->include('header2'); ?>

<!-- content -->
<div class="content">
    <h2 class="welcomeUser">Escala de Plantonistas</h2><br>
    <div class="cards">
        <?php if ($plantoes) { ?>
            <?php foreach ($plantoes as $plantao) {  ?>
                <div class="cardHome">
                    <div class="cardHead">
                        <div class="circleImg mt-2 mb-2"><img src="<?php echo base_url('public/imgs/city.png') ?>"></div>
                        <div class="text-center text-white w-100 mb-2">
                            <span class="titleCard"><?php
                                                    $siglacom = $plantao->siglas;
                                                    $siglasem = str_replace(',', '/', $siglacom);
                                                    echo $siglasem
                                                    ?></span>
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

<?php echo $this->include('footer'); ?>