<?php echo $this->include('header2'); ?>

<!-- content -->
<div class="content">
    <div>
        <h2 class="welcomeUser">Plantões</h2 class="welcomeUser mb-5">
        <a class="btn btn-success mb-3" href="<?php echo base_url('plantoes/adicionar') ?>">Adicionar novo plantão</a>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr class="text-center">
                <th>#</th>
                <th>Plantonista</th>
                <th>Sigla</th>
                <th>Região</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($plantoes) { ?>
                <?php foreach ($plantoes as $plantao) { ?>
                    <tr class="text-center">
                        <td><?php echo $plantao->id ?></td>
                        <td><?php echo $plantao->nomePlantonista ?></td>
                        <td>
                            <?php
                            $siglacom = $plantao->siglas;
                            $siglasem = str_replace(',', ' - ', $siglacom);
                            echo $siglasem
                            ?>
                        </td>
                        <td><?php echo $plantao->nomeRegiao ?></td>
                        <td>
                            <a class="btnPerson mr-3" href="<?php echo base_url('plantoes/editar/' . $plantao->id) ?>"><img src="<?php echo base_url('public/imgs/pen.png') ?>" width="23px"></a>
                            <a class="btnPerson" data-toggle="modal" data-target="#modal<?php echo $plantao->id ?>"><img src="<?php echo base_url('public/imgs/trash.png') ?>" width="23px"></a>
                            <!-- Modal -->
                            <div class="modal fade" id="modal<?php echo $plantao->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"><img src="<?php echo base_url('public/imgs/warning.png') ?>" width="30px">&nbsp;<h5 class="mt-2"><b>Atenção</b></h5>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <span>Tem certeza que deseja deletar esta região ?</span>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                                            <a class="btn btn-success" href="<?php echo base_url('plantoes/excluir/' . $plantao->id) ?>">Sim</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end modal -->
                        </td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr class="text-center">
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- end content -->

<?php echo $this->include('footer'); ?>